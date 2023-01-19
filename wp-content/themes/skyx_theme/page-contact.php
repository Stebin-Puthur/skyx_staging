<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
      <div class="col col-md-10">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#contactForm">
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
    <section id="contactForm">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title"><?php the_field('contact_form_title'); ?></h2>
            <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            the_content();
            endwhile; 
            else: 
            ?>
            <p>Sorry, no posts matched your criteria.</p>
            <?php 
            endif; 
            ?>
          </div>
        </div>
      </div>
    </section>
    <section id="officeLocations">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title"><?php the_field('office_location_title'); ?></h2>
          </div>
        </div>
      </div>
      <ul class="locations">
        <?php 
          if( have_rows('office_locations') ):
          $num = 0;
          while ( have_rows('office_locations') ) : the_row();
          $location_type = get_sub_field('location_type');
          $location_place = get_sub_field('location_place');
          $location_map = get_sub_field('location_map');
        ?>
        <li>
          <div class="location-info">
            <div class="location-type"><?php echo $location_type; ?></div>
            <div class="location-place"><?php echo $location_place; ?></div>
            <div class="location-map" id="<?php echo $location_map; ?>"></div>
          </div>
        </li>
        <?php
          $num += 1;
          endwhile;
          else :
          endif;
        ?>
      </ul>
    </section>
    
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
