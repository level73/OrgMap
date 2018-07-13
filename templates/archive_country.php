<?php
/**
 * Template for Country Taxonomy view
 *
 * @package Wordpress
 * @subpackage Organization Map Plugin
 */

get_header();
?>
<?php
// get Taxonomy Data
$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );


// $counter                  = $counter->found_posts;
$image_id                 = get_term_meta ( $term->term_id, 'country-image-id', true );
$country_npl              = get_term_meta ( $term->term_id, 'country-npl', true );
$country_npl_rural        = get_term_meta ( $term->term_id, 'country-npl-rural', true );
$country_global_poorest   = get_term_meta ( $term->term_id, 'country-global-poorest', true );
$country_literacy         = get_term_meta ( $term->term_id, 'country-literacy', true );
$country_mortality        = get_term_meta ( $term->term_id, 'country-mortality', true );
$country_hdi              = get_term_meta ( $term->term_id, 'country-hdi', true );
$resources                = get_term_meta($term->term_id, 'resources', true);
?>
<header class="country-taxonomy-archive country-<?php echo $term->slug; ?> cf">

  <h1>
    <?php if(!empty($image_id)): ?>
    <?php echo wp_get_attachment_image ( $image_id, 'country-header', false, array('class' => 'country-header') ); ?>
    <span class="country-taxonomy-title"><?php echo $term->name; ?></span>
    <?php else: ?>
    <?php echo $term->name; ?>
    <?php endif; ?>
  </h1>

  <div class="main-taxonomy-description">
    <p class="country-taxonomy-description">
      <?php echo $term->description; ?>
    </p>
  </div>
  <div class="taxonomy-stats">

    <div class="taxonomy-graph cf">
      <?php if(!empty($country_npl)): ?>
      <div class="taxonomy-data taxonomy-data-2">
        <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
          <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
          <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>
          <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ce4b99" stroke-width="3" stroke-dasharray="<?php echo $country_npl . ' ' . (100 - $country_npl); ?>" stroke-dashoffset="25"></circle>
          <g class="chart-text">
            <text x="50%" y="50%" class="chart-number">
              <?php echo $country_npl; ?>%
            </text>
          </g>
        </svg>
        <h3>Population living below the national poverty line</h3>
      </div>
      <?php endif; ?>

      <?php if(!empty($country_npl_rural)): ?>
      <div class="taxonomy-data taxonomy-data-2">
        <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
          <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
          <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>
          <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ce4b99" stroke-width="3" stroke-dasharray="<?php echo $country_npl_rural . ' ' . (100 - $country_npl_rural); ?>" stroke-dashoffset="25"></circle>
          <g class="chart-text">
            <text x="50%" y="50%" class="chart-number">
              <?php echo $country_npl_rural; ?>%
            </text>
            <text x="50%" y="50%" class="chart-label">
              rural
            </text>
          </g>
        </svg>
        <h3>Rural Population living below the national poverty line</h3>
      </div>
      <?php endif; ?>

      <?php if(!empty($country_global_poorest)): ?>
      <div class="taxonomy-data taxonomy-data-2">
        <svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
          <circle class="donut-hole" cx="21" cy="21" r="15.91549430918954" fill="#fff"></circle>
          <circle class="donut-ring" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#d2d3d4" stroke-width="3"></circle>
          <circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="#ce4b99" stroke-width="3" stroke-dasharray="<?php echo $country_global_poorest . ' ' . (100 - $country_global_poorest); ?>" stroke-dashoffset="25"></circle>
          <g class="chart-text">
            <text x="50%" y="50%" class="chart-number">
              <?php echo $country_global_poorest; ?>%
            </text>
          </g>
        </svg>
        <h3>National % of Global Poorest 20%</h3>
      </div>
    <?php endif; ?>
    </div>
    <div class="taxonomy-graph cf">
      <?php if(!empty($country_literacy)): ?>
      <div class="taxonomy-data taxonomy-data-3">
        <span class="taxonomy-data-value"><?php echo $country_literacy; ?>%</span>
        <h3>Adult Literacy Percentage</h3>
      </div>
      <?php endif; ?>
      <?php if(!empty($country_mortality)): ?>
      <div class="taxonomy-data taxonomy-data-3">
        <span class="taxonomy-data-value"><?php echo $country_mortality; ?></span>
        <h3>Infant Mortality Rate (per 1000)</h3>
      </div>
      <?php endif; ?>
      <?php if(!empty($country_hdi)): ?>
      <div class="taxonomy-data taxonomy-data-1">
        <span class="taxonomy-data-value"><?php echo $country_hdi; ?></span>
        <h3>Human Development Index</h3>
      </div>
      <?php endif; ?>
    </div>
    <?php if(!empty($resources)): ?>
    <div class="taxonomy-resources">
      <h3>Resources</h3>
      <?php echo $resources; ?>
    </div>
    <?php endif; ?>
  </div>
</header>



<?php

wp_reset_query();
wp_reset_postdata();


$orgs = new WP_Query(
  array(
    'post_type' => 'organization',
    'tax_query' => array(
  		array(
  			'taxonomy' => 'countries',
  			'field'    => 'slug',
  			'terms'    => $term->slug
  		),
  	)
  )
);

?>

<nav class="sdg-tabs">
  <h3>View Initiatives and Organizations by SDG</h3>

  <div class="taxonomy-counter">
    <span class="taxonomy-counter-number"><?php echo $orgs->post_count; ?></span>
    <span class="taxonomy-counter-label"><?php echo ($orgs->post_count > 1  ? __('Organizations or initiatives in this country') : __('Organization or initiative in this country')); ?></span>
  </div>
  <?php
  // OrgMap_sdg_terms();
  $terms = get_the_terms($post->id, 'sdgs');
  if(!empty($terms) && !is_wp_error($terms)){
    echo '<ul class="sdg-term-list">';
    foreach($terms as $term){
      $sdg_order = get_term_meta($term->term_id, 'sdg_order', true);
      echo '<li class="sdg-term-' . $sdg_order .  ' sdg-icon-list"><a class="sdg-taxonomy-term sdg-icon sdg-term-' . $sdg_order . '" href="/sdg/' . $term->slug . '" title="' . $term->name . '" alt="' . $term->name . '" >' . $term->name . '</a></li>';
    }
    echo '</ul>';
  }

  ?>
</nav>
<?php while ( $orgs->have_posts() ) : $orgs->the_post(); ?>
<article class="country-taxonomy-entry  cf <?php OrgMap_org_sdg_classes(); ?>">
  <header>
    <h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
    <h3><?php echo get_post_meta( get_the_ID(), 'full_name', true); ?></h3>
    <span class="orgmap_countries"><?php the_terms(get_the_ID(), 'countries'); ?></span>
  </header>
  <aside>
    <?php OrgMap_org_sdg_terms(); ?>
  </aside>
</article>
<?php
endwhile;

wp_reset_query();
wp_reset_postdata();

get_footer();
?>
