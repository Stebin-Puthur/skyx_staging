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
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/solution-banner-bg-v4.jpg" data-speed="0.6" data-position-y="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-10 col-lg-8">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#howItWorks">
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

      <!-- Section How It Works -->
      <section id="howItWorks">
        <div class="container">
          <div class="row justify-content-md-center">
            <div class="col">
              <h2 class="section-title green"><?php the_field('how_it_works_title'); ?></h2>
              <?php the_field('how_it_works_content'); ?>
            </div>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-10 col-lg-9">
              <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php the_field('how_it_works_video_code');?>"></div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section How We're Better -->
      <section id="howWereBetter">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title green"><?php the_field('how_were_better_title');?></h2>
              <?php the_field('how_were_better_content');?>
            </div>
          </div>
        </div>
      </section>


      <!-- Section Drone As A Service -->
      <section id="droneAsAService">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title green"><?php the_field('drone_as_a_service_title'); ?></h2>
              <?php the_field('drone_as_a_service_content');?>
              <ul class="services">
                <?php 
									if( have_rows('drone_as_a_service_features') ):
									$num = 0;
									while ( have_rows('drone_as_a_service_features') ) : the_row();
									$feature_icon = get_sub_field('drone_as_a_service_feature_icon');
									$feature_content = get_sub_field('drone_as_a_service_feature_content');
								?>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                  <div class="service-icon">
                    <img class="img-fluid" src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>">
                  </div>
                  <div class="service-description">
                    <?php echo $feature_content; ?>
                  </div>
                </li>
                <?php
									$num += 1;
									endwhile;
									else :
									endif;
								?>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <?php get_template_part( 'template-parts/content-cta' ); ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
