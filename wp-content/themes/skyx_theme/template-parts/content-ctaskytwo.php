<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<!-- Primary CTA -->
<section id="cta-skytwo">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="cta-content">
          <h2><?php the_field('cta_title'); ?></h2>
          <?php the_field('cta_content'); ?>
        </div>
      </div>
    </div>
  </div>
</section>