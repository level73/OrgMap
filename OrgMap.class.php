<?php
  /** Setup Class for Orgmap Plugin **/

  class OrgmapSetup {

    public $sdgs = array(
      1  => 'No Poverty',
      2  => 'Zero Hunger',
      3  => 'Good Health and Well-being',
      4  => 'Quality Education',
      5  => 'Gender Equality',
      6  => 'Clean Water and Sanitation',
      7  => 'Affordable and Clean Energy',
      8  => 'Decent Work and Economic Growth',
      9  => 'Industry, Innovation and Infrastructure',
      10 => 'Reduced Inequalities',
      11 => 'Sustainable Cities and Communities',
      12 => 'Responsible Consumption and Production',
      13 => 'Climate Action',
      14 => 'Life Below Water',
      15 => 'Life On Land',
      16 => 'Peace, Justice and Strong Institutions',
      17 => 'Partnerships for the Goals'
    );

    function __construct() {
      register_activation_hook( __FILE__, array( $this, 'activate' ));
      add_action( 'init', array( $this, 'create_taxonomies') );
      add_action( 'init', array( $this, 'create_organization_cpt') );

      add_action( 'sdgs_add_form_fields', array( $this, 'add_sdg_order_field'), 10, 2 );
      add_action( 'created_sdgs', array( $this, 'save_sdg_order_meta'), 10, 2 );
      add_action( 'sdgs_edit_form_fields', array( $this, 'edit_sdg_order_field'), 10, 2 );
      add_action( 'edited_sdgs', array( $this, 'update_sdg_order'), 10, 2 );

      add_filter( 'manage_sdgs_custom_column', array( $this, 'add_sdg_order_column_content'), 10, 3 );
      add_filter( 'manage_edit-sdgs_columns', array( $this, 'add_sdg_order_column'), 10, 3 );
      
    }

    function activate() {
      $this->create_taxonomies();
      $this->create_organization_cpt();
      // register SDG terms
      foreach($this->sdgs as $i => $sdg){
        $term = wp_insert_term('sdgs', $sdg);
        if(is_array($term)){
          $id = $term['term_id'];
          update_term_meta( $id, 'sdg_order', $i );
        }
      }
      // register countries
    }

    function create_taxonomies(){
      $this->create_taxonomy_sdg();
      $this->create_taxonomy_country();
    }


    function create_taxonomy_sdg() {
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

    function create_taxonomy_country() {
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

    }

    /** Sdg custom meta sorting Order **/

    function add_sdg_order_field($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="sdg_order">SDG #</label>
            <input type="text" class="post-form" id="sdg_order" name="sdg_order">
        </div>';
        echo $html;
    }
    // Save SDG Order field
    function save_sdg_order_meta( $term_id, $tt_id ){
        if( isset( $_POST['sdg_order'] ) && '' !== $_POST['sdg_order'] ){
            $sdg_order = sanitize_title( strtoupper($_POST['sdg_order']) );
            add_term_meta( $term_id, 'sdg_order', $sdg_order, true );
        }
    }
    // Edit SDG Order field
    function edit_sdg_order_field( $term, $taxonomy ){
        // get current sdg order code
        $sdg_order = get_term_meta( $term->term_id, 'sdg_order', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="sdg_order">SDG Order</label></th>
                <td><input type="text" class="post-form" id="sdg_order" name="sdg_order" value="' . $sdg_order . '"></td>
                </tr>';
        echo $html;
    }
    // Update SDG Order Field
    function update_sdg_order( $term_id, $tt_id ){
        if( isset( $_POST['sdg_order'] ) && '' !== $_POST['sdg_order'] ){
            $sdg_order = sanitize_title( strtoupper($_POST['sdg_order']) );
            update_term_meta( $term_id, 'sdg_order', $sdg_order );
        }
    }
    // Display SDG Order in taxonomy table
    function add_sdg_order_column( $columns ){
        $columns['sdg_order'] = __( 'SDG #', 'orgmap' );
        return $columns;
    }

    // View SDG Order # in Taxonomy main table
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


    function create_organization_cpt(){
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





  }
