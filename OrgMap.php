<?php
/*Plugin Name: Organization Map
Plugin URI: https://github.com/level73/OrgMap
Description: Creates a CPT for WordPress along with two custom taxonomies and displays a map of organizations
Version: 1.0
Author: Alan Zard
Author URI: https://level73.it
Text Domain: orgmap
License: GPL 3.0
*/

require_once(plugin_dir_path(__FILE__) . 'OrgMap.class.php');
new OrgMapSetup();


/** Enqueue Scripts for the map **/
function OrgMap_enqueue_script() {
  /** stylesheet **/
  wp_enqueue_style( 'orgmap_css', plugin_dir_url( __FILE__ ) . 'css/orgmap_plugin.css' );
  /** javascript **/
  wp_enqueue_script( 'raphael',   plugin_dir_url( __FILE__ ) . 'js/raphael.min.js', null, '2.2.0' );
  wp_enqueue_script( 'mapael',    plugin_dir_url( __FILE__ ) . 'js/jquery.mapael.min.js', array('jquery', 'raphael'), '2.0.0');
  wp_enqueue_script( 'orgmap_js', plugin_dir_url( __FILE__ ) . 'js/orgmap.js', array('mapael'), '1.0.0' );
}
add_action('wp_enqueue_scripts', 'OrgMap_enqueue_script');

/** Manage templates and bind them to ur our CPT/CTX **/
function OrgMap_Organization_single($template){
  global $post;
  if($post->post_type == 'organization'){
    $plugin_path = plugin_dir_path(__FILE__);
    $template_name = 'single_organization.php';
    return $plugin_path . '/templates/' . $template_name;
  }
  return $template;
}
add_filter('single_template', 'OrgMap_Organization_single', 1);


/** List of SDG Taxonomy terms with the correct colors **/
function OrgMap_org_sdg_terms($icons = true){
  global $post;
  $terms = get_the_terms($post->id, 'sdgs');
  if(!empty($terms) && !is_wp_error($terms)){
    echo '<ul class="sdg-term-list">';
    foreach($terms as $term){
      $sdg_order = get_term_meta($term->term_id, 'sdg_order', true);
      echo '<li class="sdg-term-' . $sdg_order . (!$icons ? '' : ' sdg-icon-list') . '"><a class="sdg-taxonomy-term ' . (!$icons ? '' : 'sdg-icon') . ' sdg-term-' . $sdg_order . '" href="/sdg/' . $term->slug . '" title="' . $term->name . '" alt="' . $term->name . '" >' . $term->name . '</a></li>';
    }
    echo '</ul>';
  }
}


/** Shortcode to have a Map on a page/post **/
add_shortcode('orgmap', 'OrgMap_shortcode');
function OrgMap_shortcode(){
  // get all the_terms
  $sdgs = get_terms(array(
    'taxonomy'    => 'sdgs',
    'meta_key'    => 'sdg_order',
    'orderby'     => 'meta_value_num',
    'order'       => 'ASC',
    'hide_empty'  => false
  ));
  // Get All Countries
  $countries = get_terms(array(
    'taxonomy'    => 'countries',
    'orderby'     => 'slug',
    'order'       => 'ASC',
    'hide_empty'  => false
  ));
  // Count Organizations to set the legend slices dynamically
  $orgCount = wp_count_posts('organization');
    // Only published profiles
  $orgCount = $orgCount->publish;
  $levels = array(
    'lower' => 3,
    'higher' => 8
  );
  if($orgCount > 12) {
    $levels['lower']  = floor( $orgCount / 4 );
    $levels['higher'] = ceil( $levels['lower'] * 2.5);
  }

  // Include the ISO2 code here, do it once instead of a million times
  $countryList = array();
  foreach( $countries as $country ){
    $iso2 = strtoupper($country->slug);
    $countryList[$iso2] = array(
      'value' => 0,
      'href'  => '/country/' . $country->slug
    );
  }
  // I'm going to store my query objects in here once I sorted them out
  $results = array();
  // Prepare the Full List
  $results['all'] = array( 'areas' => $countryList );
  // Cycle over Term to get related Orgs
  foreach( $sdgs as $sdg ){
    $sdg_order = get_term_meta($sdg->term_id, 'sdg_order', true);
    // Set SDG Slug as Array Index for current iteration, add the list of Areas
    $results[$sdg_order] = array('areas' => $countryList);
    // set arguments for WP_Query
    $args = array(
      'post_type' => 'organization',
      'tax_query' => array(
        array(
    			'taxonomy' => 'sdgs',
    			'field' => 'id',
    			'terms' => $sdg->term_id
    		)
      )
    );

    $orgs = new WP_Query($args);
    $howManyOrgs = 0;
    // Let's loop this
    while( $orgs->have_posts() ) : $orgs->the_post();
      $terms = get_the_terms(get_the_ID(), 'countries');
      foreach($terms as $country){
        $iso2 = strtoupper($country->slug);
        // add to specific SDG
        $results[$sdg_order]['areas'][$iso2]['value']++;
        // add to Full List
        $results['all']['areas'][$iso2]['value']++;
      }
      $howManyOrgs++;
    endwhile;
    // clean up post data
    wp_reset_postdata();
  }
  //print_r($results);
?>
<div class="orgmap">
  <div class="map"></div>
  <div class="areaLegend"></div>
</div>
<div class="orgmap-sdg-list">
  <h3><?php echo __('Filter the Map by SDG', 'orgmap'); ?></h3>
  <div class="areaLegend"></div>
  <ul class="sdg-icon-list">
  <?php
  if(!empty($sdgs) && !is_wp_error($sdgs)){
    foreach($sdgs as $sdg){
      $sdg_order = get_term_meta($sdg->term_id, 'sdg_order', true);
  ?>
    <li>
      <a href="#" class="orgmap-map-control sdg-taxonomy-term sdg-list-element sdg-icon sdg-term-<?php echo $sdg_order; ?>" data-sdg="<?php echo $sdg_order; ?>" data-sdg-name="<?php echo $sdg->name; ?>"></a>
    </li>
  <?php
      }
  }
  ?>
    <li><a href="#" class="orgmap-map-control sdg-taxonomy-term sdg-list-element sdg-icon sdg-term-all" data-sdg="all" data-sdg-name="All SDGs">ALL</a>
  </ul>
</div>
<script src="<?php echo plugin_dir_url(__FILE__); ?>js/maps/world_countries_miller.js"></script>
<script>
jQuery(document).ready(function(){
  /** Init Map **/
  var theData =  <?php echo json_encode($results, JSON_FORCE_OBJECT); ?>;
  jQuery('.orgmap-map-control').click(function(e){
    e.preventDefault();
    var sdg = jQuery(this).data('sdg');
    jQuery('.orgmap-map-control').fadeTo(200, 0.4);
    jQuery(this).fadeTo(200, 1);;

    jQuery('.orgmap').trigger('update', [{
      mapOptions: theData[sdg],
      //replaceOptions: true,
      animDuration: 300
    }]);
  });
  jQuery('.orgmap').mapael({

    map : {
      name : "world_countries_miller",
      defaultArea: {
        attrs: {
          fill: "#fff",
          stroke: "#232323",
          "stroke-width": 0.3
        }
      },
      zoom: {
        enabled: true,
        step: 0.25,
        maxLevel: 20
      }
    },
    legend: {
      area: {
        display: false,

        slices: [
          {
            max: 0,
            max: 0,
            attrs: {
                fill: "#FFFFFF"
            },
            label: "No Organization"
          },
          {
              max: 1,
              attrs: {
                  fill: "#6ECBD4"
              },
              label: "1 Organization"
          },
          {
              min: 1,
              max: <?php echo $levels['lower']; ?>,
              attrs: {
                  fill: "#3EC7D4"
              },
              label: "Between 1 and <?php echo $levels['lower']; ?> Organizations"
          },
          {
              min: <?php echo $levels['lower']; ?>,
              max: <?php echo $levels['higher']; ?>,
              attrs: {
                  fill: "#028E9B"
              },
              label: "Between <?php echo $levels['lower']; ?> and <?php echo $levels['higher']; ?> Organizations"
          },
          {
              min: <?php echo $levels['higher']; ?>,
              attrs: {
                  fill: "#01565E"
              },
              label: "More than <?php echo $levels['higher']; ?> Organizations"
          }
        ]
      },
    },

    areas: theData["all"]["areas"]
  });
});
</script>
<?php
}

