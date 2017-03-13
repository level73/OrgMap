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

function sanitize_details( $resources ) {
  return wp_kses_post( $resources );
}

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

function OrgMap_Country_archive($template){
  remove_all_filters( current_filter(), PHP_INT_MAX );
  $current = get_queried_object();
  if($current->taxonomy == 'countries'){
    $plugin_path = plugin_dir_path(__FILE__);
    $template_name = 'archive_country.php';
    return $plugin_path . '/templates/' . $template_name;
  }
  return $template;
}
add_filter('taxonomy_template', 'OrgMap_Country_archive', 1);

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

/** Print SDG Taxonomy terms as a class **/
function OrgMap_org_sdg_classes(){
  global $post;
  $terms = get_the_terms($post->id, 'sdgs');
  if(!empty($terms) && !is_wp_error($terms)){
    $classes = array();
    foreach($terms as $term){
      $sdg_order = get_term_meta($term->term_id, 'sdg_order', true);
      $classes[] = 'sdg-class-' . $sdg_order;
    }
    echo implode(' ', $classes);
  }
}


/** List of SDG Taxonomy terms with the correct colors **/
function OrgMap_sdg_terms($icons = true){
  $terms = get_terms(array(
    'taxonomy'    => 'sdgs',
    'meta_key'    => 'sdg_order',
    'orderby'     => 'meta_value_num',
    'order'       => 'ASC',
    'hide_empty'  => false
  ));
  if(!empty($terms) && !is_wp_error($terms)){
    echo '<ul class="sdg-term-list">';
    foreach($terms as $term){
      $sdg_order = get_term_meta($term->term_id, 'sdg_order', true);
      echo '<li class="sdg-term-' . $sdg_order . (!$icons ? '' : ' sdg-icon-list') . '"><a data-sdg="' . $sdg_order . '" class="sdg-taxonomy-term ' . (!$icons ? '' : 'sdg-icon') . ' sdg-term-' . $sdg_order . '" href="/sdg/' . $term->slug . '" title="' . $term->name . '" alt="' . $term->name . '" >' . $term->name . '</a></li>';
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
      'value'   => 0,
      'href'    => '/country/' . $country->slug,
      'tooltip' => array(
        'cssClass'  => 'orgmapTooltip',
        'content'   => '<h3>' . $country->name . '</h3><p><strong>0</strong> ' .  __('Organizations or Initiatives')  . '</p>'
      )
    );
    $all[$iso2] = array(
      'value'   => $country->count,
      'href'    => '/country/' . $country->slug,
      'tooltip' => array(
        'cssClass'  => 'orgmapTooltip',
        'content'   => '<h3>' . $country->name . '</h3><p><strong>' . $country->count . '</strong> ' . ($country->count !== 1 ? __('Organizations or Initiatives') : __('Organization or Initiative') ) . '</p>'
      )
    );
  }
  // I'm going to store my query objects in here once I sorted them out
  $results = array();
  // Prepare the Full List
  $results['all'] = array( 'areas' => $all );
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
        $val = $results[$sdg_order]['areas'][$iso2]['value'];
        $results[$sdg_order]['areas'][$iso2]['tooltip'] = array(
          'cssClass'  => 'orgmapTooltip',
          'content'   => '<h3>' . $country->name . '</h3><p><strong>' . $val . '</strong> ' . ($val !== 1 ? __('Organizations or Initiatives') : __('Organization or Initiative') ) . '</p>'
        );
        /*
        // add to Full List
        $results['all']['areas'][$iso2]['value']++;
        $allVal = $results['all']['areas'][$iso2]['value'];
        $results['all']['areas'][$iso2]['tooltip'] = array(
          'cssClass'  => 'orgmapTooltip',
          'content'   => '<h3>' . $country->name . '</h3><p><strong>' . $countryList[$iso2]->count . '</strong> ' . ($allVal !== 1 ? __('Organizations/Initiatives') : __('Organization/Initiative') ) . '</p>'
        );
        */
      }
      $howManyOrgs++;
    endwhile;
    // clean up post data
    wp_reset_postdata();
  }

?>

<div class="orgmap">
  <div class="map"></div>
  <div class="areaLegend"></div>
</div>
<div class="orgmap-sdg-list">

  <p><?php echo __('Filter the Map by SDG:', 'orgmap'); ?> <span id="orgmap-filter">ALL</span></p>
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
    var filterName = jQuery(this).data('sdg-name');
    jQuery('.orgmap-map-control').fadeTo(200, 0.4);
    jQuery(this).fadeTo(200, 1);;
    jQuery('#orgmap-filter').removeClass(function() {
      return jQuery(this).attr("class")
    }).addClass('sdg-term-' + sdg).html(filterName);

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
          fill: "white",
          stroke: "#232323",
          "stroke-width": 0.3
        },
        attrsHover: {
          fill: "#EAF9C0"
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
            min: 0,
            max: 0,
            attrs: {
                fill: "white"
            },
            label: "No Organization"
          },
          {
              min: 1,
              max: 1,
              attrs: {
                  fill: "#758F77"
              },
              label: "1 Organization"
          },
          {
              min: 1,
              max: <?php echo $levels['lower']; ?>,
              attrs: {
                  fill: "#537355"
              },
              label: "Between 1 and <?php echo $levels['lower']; ?> Organizations"
          },
          {
              min: <?php echo $levels['lower']; ?>,
              max: <?php echo $levels['higher']; ?>,
              attrs: {
                  fill: "#375339"
              },
              label: "Between <?php echo $levels['lower']; ?> and <?php echo $levels['higher']; ?> Organizations"
          },
          {
              min: <?php echo $levels['higher']; ?>,
              attrs: {
                  fill: "#1E2E20"
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
