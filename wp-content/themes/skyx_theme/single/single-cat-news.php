<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package skyx_theme
 */

get_header();
?>
<div class="single-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
</div>
</header><!-- #masthead -->

<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <section id="story">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
            <?php
            while ( have_posts() ) :
              the_post();

              get_template_part( 'template-parts/content', get_post_type() );

              the_post_navigation(array(
                'prev_text' => __( '<i class="fal fa-long-arrow-left"></i> Previous' ),
                'next_text' => __( 'Next <i class="fal fa-long-arrow-right"></i>' ),
                'in_same_term' => true,
                'screen_reader_text' => __( 'Continue Reading' ),
              ));

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;

            endwhile; // End of the loop.
            ?>
            </div>
            <div class="col-md-3">
              <?php get_sidebar();?>
            </div>
          </div>
        </div>
      </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
