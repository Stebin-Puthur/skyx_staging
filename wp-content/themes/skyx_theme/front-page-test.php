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

<div class="home-banner d-flex justify-content-center align-items-center parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/homepage-banner-bg.jpg" data-speed="0.5" data-position-y="top">
  <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
  <a class="anchor" href="#<?php the_field('banner_anchor'); ?>">
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

      <!-- Section Introduction -->
      <section id="intro">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-11">
              <h2 class="section-title"><?php the_field('introduction_title'); ?></h2>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <ul class="features">
                <?php 
									if( have_rows('introduction_features') ):
									$num = 0;
									while ( have_rows('introduction_features') ) : the_row();
									$feature_icon = get_sub_field('introduction_feature_icon');
									$feature_content = get_sub_field('introduction_feature_content');
								?>
                <li>
                  <div class="feature-image">
                    <img src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>">
                  </div>
                  <div class="feature-text">
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
          <div class="row">
            <div class="col text-center mt-3">
              <a class="btn btn-outline-primary" href="<?php the_field('introduction_action'); ?>">Learn More</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Pipeline Integrity -->
      <section id="pipeline-integrity">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title yellow"><?php the_field('pipeline_integrity_title'); ?></h2>
              <ul class="features">
                <?php 
									if( have_rows('pipeline_integrity_features') ):
									$num = 0;
									while ( have_rows('pipeline_integrity_features') ) : the_row();
                  $feature_icon = get_sub_field('pipeline_integrity_feature_icon');
                  $feature_title = get_sub_field('pipeline_integrity_feature_title');
                  $feature_content = get_sub_field('pipeline_integrity_feature_content');
                  $feature_action = get_sub_field('pipeline_integrity_feature_action');
                ?>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                  <div class="feature-image"><img class="img-fluid svg" src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>"></div>
                  <div class="feature-text">
                    <h3><?php echo $feature_title; ?></h3>
                    <?php echo $feature_content; ?>
                  </div>
                  <div class="feature-action"><a class="btn btn-outline-brand-gold" href="<?php echo $feature_action; ?>">Learn More</a></div>
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
                  <img class="img-fluid" src="<?php echo $drone_image['url']; ?>" alt="<?php echo $drone_image['alt']; ?>" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000" data-aos-once="true">
                  <img class="img-fluid" src="<?php echo $launch_pad_image['url']; ?>" alt="<?php echo $launch_pad_image['alt']; ?>" data-aos="fade-up" data-aos-delay="50" data-aos-duration="1000" data-aos-once="true">
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

      <!-- Powerful A.I. Systems -->
      <section id="ai-systems">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title green"><?php the_field('ai_systems_title'); ?></h2>
              <div class="carousel slide carousel-fade d-flex row" id="aiSystemsCarousel" data-ride="carousel" data-interval="4000">
	              <ol class="carousel-indicators col-md-5">
		           	<?php 
					if( have_rows('ai_systems_features') ):
						$num = 0;
						while ( have_rows('ai_systems_features') ) : the_row();
						$ai_systems_feature_caption = get_sub_field('ai_systems_feature_caption');
                	?>
	                <li <?php if (!$num) {?> class="active"<?php }?> data-target="#aiSystemsCarousel" data-slide-to="<?php echo $num; ?>">
	                  <h5><?php echo $ai_systems_feature_caption; ?></h5>
	                </li>
	                <?php
						$num += 1;
						endwhile;
						else :
						endif;
					?>
	              </ol>
	              <div class="carousel-inner d-flex align-items-center col-md-7">
		            <?php 
					if( have_rows('ai_systems_features') ):
						$num = 0;
						while ( have_rows('ai_systems_features') ) : the_row();
						$ai_systems_feature_image = get_sub_field('ai_systems_feature_image');
                	?>
	                <div class="carousel-item <?php if (!$num) {?>active<?php }?>"><img class="img-fluid" src="<?php echo $ai_systems_feature_image['url']; ?>" alt="<?php echo $ai_systems_feature_image['alt']; ?>"></div>
	                <?php
						$num += 1;
						endwhile;
						else :
						endif;
					?>
	              </div>
	              <a class="carousel-control-prev" href="#aiSystemsCarousel" role="button" data-slide="prev"><i class="fal fa-chevron-left"></i><span class="sr-only">Previous</span></a>
	              <a class="carousel-control-next" href="#aiSystemsCarousel" role="button" data-slide="next"><i class="fal fa-chevron-right"></i><span class="sr-only">Next</span></a>
              </div>
              <div class="features-thumbs">
                <ul>
                <?php 
					if( have_rows('ai_systems_features') ):
					$num = 0;
					while ( have_rows('ai_systems_features') ) : the_row();
					$ai_systems_feature_image = get_sub_field('ai_systems_feature_image');
					$ai_systems_feature_caption = get_sub_field('ai_systems_feature_caption');
                ?>
                  <li> 
                    <a href="<?php echo $ai_systems_feature_image['url']; ?>" data-lightbox="powerful-ai" data-title="<?php echo $ai_systems_feature_caption; ?>">
                      <img class="img-fluid" src="<?php echo $ai_systems_feature_image['url']; ?>" alt="<?php echo $ai_systems_feature_image['alt']; ?>">
                    </a>
                    <span><?php echo $ai_systems_feature_caption; ?></span>
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

      <?php get_template_part( 'template-parts/content-news' ); ?>

      <?php get_template_part( 'template-parts/content-cta' ); ?>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
