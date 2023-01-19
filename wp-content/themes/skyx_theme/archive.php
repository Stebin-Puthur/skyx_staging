<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

get_header();
?>
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/contact-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-10 col-lg-8">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#arch">
    <div class="scroll-down">
      <div class="chevron"></div>
      <div class="chevron"></div>
      <div class="chevron"></div>
    </div>
  </a>
</div>
</header><!-- #masthead -->

<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    <section id="arch">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-9">

		<?php if ( have_posts() ) : ?>
      <section id="news">
        <ul>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */

         
				get_template_part( 'template-parts/content', 'archive' );

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
    <div class="col-md-4 col-lg-3">
      <?php get_sidebar();?>
    </div>
    </div>
    </div>
    </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
