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
$counter = new WP_Query(
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
$counter = $counter->found_posts;
?>
<header class="country-taxonomy-archive country-<?php echo $term->slug; ?> cf">
  <div class="main-taxonomy-description">
    <h1><?php echo $term->name; ?></h1>
    <p class="country-taxonomy-description">
      <?php echo $term->description; ?>
    </p>
  </div>
  <div class="taxonomy-stats">
    <div class="counter">
      <span class="taxonomy-counter-number"><?php echo $counter; ?></span>
      <span class="taxonomy-counter-label"><?php echo ($counter != 1  ? __('Organizations or initiatives in this country') : __('Organization or initiative in this country')); ?></span>
    </div>
    <div class="taxonomy-graph">
      <img src="<?php echo plugins_url( 'assets/images/graph_dummy.png', dirname(__FILE__) ); ?>" alt="graphs of dummy data">
    </div>
    <div class="taxonomy-resources">
      <h3>Resources</h3>
      <?php echo get_term_meta($term->term_id, 'resources', true); ?>
    </div>
  </div>
</header>
<nav class="sdg-tabs">
  <h3>View Initiatives and Organizations by SDG</h3>
  <?php  OrgMap_sdg_terms(); ?>
</nav>
<?php while ( have_posts() ) : the_post(); ?>
<article class="country-taxonomy-entry sdg-hidden cf <?php OrgMap_org_sdg_classes(); ?>">
  <header>
    <h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
    <h3><?php echo get_post_meta( get_the_ID(), 'full_name', true); ?></h3>
    <span class="orgmap_countries"><?php the_terms(get_the_ID(), 'countries'); ?></span>
  </header>
  <aside>
    <?php OrgMap_org_sdg_terms(); ?>
  </aside>
</article>
<?php
endwhile;
get_footer();
?>
