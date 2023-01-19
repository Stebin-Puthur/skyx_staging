<?php
/**
 * The template for displaying Privacy Policy Pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package skyx_theme
 */

get_header();
?>
<div class="single-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
</div>
</header><!-- #masthead -->

<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <section id="story">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
            <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'policy' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
            </div>
          </div>
        </div>
      </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
