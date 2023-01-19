<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="article-img">
	<?php skyx_theme_post_thumbnail(); ?>
	</div>
  
	<div class="story">
	    <h4 class="article-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
	    <div class="entry-content">
			<?php the_excerpt(); ?>
	    </div>
		<div class="meta">
			Posted: <span class="date"><?php the_date();?></span>
  		</div>
  	</div>
</li>