/** Custom Meta Boxes for the CPT **/
/** Add Full Name text box **/
add_action( 'add_meta_boxes', 'OrgMap_organization_full_name' );
function OrgMap_organization_full_name() {
    add_meta_box(
        'organization_full_name_box',
        __( 'Organization Full Name', 'orgmap' ),
        'OrgMap_organization_full_name_box_content',
        'organization',
        'normal',
        'high'
    );
}
function OrgMap_organization_full_name_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'organization_full_name_box_content_nonce' );
  echo '<label for="full_name"></label>';
  echo '<input type="text" id="full_name" name="full_name" style="width: 100%" placeholder="Organization Full Name..." value="'. (get_post_meta($post->ID, 'full_name',  true) ? : '') . '"/>';
}
add_action( 'save_post', 'OrgMap_organization_full_name_box_save' );
function OrgMap_organization_full_name_box_save( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;
  if ( !isset($_POST['organization_full_name_box_content_nonce']) || !wp_verify_nonce( $_POST['organization_full_name_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $data = $_POST['full_name'];
  update_post_meta( $post_id, 'full_name', $data );
}

/** Add Organization URL text box **/
add_action( 'add_meta_boxes', 'OrgMap_organization_url' );
function OrgMap_organization_url() {
    add_meta_box(
        'organization_url_box',
        __( 'Organization Website URL', 'orgmap' ),
        'OrgMap_organization_url_box_content',
        'organization',
        'normal',
        'high'
    );
}
function OrgMap_organization_url_box_content( $post ) {
  wp_nonce_field( plugin_basename( __FILE__ ), 'organization_url_box_content_nonce' );
  echo '<label for="organization_url"></label>';
  echo '<input type="text" id="organization_url" name="organization_url" style="width: 100%" placeholder="Organization URL..." value="'. (get_post_meta($post->ID, 'organization_url',  true) ? : '') . '"/>';
  echo "<span><em>Please include the protocol (http:// or https://) to make sure the link will work</em></span>";
}
add_action( 'save_post', 'OrgMap_organization_url_box_save' );
function OrgMap_organization_url_box_save( $post_id ) {

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
  return;
  if ( !isset($_POST['organization_url_box_content_nonce']) || !wp_verify_nonce( $_POST['organization_url_box_content_nonce'], plugin_basename( __FILE__ ) ) )
  return;
  if ( 'page' == $_POST['post_type'] ) {
    if ( !current_user_can( 'edit_page', $post_id ) )
    return;
  } else {
    if ( !current_user_can( 'edit_post', $post_id ) )
    return;
  }
  $data = $_POST['organization_url'];
  update_post_meta( $post_id, 'organization_url', $data );
}
