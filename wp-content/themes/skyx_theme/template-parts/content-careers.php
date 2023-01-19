<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<!-- Careers CTA -->
<section class="parallax-window" id="careers" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/careers-bg.jpg" data-speed="0.9" data-position-y="top">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="cta-content">
          <h2><?php the_field('career_title'); ?></h2>
          <?php the_field('career_content'); ?>
        </div>
      </div>
    </div>
  </div>
</section>