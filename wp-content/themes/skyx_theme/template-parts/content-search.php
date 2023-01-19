<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="meta">
    <i class="fal fa-newspaper"></i>
    <span class="date"><?php the_date();?></span>
  </div>
  <div class="story">
    <i class="fal fa-long-arrow-right"></i>
    <a class="article-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
  </div>
</li>
