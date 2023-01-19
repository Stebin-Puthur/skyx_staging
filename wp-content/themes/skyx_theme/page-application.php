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
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/application-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-10 col-lg-8">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#applications">
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

    <section id="applications">
      <div class="container">
        <div class="row">
          <div class="col">
          <?php 
            $args = array(
              'post_type' => 'applications'
            ); 
            $application = new WP_Query($args);
            if ( $application->have_posts() ) :
          ?>
            <ul class="nav nav-pills nav-justified" id="applicationNav" role="tablist">
            <?php while ( $application->have_posts() ) : $application->the_post(); 
            $slug = get_post_field( 'post_name', get_post() );
            ?>

              <li class="nav-item">
                <a class="nav-link <?php echo $application->current_post >= 1 ? '' : 'active'; ?>" id="<?php echo $slug; ?>-tab" data-toggle="tab" href="#<?php echo $slug; ?>" role="tab" aria-controls="<?php echo $slug; ?>" aria-selected="<?php echo $application->current_post >= 1 ? 'false' : 'true'; ?>">
                  <div class="application-icon">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'full', array( 'class'  => 'img-fluid svg' ) );
                    }
                    ?>
                  </div><?php the_title(); ?>
                </a>
              </li>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            </ul>
            <?php else : ?>
            <p class="text-center">No News articles at the moment.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <div class="tab-content" id="applicationContent">
      <?php 
        $args_content = array(
          'post_type' => 'applications'
        ); 
        $application_content = new WP_Query($args_content);
        if ( $application_content->have_posts() ) :
        while ( $application_content->have_posts() ) : $application_content->the_post();
        $slug = get_post_field( 'post_name', get_post() );
      ?>
      <div class="tab-pane fade <?php echo $application_content->current_post >= 1 ? '' : 'show active'; ?>" id="<?php echo $slug; ?>" role="tabpanel" aria-labelledby="<?php echo $slug; ?>-tab">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title yellow"><?php the_title(); ?></h2>
            </div>
          </div>
          <?php 
              if( have_rows('process') ):
              $pnum = 0;
              while ( have_rows('process') ) : the_row();
              $process_title = get_sub_field('process_title');
              $process_image = get_sub_field('process_image');
            ?>
          <div class="row mb-3">
              <div class="col-md-10">
			  	<div class="lead"><?php the_field('lead_in');?></div>
	          </div>
          </div>
          <div class="row mb-4">
              <div class="col-md-10">
	          	<img class="img-fluid rounded" src="<?php echo $process_image['url']; ?>" alt="<?php echo $process_image['alt']; ?>">
	          </div>
          </div>
	        <div class="row">
               <div class="col-md-10">
              <h3 class="approach-title"><?php echo $process_title; ?></h3>
              
              <ul class="steps">
              <?php 
                if( have_rows('process_step') ):
                $snum = 0;
                while ( have_rows('process_step') ) : the_row();
                $step_count= get_sub_field('process_step_count');
                $step_content= get_sub_field('process_step_content');
              ?>
                <li>
                  <div class="step-count"><?php echo $step_count; ?></div>
                  <div class="step-description"><?php echo $step_content; ?></div>
                </li>
              <?php
              $snum += 1;
              endwhile;
              else :
              endif;
              ?>
              </ul>
            </div>
          </div>
          <?php
              $pnum += 1;
              endwhile;
              else :
              endif;
            ?>
          <div class="row">
            <div class="col-md">
              <h3 class="text-left text-sm-center benefit-title"><?php the_field('benefits_title');?></h3>
              <ul class="benefits row">
              <?php 
                if( have_rows('benefits_content') ):
                $bnum = 0;
                while ( have_rows('benefits_content') ) : the_row();
                $benefit_title = get_sub_field('benefit_title');
                $benefit_content = get_sub_field('benefit_content');
              ?>
              <li class="col">
                <div class="benefit-label"><i class="fal fa-check"></i><span><?php echo $benefit_title; ?></span></div>
              </li>
              <?php
                $bnum += 1;
                endwhile;
                else :
                endif;
              ?>
              </ul>
            </div>
          </div>
        </div>
        <section class="results" style="background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/results-bg.jpg);">
	       <div class="container">
	          <div class="row">
	            <div class="col-md">
	              <h3 class="text-left text-sm-center results-title"><?php the_field('results_title');?></h3>
	              <ul class="results">
	              <?php 
	                if( have_rows('results_content') ):
	                $bnum = 0;
	                while ( have_rows('results_content') ) : the_row();
	                $result_title = get_sub_field('result_title');
	                $result_content = get_sub_field('result_content');
	              ?>
	              <li>
	                <div class="result-label"><span><?php echo $result_title; ?></span></div>
	                <div class="result-description"><?php echo $result_content; ?> </div>
	              </li>
	              <?php
	                $bnum += 1;
	                endwhile;
	                else :
	                endif;
	              ?>
	              </ul>
	            </div>
	          </div>
        	</div>
        </section>
      </div>
      <?php 
        endwhile;
        wp_reset_postdata(); 
        else : 
      ?>
        <p class="text-center">No News articles at the moment.</p>
      <?php 
        endif; 
      ?>
    </div>

    <?php get_template_part( 'template-parts/content-cta' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
