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
  <div class="meta">
    <?php if ( in_category('press-release') ) { ?>
        <i class="fal fa-microphone-alt pl-2" title="Press Release"></i>
	<?php } else { ?>
		<i class="fal fa-newspaper" title="News"></i>
	<?php }?>
    <span class="date"><?php the_date();?></span>
  </div>
  <div class="story">
  	<i class="fal fa-long-arrow-right"></i>
  	<?php if ( in_category('press-release') ) { ?>
    <span class="is-pr">PR/</span>
	<?php } ?>
	<?php

		// vars	
		$external_url = get_field('external_link');
		
		// check
		if( in_array( "Yes", get_field( 'is_external' ) ) ): ?>
		<a class="article-title" href="<?php echo $external_url ?>" target="_blank"><?php the_title(); ?></a>
		<?php else : ?>
		<a class="article-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
		<?php endif; ?>
</div>
</li>