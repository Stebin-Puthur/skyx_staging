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
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/Team-Photo-After-Mexico-Success-banner.jpg" data-speed="0.6" data-position-y="center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#team">
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

    
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title"><?php the_field('team_intro'); ?></h2>
          </div>
        </div>
      </div>
    </section>

    <section id="perksBenefits">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title yellow"><?php the_field('perks_benefits_title'); ?></h2>
            <ul class="perks">
              <?php 
                if( have_rows('perks_benefits_features') ):
                $num = 0;
                while ( have_rows('perks_benefits_features') ) : the_row();
                $feature_icon = get_sub_field('perks_benefits_feature_icon');
                $feature_content = get_sub_field('perks_benefits_feature_content');
              ?>
              <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <div class="service-icon">
                  <img class="img-fluid" src="<?php echo $feature_icon['url']; ?>" alt="<?php echo $feature_icon['alt']; ?>">
                </div>
                <div class="service-description"><?php echo $feature_content; ?></div>
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

    <section id="testimonials">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title yellow"><?php the_field('testimonial_title'); ?></h2>
            <?php 
              $args = array(
                'post_type' => 'testimonials'
              ); 
              $testimonials = new WP_Query($args);
              if ( $testimonials->have_posts() ) :
            ?>
            <ul class="quotes">
            <?php while ( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
              <li>
                <div class="user-photo">
                  <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'full', array( 'class'  => 'img-fluid' ) );
                    }
                  ?>
                </div>
                <div class="user-quote">
                  <blockquote class="blockquote">
                    <?php the_content(); ?>
                    <footer class="blockquote-footer"><span><?php the_title(); ?></span>, 
                      <cite tite="<?php the_field('testimonial_user_title'); ?>"><?php the_field('testimonial_user_title'); ?></cite>
                    </footer>
                  </blockquote>
                </div>
              </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
            <?php else : ?>
            <p class="text-center">No Testimonials at the moment.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section id="byTheNumbers">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title yellow"><?php the_field('by_the_numbers_title'); ?></h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-9">
            <h3 class="text-center"><?php the_field('employees_fact_title'); ?></h3>
            <p class="text-center"><?php the_field('employees_fact_content'); ?></p>
            <?php 
              $map_photo = get_field('employees_fact_image');
              if( !empty($map_photo) ): ?>
              <img class="img-fluid" src="<?php echo $map_photo['url']; ?>" alt="<?php echo $map_photo['alt']; ?>">
            <?php 
              endif; 
            ?>
          </div>
        </div>
      </div>
    </section>

    <section id="openPositions">
      <div class="container">
        <div class="row">
          <div class="col">
            <h2 class="section-title yellow"><?php the_field('jobs_title'); ?></h2>
            <?php 
              $args_jobs = array(
                'post_type' => 'jobs'
              ); 
              $jobs = new WP_Query($args_jobs);
              if ( $jobs->have_posts() ) :
            ?>
            <ul class="job-list">
              <?php while ( $jobs->have_posts() ) : $jobs->the_post(); ?>
              <li><a class="job-title" href="<?php the_field('job_link'); ?>" target="_blank"><?php the_title();?></a>
                <div class="job-location"><?php the_field('job_location'); ?></div>
              </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
            <?php else : ?>
            <div class="text-center">
            <h3 class="text-center">Don’t see an open position?
            <a href="mailto:careers@skyx.com?subject=Career Opportunity at SkyX?&">Tell us why you're mission ready.</a></h3>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
