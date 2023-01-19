<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
      
			<section class="error-404 not-found">
        <div class="container">
          <div class="row my-5">
            <div class="col text-center my-5">
              <header class="page-header mt-5">
                <h1 class="display-1">404</h1>
                <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'skyx_theme' ); ?></h1>
              </header><!-- .page-header -->
              <div class="page-content">
                <p><?php esc_html_e( 'It looks like nothing was found at this location.', 'skyx_theme' ); ?></p>
              </div><!-- .page-content -->
            </div>
          </div>
        </div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
