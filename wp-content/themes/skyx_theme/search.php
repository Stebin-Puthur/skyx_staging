<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package skyx_theme
 */

get_header();
?>
<div class="single-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
</div>
</header><!-- #masthead -->

<div id="content" class="site-content">

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

      <section id="arch">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-lg-9">

    <?php if ( have_posts() ) : ?>
    
    <section id="news">
        

			<header class="page-header">
				<h2 class="page-title mb-5">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'skyx_theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
      </header><!-- .page-header -->
      
      <ul>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

      endwhile; ?>
      </ul>
			<?php bootstrap_pagination();  ?>

      </section>
    <?php 

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
    ?>
    </div>
    <div class="col-md-4 col-lg-3"">
      <?php get_sidebar();?>
    </div>
    </div>
    </div>
    </section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
