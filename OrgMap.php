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

/** Create and register taxonomies **/
function OrgMap_create_taxonomies() {

  // Countries
  $labels = array(
		'name'              => _x( 'Countries', 'taxonomy general name', 'orgmap' ),
		'singular_name'     => _x( 'Country', 'taxonomy singular name', 'orgmap' ),
		'search_items'      => __( 'Search Countries', 'orgmap' ),
		'all_items'         => __( 'All Countries', 'orgmap' ),
		'edit_item'         => __( 'Edit Country', 'orgmap' ),
		'update_item'       => __( 'Update Country', 'orgmap' ),
		'add_new_item'      => __( 'Add New Country', 'orgmap' ),
		'new_item_name'     => __( 'New Country Name', 'orgmap' ),
		'menu_name'         => __( 'Country', 'orgmap' ),
	);
  $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'country' ),
	);
  register_taxonomy(
    'countries',
    'organization',
    $args
  );

  // SDG List
  $labels = array(
		'name'              => _x( 'SDGs', 'taxonomy general name', 'orgmap' ),
		'singular_name'     => _x( 'SDG', 'taxonomy singular name', 'orgmap' ),
		'search_items'      => __( 'Search SDGs', 'orgmap' ),
		'all_items'         => __( 'All SDGs', 'orgmap' ),
		'edit_item'         => __( 'Edit SDG', 'orgmap' ),
		'update_item'       => __( 'Update SDG', 'orgmap' ),
		'add_new_item'      => __( 'Add New SDG', 'orgmap' ),
		'new_item_name'     => __( 'New SDG Name', 'orgmap' ),
		'menu_name'         => __( 'SDG', 'orgmap' ),
	);
  $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'sdg' ),
	);
  register_taxonomy(
    'sdgs',
    'organization',
    $args
  );
}

/** Add custom meta to taxonomies **/
// ISO2 field for Countries
add_action( 'countries_add_form_fields', 'add_iso2_field', 10, 2 );
function add_iso2_field($taxonomy) {
    $html = '<div class="form-field term-group">
        <label for="iso2">ISO2 Code</label>
        <input type="text" class="post-form" id="country-iso2-code" name="iso2">
    </div>';
    echo $html;
}
// Save ISO2 field
add_action( 'created_countries', 'save_iso2_meta', 10, 2 );
function save_iso2_meta( $term_id, $tt_id ){
    if( isset( $_POST['iso2'] ) && '' !== $_POST['iso2'] ){
        $iso2 = sanitize_title( strtoupper($_POST['iso2']) );
        add_term_meta( $term_id, 'iso2', $iso2, true );
    }
}
// Edit ISO2 field
add_action( 'countries_edit_form_fields', 'edit_iso2_field', 10, 2 );
function edit_iso2_field( $term, $taxonomy ){
    // get current iso2 code
    $iso2 = get_term_meta( $term->term_id, 'iso2', true );
    $html = '<tr class="form-field term-group-wrap">
            <th scope="row"><label for="iso2">ISO2 Code</label></th>
            <td><input type="text" class="post-form" id="country-iso2-code" name="iso2" value="' . $iso2 . '"></td>
            </tr>';
    echo $html;
}
// Update ISO2 Code
add_action( 'edited_countries', 'update_iso2', 10, 2 );
function update_iso2( $term_id, $tt_id ){
    if( isset( $_POST['iso2'] ) && '' !== $_POST['iso2'] ){
        $iso2 = sanitize_title( strtoupper($_POST['iso2']) );
        update_term_meta( $term_id, 'iso2', $iso2 );
    }
}
// Display ISO2 in taxonomy table
add_filter('manage_edit-countries_columns', 'add_iso2_column' );
function add_iso2_column( $columns ){
    $columns['iso2'] = __( 'ISO2', 'orgmap' );
    return $columns;
}

add_filter('manage_countries_custom_column', 'add_iso2_column_content', 10, 3 );
function add_iso2_column_content( $content, $column_name, $term_id ){
    if( $column_name !== 'iso2' ){
        return $content;
    }
    $term_id = absint( $term_id );
    $iso2 = get_term_meta( $term_id, 'iso2', true );
    if(!empty($iso2)){
      $content .= esc_attr($iso2);
    }
    return $content;
}

// Sorting Order field for SDGs
add_action( 'sdgs_add_form_fields', 'add_sdg_order_field', 10, 2 );
function add_sdg_order_field($taxonomy) {
    $html = '<div class="form-field term-group">
        <label for="sdg_order">SDG #</label>
        <input type="text" class="post-form" id="sdg_order" name="sdg_order">
    </div>';
    echo $html;
}
// Save SDG Order field
add_action( 'created_sdgs', 'save_sdg_order_meta', 10, 2 );
function save_sdg_order_meta( $term_id, $tt_id ){
    if( isset( $_POST['sdg_order'] ) && '' !== $_POST['sdg_order'] ){
        $sdg_order = sanitize_title( strtoupper($_POST['sdg_order']) );
        add_term_meta( $term_id, 'sdg_order', $sdg_order, true );
    }
}
// Edit SDG Order field
add_action( 'sdgs_edit_form_fields', 'edit_sdg_order_field', 10, 2 );
function edit_sdg_order_field( $term, $taxonomy ){
    // get current sdg order code
    $sdg_order = get_term_meta( $term->term_id, 'sdg_order', true );
    $html = '<tr class="form-field term-group-wrap">
            <th scope="row"><label for="sdg_order">SDG Order</label></th>
            <td><input type="text" class="post-form" id="sdg_order" name="sdg_order" value="' . $sdg_order . '"></td>
            </tr>';
    echo $html;
}
// Update SDG Order Code
add_action( 'edited_sdgs', 'update_sdg_order', 10, 2 );
function update_sdg_order( $term_id, $tt_id ){
    if( isset( $_POST['sdg_order'] ) && '' !== $_POST['sdg_order'] ){
        $sdg_order = sanitize_title( strtoupper($_POST['sdg_order']) );
        update_term_meta( $term_id, 'sdg_order', $sdg_order );
    }
}
// Display SDG Order in taxonomy table
add_filter('manage_edit-sdgs_columns', 'add_sdg_order_column' );
function add_sdg_order_column( $columns ){
    $columns['sdg_order'] = __( 'SDG #', 'orgmap' );
    return $columns;
}

