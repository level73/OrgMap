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
