<?php
  /** Setup Class for Orgmap Plugin **/

  class OrgMapSetup {

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

    public $countries = array(
      'AF'  => 'Afghanistan',
      'AX'  => 'Åland Islands',
      'AL'  => 'Albania',
      'DZ'  => 'Algeria',
      'AS'  => 'American Samoa',
      'AD'  => 'Andorra',
      'AO'  => 'Angola',
      'AI'  => 'Anguilla',
      'AQ'  => 'Antarctica',
      'AG'  => 'Antigua and Barbuda',
      'AR'  => 'Argentina',
      'AM'  => 'Armenia',
      'AW'  => 'Aruba',
      'AU'  => 'Australia',
      'AT'  => 'Austria',
      'AZ'  => 'Azerbaijan',
      'BS'  => 'Bahamas',
      'BH'  => 'Bahrain',
      'BD'  => 'Bangladesh',
      'BB'  => 'Barbados',
      'BY'  => 'Belarus',
      'BE'  => 'Belgium',
      'BZ'  => 'Belize',
      'BJ'  => 'Benin',
      'BM'  => 'Bermuda',
      'BT'  => 'Bhutan',
      'BO'  => 'Bolivia, Plurinational State of',
      'BQ'  => 'Bonaire, Sint Eustatius and Saba',
      'BA'  => 'Bosnia and Herzegovina',
      'BW'  => 'Botswana',
      'BV'  => 'Bouvet Island',
      'BR'  => 'Brazil',
      'IO'  => 'British Indian Ocean Territory',
      'BN'  => 'Brunei Darussalam',
      'BG'  => 'Bulgaria',
      'BF'  => 'Burkina Faso',
      'BI'  => 'Burundi',
      'KH'  => 'Cambodia',
      'CM'  => 'Cameroon',
      'CA'  => 'Canada',
      'CV'  => 'Cape Verde',
      'KY'  => 'Cayman Islands',
      'CF'  => 'Central African Republic',
      'TD'  => 'Chad',
      'CL'  => 'Chile',
      'CN'  => 'China',
      'CX'  => 'Christmas Island',
      'CC'  => 'Cocos (Keeling) Islands',
      'CO'  => 'Colombia',
      'KM'  => 'Comoros',
      'CG'  => 'Congo',
      'CD'  => 'Congo, the Democratic Republic of the',
      'CK'  => 'Cook Islands',
      'CR'  => 'Costa Rica',
      'CI'  => 'Côte d\'Ivoire',
      'HR'  => 'Croatia',
      'CU'  => 'Cuba',
      'CW'  => 'Curaçao',
      'CY'  => 'Cyprus',
      'CZ'  => 'Czech Republic',
      'DK'  => 'Denmark',
      'DJ'  => 'Djibouti',
      'DM'  => 'Dominica',
      'DO'  => 'Dominican Republic',
      'EC'  => 'Ecuador',
      'EG'  => 'Egypt',
      'SV'  => 'El Salvador',
      'GQ'  => 'Equatorial Guinea',
      'ER'  => 'Eritrea',
      'EE'  => 'Estonia',
      'ET'  => 'Ethiopia',
      'FK'  => 'Falkland Islands (Malvinas)',
      'FO'  => 'Faroe Islands',
      'FJ'  => 'Fiji',
      'FI'  => 'Finland',
      'FR'  => 'France',
      'GF'  => 'French Guiana',
      'PF'  => 'French Polynesia',
      'TF'  => 'French Southern Territories',
      'GA'  => 'Gabon',
      'GM'  => 'Gambia',
      'GE'  => 'Georgia',
      'DE'  => 'Germany',
      'GH'  => 'Ghana',
      'GI'  => 'Gibraltar',
      'GR'  => 'Greece',
      'GL'  => 'Greenland',
      'GD'  => 'Grenada',
      'GP'  => 'Guadeloupe',
      'GU'  => 'Guam',
      'GT'  => 'Guatemala',
      'GG'  => 'Guernsey',
      'GN'  => 'Guinea',
      'GW'  => 'Guinea-Bissau',
      'GY'  => 'Guyana',
      'HT'  => 'Haiti',
      'HM'  => 'Heard Island and McDonald Islands',
      'VA'  => 'Holy See (Vatican City State)',
      'HN'  => 'Honduras',
      'HK'  => 'Hong Kong',
      'HU'  => 'Hungary',
      'IS'  => 'Iceland',
      'IN'  => 'India',
      'ID'  => 'Indonesia',
      'IR'  => 'Iran, Islamic Republic of',
      'IQ'  => 'Iraq',
      'IE'  => 'Ireland',
      'IM'  => 'Isle of Man',
      'IL'  => 'Israel',
      'IT'  => 'Italy',
      'JM'  => 'Jamaica',
      'JP'  => 'Japan',
      'JE'  => 'Jersey',
      'JO'  => 'Jordan',
      'KZ'  => 'Kazakhstan',
      'KE'  => 'Kenya',
      'KI'  => 'Kiribati',
      'KP'  => 'Korea, Democratic People\'s Republic of',
      'KR'  => 'Korea, Republic of',
      'KW'  => 'Kuwait',
      'KG'  => 'Kyrgyzstan',
      'LA'  => 'Lao People\'s Democratic Republic',
      'LV'  => 'Latvia',
      'LB'  => 'Lebanon',
      'LS'  => 'Lesotho',
      'LR'  => 'Liberia',
      'LY'  => 'Libya',
      'LI'  => 'Liechtenstein',
      'LT'  => 'Lithuania',
      'LU'  => 'Luxembourg',
      'MO'  => 'Macao',
      'MK'  => 'Macedonia, the Former Yugoslav Republic of',
      'MG'  => 'Madagascar',
      'MW'  => 'Malawi',
      'MY'  => 'Malaysia',
      'MV'  => 'Maldives',
      'ML'  => 'Mali',
      'MT'  => 'Malta',
      'MH'  => 'Marshall Islands',
      'MQ'  => 'Martinique',
      'MR'  => 'Mauritania',
      'MU'  => 'Mauritius',
      'YT'  => 'Mayotte',
      'MX'  => 'Mexico',
      'FM'  => 'Micronesia, Federated States of',
      'MD'  => 'Moldova, Republic of',
      'MC'  => 'Monaco',
      'MN'  => 'Mongolia',
      'ME'  => 'Montenegro',
      'MS'  => 'Montserrat',
      'MA'  => 'Morocco',
      'MZ'  => 'Mozambique',
      'MM'  => 'Myanmar',
      'NA'  => 'Namibia',
      'NR'  => 'Nauru',
      'NP'  => 'Nepal',
      'NL'  => 'Netherlands',
      'NC'  => 'New Caledonia',
      'NZ'  => 'New Zealand',
      'NI'  => 'Nicaragua',
      'NE'  => 'Niger',
      'NG'  => 'Nigeria',
      'NU'  => 'Niue',
      'NF'  => 'Norfolk Island',
      'MP'  => 'Northern Mariana Islands',
      'NO'  => 'Norway',
      'OM'  => 'Oman',
      'PK'  => 'Pakistan',
      'PW'  => 'Palau',
      'PS'  => 'Palestine, State of',
      'PA'  => 'Panama',
      'PG'  => 'Papua New Guinea',
      'PY'  => 'Paraguay',
      'PE'  => 'Peru',
      'PH'  => 'Philippines',
      'PN'  => 'Pitcairn',
      'PL'  => 'Poland',
      'PT'  => 'Portugal',
      'PR'  => 'Puerto Rico',
      'QA'  => 'Qatar',
      'RE'  => 'Réunion',
      'RO'  => 'Romania',
      'RU'  => 'Russian Federation',
      'RW'  => 'Rwanda',
      'BL'  => 'Saint Barthélemy',
      'SH'  => 'Saint Helena, Ascension and Tristan da Cunha',
      'KN'  => 'Saint Kitts and Nevis',
      'LC'  => 'Saint Lucia',
      'MF'  => 'Saint Martin (French part)',
      'PM'  => 'Saint Pierre and Miquelon',
      'VC'  => 'Saint Vincent and the Grenadines',
      'WS'  => 'Samoa',
      'SM'  => 'San Marino',
      'ST'  => 'Sao Tome and Principe',
      'SA'  => 'Saudi Arabia',
      'SN'  => 'Senegal',
      'RS'  => 'Serbia',
      'SC'  => 'Seychelles',
      'SL'  => 'Sierra Leone',
      'SG'  => 'Singapore',
      'SX'  => 'Sint Maarten (Dutch part)',
      'SK'  => 'Slovakia',
      'SI'  => 'Slovenia',
      'SB'  => 'Solomon Islands',
      'SO'  => 'Somalia',
      'ZA'  => 'South Africa',
      'GS'  => 'South Georgia and the South Sandwich Islands',
      'SS'  => 'South Sudan',
      'ES'  => 'Spain',
      'LK'  => 'Sri Lanka',
      'SD'  => 'Sudan',
      'SR'  => 'Suriname',
      'SJ'  => 'Svalbard and Jan Mayen',
      'SZ'  => 'Swaziland',
      'SE'  => 'Sweden',
      'CH'  => 'Switzerland',
      'SY'  => 'Syrian Arab Republic',
      'TW'  => 'Taiwan, Province of China',
      'TJ'  => 'Tajikistan',
      'TZ'  => 'Tanzania, United Republic of',
      'TH'  => 'Thailand',
      'TL'  => 'Timor-Leste',
      'TG'  => 'Togo',
      'TK'  => 'Tokelau',
      'TO'  => 'Tonga',
      'TT'  => 'Trinidad and Tobago',
      'TN'  => 'Tunisia',
      'TR'  => 'Turkey',
      'TM'  => 'Turkmenistan',
      'TC'  => 'Turks and Caicos Islands',
      'TV'  => 'Tuvalu',
      'UG'  => 'Uganda',
      'UA'  => 'Ukraine',
      'AE'  => 'United Arab Emirates',
      'GB'  => 'United Kingdom',
      'US'  => 'United States',
      'UM'  => 'United States Minor Outlying Islands',
      'UY'  => 'Uruguay',
      'UZ'  => 'Uzbekistan',
      'VU'  => 'Vanuatu',
      'VE'  => 'Venezuela, Bolivarian Republic of',
      'VN'  => 'Viet Nam',
      'VG'  => 'Virgin Islands, British',
      'VI'  => 'Virgin Islands, U.S.',
      'WF'  => 'Wallis and Futuna',
      'EH'  => 'Western Sahara',
      'YE'  => 'Yemen',
      'ZM'  => 'Zambia',
      'ZW'  => 'Zimbabwe'
    );

    function __construct() {
      register_activation_hook( plugin_dir_path(__FILE__) . 'OrgMap.php', array( $this, 'activate' ));

      add_action( 'init', array( $this, 'create_taxonomies') );

      add_action( 'init', array( $this, 'create_organization_cpt') );

      add_action( 'sdgs_add_form_fields', array( $this, 'add_sdg_order_field'), 10, 2 );
      add_action( 'created_sdgs', array( $this, 'save_sdg_order_meta'), 10, 2 );
      add_action( 'sdgs_edit_form_fields', array( $this, 'edit_sdg_order_field'), 10, 2 );
      add_action( 'edited_sdgs', array( $this, 'update_sdg_order'), 10, 2 );

      add_filter( 'manage_sdgs_custom_column', array( $this, 'add_sdg_order_column_content'), 10, 3 );
      add_filter( 'manage_edit-sdgs_columns', array( $this, 'add_sdg_order_column'), 10, 3 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_resources_field'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_resources_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_resources_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_resources'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_image'), 10, 2);
      add_action( 'created_countries', array( $this, 'save_country_image'), 10, 2 );
      add_action( 'countries_edit_form_fields', array ( $this, 'update_country_image' ), 10, 2 );
      add_action( 'edited_countries', array( $this, 'updated_country_image'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_npl'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_npl_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_npl_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_npl'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_npl_location'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_npl_location_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_npl_location_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_npl_location'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_poorest'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_poorest_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_poorest_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_poorest'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_literacy'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_literacy_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_literacy_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_literacy'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_mortality'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_mortality_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_mortality_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_mortality'), 10, 2 );

      add_action( 'countries_add_form_fields', array( $this, 'add_country_hdi'), 10, 2 );
      add_action( 'created_countries', array( $this, 'save_country_hdi_meta'), 10, 2 );
      add_action( 'countries_edit_form_fields', array( $this, 'edit_country_hdi_field'), 10, 2 );
      add_action( 'edited_countries', array( $this, 'update_country_hdi'), 10, 2 );

      add_action( 'admin_footer', array ( $this, 'image_script', 100 ) );

      add_action( 'add_meta_boxes', array( $this, 'OrgMap_organization_full_name'), 10, 3 );
      add_action( 'save_post', array( $this, 'OrgMap_organization_full_name_box_save'), 10, 3 );
      add_action( 'add_meta_boxes', array( $this, 'OrgMap_organization_url'), 10, 3 );
      add_action( 'save_post', array( $this, 'OrgMap_organization_url_box_save'), 10, 3 );
    }

    function activate() {
      $this->create_organization_cpt();
      $this->create_taxonomies();

      foreach($this->sdgs as $i => $sdg){
        $term = wp_insert_term($sdg, 'sdgs');
        if(is_array($term)){
          $id = $term['term_id'];
          update_term_meta( $id, 'sdg_order', $i );
        }
      }
      // register countries
      foreach($this->countries as $slug => $country){
        $term = wp_insert_term($country, 'countries', array('slug' => strtolower($slug)));
      }
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

    // Add custom "resources" field for countries
    function add_country_resources_field($taxonomy) {
        wp_nonce_field( basename( __FILE__ ), 'country_resources_nonce' );
        echo '<div class="form-field term-group">
            <label for="resources">Resources</label>';
        wp_editor('', 'resources');
        echo '</div>';

    }
    // Save Country Resources  field
    function save_country_resources_meta( $term_id, $tt_id ){
      if ( ! isset( $_POST['country_resources_nonce'] ) || ! wp_verify_nonce( $_POST['country_resources_nonce'], basename( __FILE__ ) ) ) {
    		return;
    	}
      if( isset( $_POST['resources'] ) && '' !== $_POST['resources'] ){
        $resources = $_POST['resources'];
        add_term_meta( $term_id, 'resources', sanitize_details($resources), true );
      }
    }
    // Edit Country Resources  field
    function edit_country_resources_field( $term, $taxonomy ){
        // get current Country Resources  code
        $resources = get_term_meta( $term->term_id, 'resources', true );
        echo '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="resources">Resources</label></th>
                <td>';
                wp_nonce_field( basename( __FILE__ ), 'country_resources_nonce' );
                wp_editor( sanitize_details($resources), 'resources');
        echo '</td></tr>';

    }
    // Update Country Resources  Field
    function update_country_resources( $term_id, $tt_id ){
      if ( ! isset( $_POST['country_resources_nonce'] ) || ! wp_verify_nonce( $_POST['country_resources_nonce'], basename( __FILE__ ) ) ) {
    		return;
    	}
      if( isset( $_POST['resources'] ) && '' !== $_POST['resources'] ){
        $resources = $_POST['resources'];
        update_term_meta( $term_id, 'resources', sanitize_details($resources) );
      }
    }

    // add custom image header for country page
    public function add_country_image ( $taxonomy ) { ?>
      <div class="form-field term-group">
        <label for="country-image-id"><?php _e('Image', 'OrgMap'); ?></label>
        <input type="hidden" id="country-image-id" name="country-image-id" class="custom_media_url" value="">
        <div id="country-image-wrapper"></div>
        <p>
          <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'OrgMap' ); ?>" />
          <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'OrgMap' ); ?>" />
        </p>
      </div>
     <?php
    }

    // image js script to manage WP Image editor
    public function image_script(){ ?>
       <script>
         jQuery(document).ready( function($) {
           function ct_media_upload(button_class) {
             var _custom_media = true,
             _orig_send_attachment = wp.media.editor.send.attachment;
             $('body').on('click', button_class, function(e) {
               var button_id = '#'+$(this).attr('id');
               var send_attachment_bkp = wp.media.editor.send.attachment;
               var button = $(button_id);
               _custom_media = true;
               wp.media.editor.send.attachment = function(props, attachment){
                 if ( _custom_media ) {
                   $('#country-image-id').val(attachment.id);
                   $('#country-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                   $('#country-image-wrapper .custom_media_image').attr('src',attachment.sizes.thumbnail.url).css('display','block');
                 } else {
                   return _orig_send_attachment.apply( button_id, [props, attachment] );
                 }
                }
             wp.media.editor.open(button);
             return false;
           });
         }

         ct_media_upload('.ct_tax_media_button.button');
         jQuery('body').on('click','.ct_tax_media_remove',function(){
           jQuery('#country-image-id').val('');
           jQuery('#country-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
         });
         // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
         jQuery(document).ajaxComplete(function(event, xhr, settings) {
           var queryStringArr = settings.data.split('&');
           if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
             var xml = xhr.responseXML;
             $response = $(xml).find('term_id').text();
             if($response!=""){
               // Clear the thumb image
               $('#country-image-wrapper').html('');
             }
           }
         });
       });
     </script>
     <?php
    }
    // save image meta
    public function save_country_image ( $term_id, $tt_id ) {
     if( isset( $_POST['country-image-id'] ) && '' !== $_POST['country-image-id'] ){
        $image = $_POST['country-image-id'];
        add_term_meta( $term_id, 'country-image-id', $image, true );
      }
    }
    // update country image
    public function update_country_image ( $term, $taxonomy ) { ?>
      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="country-image-id"><?php _e( 'Image', 'OrgMap' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta ( $term -> term_id, 'country-image-id', true ); ?>
          <input type="hidden" id="country-image-id" name="country-image-id" value="<?php echo $image_id; ?>">
          <div id="country-image-wrapper">
          <?php
          if ( $image_id ) {
            echo wp_get_attachment_image ( $image_id, 'thumbnail' );
          }
          ?>
          </div>
          <p>
            <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'OrgMap' ); ?>" />
            <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'OrgMap' ); ?>" />
          </p>
        </td>
      </tr>
    <?php
    }
    // save edit to country image
    public function updated_country_image ( $term_id, $tt_id ) {
      if( isset( $_POST['country-image-id'] ) && '' !== $_POST['country-image-id'] ){
        $image = $_POST['country-image-id'];
        update_term_meta ( $term_id, 'country-image-id', $image );
      } else {
        update_term_meta ( $term_id, 'country-image-id', '' );
      }
    }


    /** Country stat NPL **/
    function add_country_npl($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-npl">Population below the National Poverty Line (%)</label>
            <input type="text" class="post-form" id="country-npl" name="country-npl">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL field
    function save_country_npl_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-npl'] ) && '' !== $_POST['country-npl'] ){
            $country_npl = filter_var($_POST['country-npl'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-npl', $country_npl, true );
        }
    }
    // Edit country stat NPL field
    function edit_country_npl_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-npl', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-npl">Population below the National Poverty Line (%)</label></th>
                <td>
                  <input type="text" class="post-form" id="country-npl" name="country-npl" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL Field
    function update_country_npl( $term_id, $tt_id ){
        if( isset( $_POST['country-npl'] ) && '' !== $_POST['country-npl'] ){
            $country_npl = filter_var($_POST['country-npl'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-npl', $country_npl );
        }
    }

    /** Country stat NPL Location **/
    function add_country_npl_location($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-npl-rural">Population in rural areas below the National Poverty Line (%)</label>
            <input type="text" class="post-form" id="country-npl-rural" name="country-npl-rural">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL location field
    function save_country_npl_location_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-npl-rural'] ) && '' !== $_POST['country-npl-rural'] ){
            $country_npl = filter_var($_POST['country-npl-rural'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-npl-rural', $country_npl, true );
        }
    }
    // Edit country stat NPL location field
    function edit_country_npl_location_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-npl-rural', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-npl-rural">Population in rural areas below the National Poverty Line (%)</label></th>
                <td>
                  <input type="text" class="post-form" id="country-npl-rural" name="country-npl-rural" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL location Field
    function update_country_npl_location( $term_id, $tt_id ){
        if( isset( $_POST['country-npl-rural'] ) && '' !== $_POST['country-npl-rural'] ){
            $country_npl = filter_var($_POST['country-npl-rural'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-npl-rural', $country_npl );
        }
    }


    /** Country stat NPL Location **/
    function add_country_poorest($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-global-poorest">Population in the global poorest 20% (%)</label>
            <input type="text" class="post-form" id="country-global-poorest" name="country-global-poorest">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL location field
    function save_country_poorest_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-global-poorest'] ) && '' !== $_POST['country-global-poorest'] ){
            $country_npl = filter_var($_POST['country-global-poorest'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-global-poorest', $country_npl, true );
        }
    }
    // Edit country stat NPL location field
    function edit_country_poorest_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-global-poorest', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-global-poorest">Population in the global poorest 20% (%)</label></th>
                <td>
                  <input type="text" class="post-form" id="country-global-poorest" name="country-global-poorest" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL location Field
    function update_country_poorest( $term_id, $tt_id ){
        if( isset( $_POST['country-global-poorest'] ) && '' !== $_POST['country-global-poorest'] ){
            $country_npl = filter_var($_POST['country-global-poorest'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-global-poorest', $country_npl );
        }
    }


    /** Country stat NPL Location **/
    function add_country_literacy($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-literacy">Adult Literacy (%)</label>
            <input type="text" class="post-form" id="country-literacy" name="country-literacy">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL location field
    function save_country_literacy_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-literacy'] ) && '' !== $_POST['country-literacy'] ){
            $country_npl = filter_var($_POST['country-literacy'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-literacy', $country_npl, true );
        }
    }
    // Edit country stat NPL location field
    function edit_country_literacy_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-literacy', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-literacy">Adult Literacy (%)</label></th>
                <td>
                  <input type="text" class="post-form" id="country-literacy" name="country-literacy" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL location Field
    function update_country_literacy( $term_id, $tt_id ){
        if( isset( $_POST['country-literacy'] ) && '' !== $_POST['country-literacy'] ){
            $country_npl = filter_var($_POST['country-literacy'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-literacy', $country_npl );
        }
    }



    /** Country stat NPL Location **/
    function add_country_mortality($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-mortality">Infant mortality rate (per 1000)</label>
            <input type="text" class="post-form" id="country-mortality" name="country-mortality">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL location field
    function save_country_mortality_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-mortality'] ) && '' !== $_POST['country-mortality'] ){
            $country_npl = filter_var($_POST['country-mortality'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-mortality', $country_npl, true );
        }
    }
    // Edit country stat NPL location field
    function edit_country_mortality_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-mortality', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-mortality">Infant mortality rate (per 1000)</label></th>
                <td>
                  <input type="text" class="post-form" id="country-mortality" name="country-mortality" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL location Field
    function update_country_mortality( $term_id, $tt_id ){
        if( isset( $_POST['country-mortality'] ) && '' !== $_POST['country-mortality'] ){
            $country_npl = filter_var($_POST['country-mortality'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-mortality', $country_npl );
        }
    }

    /** Country stat NPL Location **/
    function add_country_hdi($taxonomy) {
        $html = '<div class="form-field term-group">
            <label for="country-hdi">Human Development Index</label>
            <input type="text" class="post-form" id="country-hdi" name="country-hdi">
            <p class="description">Please insert only the number, with decimal marker being a period (50.3 and not 50,3)</p>
        </div>';
        echo $html;
    }
    // Save  country stat NPL location field
    function save_country_hdi_meta( $term_id, $tt_id ){
        if( isset( $_POST['country-hdi'] ) && '' !== $_POST['country-hdi'] ){
            $country_npl = filter_var($_POST['country-hdi'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            add_term_meta( $term_id, 'country-hdi', $country_npl, true );
        }
    }
    // Edit country stat NPL location field
    function edit_country_hdi_field( $term, $taxonomy ){
        // get current sdg order code
        $country_npl = get_term_meta( $term->term_id, 'country-hdi', true );
        $html = '<tr class="form-field term-group-wrap">
                <th scope="row"><label for="country-hdi">Human Development Index</label></th>
                <td>
                  <input type="text" class="post-form" id="country-hdi" name="country-hdi" value="' . $country_npl . '">
                  <p class="description">Please insert only the number, with decimal marker being a period (i.e. 50.3 and not 50,3)</p>
                </td>
                </tr>';
        echo $html;
    }
    // Update country stat NPL location Field
    function update_country_hdi( $term_id, $tt_id ){
        if( isset( $_POST['country-hdi'] ) && '' !== $_POST['country-hdi'] ){
            $country_npl = filter_var($_POST['country-hdi'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            update_term_meta( $term_id, 'country-hdi', $country_npl );
        }
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

    /** Custom Meta Boxes for the CPT **/
    /** Add Full Name text box **/
    function OrgMap_organization_full_name() {
        add_meta_box(
            'organization_full_name_box',
            __( 'Organization Full Name', 'orgmap' ),
            array($this, 'OrgMap_organization_full_name_box_content'),
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
    function OrgMap_organization_url() {
        add_meta_box(
            'organization_url_box',
            __( 'Organization Website URL', 'orgmap' ),
            array($this, 'OrgMap_organization_url_box_content'),
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




  }
