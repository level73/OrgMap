<?php
/**
 * Template for Single Organization view
 *
 * @package Wordpress
 * @subpackage Organization Map Plugin
 */

get_header();
while ( have_posts() ) : the_post();
?>
  <h1><?php the_title(); ?></h1>
  <h2><?php echo get_post_meta( get_the_ID(), 'full_name', true); ?></h2>
  <span class="orgmap_countries"><?php the_terms(get_the_ID(), 'countries'); ?></span>
  <p><?php the_content(); ?></p>
  <?php OrgMap_org_sdg_terms(); ?>
  <hr />
  <?php OrgMap_org_sdg_terms(false); ?>
<?php
endwhile;
get_footer();
?>
