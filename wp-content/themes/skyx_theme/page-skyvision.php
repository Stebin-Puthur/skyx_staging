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

<div class="skytwo-banner d-flex justify-content-center align-items-center" >
  <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
  <a class="anchor" href="#<?php the_field('banner_anchor'); ?>">
    <div class="scroll-down">
      <div class="chevron"></div>
      <div class="chevron"></div>
      <div class="chevron"></div>
    </div>
  </a>
  <video id="homepageVideo" autoplay loop mute playsinline poster="<?php echo get_stylesheet_directory_uri(); ?>/img/homepagevideo-poster.jpg">
    <source src="<?php echo get_stylesheet_directory_uri(); ?>/img/video/Website_video_nosound.webm" type="video/webm">
     <source src="<?php echo get_stylesheet_directory_uri(); ?>/img/video/Website_video_nosound.mp4" type="video/mp4">
  </video>
</div>

</header><!-- #masthead -->

<div id="content" class="site-content">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

      <!-- Section Introduction -->
      <section id="intro">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-11">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Key Benefits -->
      <section id="keyBenefits">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title yellow"><?php the_field('key_benefit_title'); ?></h2>
              <ul class="features">
                <?php 
									if( have_rows('key_benefit_features') ):
									$num = 0;
									while ( have_rows('key_benefit_features') ) : the_row();
                  $feature_icon = get_sub_field('key_benefit_feature_icon');
                  $feature_title = get_sub_field('key_benefit_feature_title');
                  $feature_content = get_sub_field('key_benefit_feature_content');
                ?>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                  <div class="feature-image"><img class="img-fluid svg" src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>"></div>
                  <div class="feature-text">
                    <h3><?php echo $feature_title; ?></h3>
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
      </section>

      <!-- Aerial Systems -->
      <?php 
        $aerial_systems_background = get_field('aerial_systems_background');
        $drone_image = get_field('drone_image');
        $launch_pad_image = get_field('launch_pad_image');
      ?>
      <section id="aerial-systems" class="parallax-window" data-image-src="<?php echo $aerial_systems_background['url']; ?>" data-speed="0.5" data-position-y="top">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title"><?php the_field('aerial_systems_title'); ?></h2>
              <div class="specs">
                <ul class="order-1 order-md-0">
                <?php 
									if( have_rows('specs_left') ):
									$num = 0;
									while ( have_rows('specs_left') ) : the_row();
                  $spec_left_value = get_sub_field('spec_left_value');
                  $spec_left_alt_value = get_sub_field('spect_left_alt_value');
                  $spec_left_label = get_sub_field('spec_left_label');
                ?>
                  <li>
                    <div class="spec-value"><?php echo $spec_left_value; ?></div>
                    <div class="spec-conversion"><?php echo $spec_left_alt_value; ?></div>
                    <div class="spec-label"><?php echo $spec_left_label; ?></div>
                  </li>
                <?php
									$num += 1;
									endwhile;
									else :
									endif;
								?>
                </ul>
                <div class="drone-img order-0 order-md-1">
                  <img class="skytwo-drone img-fluid" src="<?php echo $drone_image['url']; ?>" alt="<?php echo $drone_image['alt']; ?>" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" data-aos-once="true">
                </div>
                <ul class="order-1 order-md-2">
                <?php 
									if( have_rows('specs_right') ):
									$num = 0;
									while ( have_rows('specs_right') ) : the_row();
                  $spec_right_value = get_sub_field('spec_right_value');
                  $spec_right_alt_value = get_sub_field('spect_right_alt_value');
                  $spec_right_label = get_sub_field('spec_right_label');
                ?>
                  <li>
                    <div class="spec-value"><?php echo $spec_right_value; ?></div>
                    <div class="spec-conversion"><?php echo $spec_right_alt_value; ?></div>
                    <div class="spec-label"><?php echo $spec_right_label; ?></div>
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
        </div>
      </section>


      <?php get_template_part( 'template-parts/content-cta' ); ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
