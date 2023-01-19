<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<!-- News Component-->
<section id="news">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="section-title grey">News & Press Releases</h2>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h5 class="mb-4"> <i class="fal fa-newspaper mr-3"></i> News</h5>
            <?php 
              $args = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 3,
                'cat' => '5,-40'
              ); 
              $news = new WP_Query($args);
            if ( $news->have_posts() ) :
            ?>
            <ul class="news">
            <?php while ( $news->have_posts() ) : $news->the_post(); ?>
              <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="meta">
                  <span class="date"><?php the_date();?></span>
                </div>
                <div class="story">
                  <i class="fal fa-long-arrow-right"></i>
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
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </ul>
            <?php else : ?>
            <p class="text-center">No News articles at the moment.</p>
            <?php endif; ?>
          </div>
          <div class="col-sm-12 col-md-6">
            <h5 class="mb-4"> <i class="fal fa-microphone-alt mr-3"></i>Press Releases</h5>
            <?php 
              $args = array(
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 3,
                'cat' => '40'
              ); 
              $press = new WP_Query($args);
            if ( $press->have_posts() ) :
            ?>
            <ul class="press">
            <?php while ( $press->have_posts() ) : $press->the_post(); ?>
              <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="meta">
                  <span class="date"><?php the_date();?></span>
                </div>
                <div class="story">
                  <i class="fal fa-long-arrow-right"></i>
                  <span class="is-pr">PR/</span>
                  <a class="article-title" href="<?php the_permalink();?>"><?php the_title(); ?></a>
                </div>
              </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            </ul>
            <?php else : ?>
            <p class="text-center">No News articles at the moment.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col text-center mt-3">
        <a class="btn btn-outline-brand-grey" href="/news/">View More</a>
      </div>
    </div>
  </div>
</section>