add_filter('manage_sdgs_custom_column', 'add_sdg_order_column_content', 10, 3 );
function add_sdg_order_column_content( $content, $column_name, $term_id ){
    if( $column_name !== 'sdg_order' ){
        return $content;
    }
    $term_id = absint( $term_id );
    $sdg_order = get_term_meta( $term_id, 'sdg_order', true );
    if(!empty($sdg_order)){
      $content .= esc_attr($sdg_order);
    }
    return $content;
}
// Make SDGs sortable
add_filter( 'manage_edit-sdgs_sortable_columns', 'add_sdg_order_column_sortable' );
function add_sdg_order_column_sortable( $sortable ){
    $sortable['sdg_order'] = 'sdg_order';
    return $sortable;
}




/** Create the CPT **/
function OrgMap_create_org() {
  $labels = array(
      'name' => 'Organizations',
      'singular_name' => 'Organization',
      'add_new' => 'Add New',
      'add_new_item' => 'Add New Organization',
      'edit' => 'Edit',
      'edit_item' => 'Edit Organization',
      'new_item' => 'New Organization',
      'view' => 'View',
      'view_item' => 'View Organization',
      'search_items' => 'Search Organizations',
      'not_found' => 'No Organizations found',
      'not_found_in_trash' => 'No Organizations found in Trash',
      'parent' => 'Parent Organization',
      'menu_name' => 'Organizations'
    );

  // Register the Organization Post Type
  register_post_type(
    'organization',
    array(
      'labels' => $labels,
      'has_archive' => true,
   		'public' => true,
  		'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' ),
  		// 'taxonomies' => array(  ),
  		'exclude_from_search' => false,
      'menu_icon' => 'dashicons-groups',
  		'capability_type' => 'post',
  		'rewrite' => array( 'slug' => 'organizations' )
    )
  );

}

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
  if ( !wp_verify_nonce( $_POST['organization_full_name_box_content_nonce'], plugin_basename( __FILE__ ) ) )
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
  if ( !wp_verify_nonce( $_POST['organization_url_box_content_nonce'], plugin_basename( __FILE__ ) ) )
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

add_action( 'init', 'OrgMap_create_org');
add_action( 'init', 'OrgMap_create_taxonomies');

/** Enqueue Scripts for the map **/
function OrgMap_enqueue_script() {
  /** stylesheet **/
  wp_enqueue_style( 'orgmap_css', plugin_dir_url( __FILE__ ) . 'css/orgmap_plugin.css' );
  /** javascript **/
  wp_enqueue_script( 'raphael', 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.0/raphael-min.js', null, '2.2.0' );
  wp_enqueue_script( 'mapael', plugin_dir_url( __FILE__ ) . 'js/jquery.mapael.min.js', array('jquery', 'raphael'), '2.0.0');
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
add_shortcode('orgmap', 'orgmap_shortcode');
function orgmap_shortcode(){
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
    'meta_key'    => 'iso2',
    'orderby'     => 'meta_value',
    'order'       => 'ASC',
    'hide_empty'  => false
  ));
  // Include the ISO2 code here, do it once instead of a million times
  $countryList = array();
  foreach($countries as $country){
    $iso2 = strtoupper(get_term_meta($country->term_id, 'iso2', true));
    $countryList[$iso2] = array(
      'value' => 0,
      'href'  => '/country/' . $country->slug
    );
  }
  // I'm going to store my query objects in here once I sorted them out
  $results = array();
  // Cycle over Term to get related Orgs
  foreach($sdgs as $sdg){
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
        $iso2 = strtoupper(get_term_meta($country->term_id, 'iso2', true));
        $results[$sdg_order]['areas'][$iso2]['value']++;
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
      <a href="#" class="orgmap-map-control sdg-taxonomy-term sdg-list-element sdg-icon sdg-term-<?php echo $sdg_order; ?>" data-sdg="<?php echo $sdg_order; ?>"></a>
    </li>
  <?php
      }
  }
  ?>
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
            label: "1 Organization"
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
              max: 10,
              attrs: {
                  fill: "#3EC7D4"
              },
              label: "Between 1 and 10 Organizations"
          },
          {
              min: 10,
              max: 50,
              attrs: {
                  fill: "#028E9B"
              },
              label: "Between 10 and 50 Organizations"
          },
          {
              min: 50,
              attrs: {
                  fill: "#01565E"
              },
              label: "More than 50 Organizations"
          }
        ]
      },
    },

    areas: theData["1"]["areas"]
  });
});
</script>
<?php


}
