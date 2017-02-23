<?php
/*Plugin Name: Organization Map
Plugin URI: https://github.com/level73/OrgMap
Description: Creates a CPT for WordPress along with two custom taxonomies and displays a map of organizations
Version: 1.0
Author: Alan Zard
Author URI: https://level73.it
Text Domain: orgmap
License: MIT
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


add_action( 'init', 'OrgMap_create_org');
add_action( 'init', 'OrgMap_create_taxonomies');

/** Enqueue Scripts for the map **/
function OrgMap_enqueue_script() {
  wp_enqueue_script( 'raphael', 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.0/raphael-min.js', null, '2.2.0' );
  wp_enqueue_script( 'mapael', plugin_dir_url( __FILE__ ) . 'js/jquery.mapael.min.js', array('jquery', 'raphael'), '2.0.0');
  wp_enqueue_script( 'orgmap_js', plugin_dir_url( __FILE__ ) . 'js/orgmap.js', array('mapael'), '1.0.0' );
}
add_action('wp_enqueue_scripts', 'OrgMap_enqueue_script');

/** Manage templates and bind them to ur our CPT/CTX **/
function OrgMap_Organization_single($template){
  global $post;
  if($post->post_type == 'organization'){
    $plugin_path = dirname(__FILE__);
    $template_name = 'single_organization.php';
    return $plugin_path . '/templates/' . $template_name;
  }
  return $template;
}
add_filter('single_template', 'OrgMap_Organization_single', 1);
