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
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/resources-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-10 col-lg-8">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#resourceDocs">
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

			      <div class="container">
				  <p></p> <p></p>
					  <center><iframe width="560" height="315" src="https://www.youtube.com/embed/_q_WnULT44I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>
					    <p></p> <p></p>
			</div>
			
    <section id="resourceDocs">
      <div class="container">
        <div class="row">
          <div class="col">
            <ul class="nav nav-pills nav-justified" id="resourceNav" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="whitepapers-tab" data-toggle="tab" href="#whitepapers" role="tab" aria-controls="whitepapers" aria-selected="true">
                <div class="resource-icon"><img class="img-fluid svg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/whitepaper-icon.svg" alt="An icon showing a stacked group of two landcape sheets"></div>Featured Articles</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="caseStudies-tab" data-toggle="tab" href="#caseStudies" role="tab" aria-controls="caseStudies" aria-selected="false">
                  <div class="resource-icon"><img class="img-fluid svg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/case-study-icon.svg" alt="An icon showing a document with a magnifying glass"></div>Case Studies</a>
              </li>
              <li class="nav-item"
                ><a class="nav-link" id="webinars-tab" data-toggle="tab" href="#webinars" role="tab" aria-controls="webinars" aria-selected="false">
                  <div class="resource-icon"><img class="img-fluid svg" src="<?php echo get_stylesheet_directory_uri(); ?>/img/webinar-icon.svg" alt="An icon showing a browser window with an instructor on the display"></div>E-Books</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <div class="tab-content" id="resourceContent">
      <div class="tab-pane fade show active"id="whitepapers" role="tabpanel" aria-labelledby="whitepapers-tab">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title red">Featured Articles</h2>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
              <?php 
                $args = array(
                  'post_type' => 'resource_docs',
                  'tax_query' => array(
                    array (
                    'taxonomy' => 'doc_type',
                    'field' => 'slug',
                    'terms' => 'press',
                    ),
                  ),
                ); 
                $wp_resources = new WP_Query($args);
                if ( $wp_resources->have_posts() ) :
              ?>
              <ul class="documents row justify-content-center">
                <?php while ( $wp_resources->have_posts() ) : 
                  $wp_resources->the_post();
                  $wp_url= get_field('link');
                ?>
                <li class="col-md-4 col-sm-6">
                  <div class="card">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'full', array( 'class'  => 'card-img-top img-fluid' ) );
                   } else { 
                    ?>
	                    <img class="card-img-top img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/whitepaper-default-thubmail.jpg">
                    <?php } ?>
                    <div class="card-body">
                      <small>Whitepaper</small>
                      <h5 class="card-title"><?php the_title(); ?> </h5>
                      <a class="btn btn-outline-brand-red stretched-link" href="<?php the_field('article'); ?>" target="_blank">Get It</a>
                    </div>
                  </div>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </ul>
              <?php else : ?>
                <p class="text-center mb-5">Stay tuned! We’re going to be updating this section shortly.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Whitepaper Tab -->
     <div class="tab-pane fade"id="caseStudies" role="tabpanel" aria-labelledby="caseStudies-tab">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title red">Case Studies</h2>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
              <?php 
                $args = array(
                  'post_type' => 'resource_docs',
                  'tax_query' => array(
                    array (
                    'taxonomy' => 'doc_type',
                    'field' => 'slug',
                    'terms' => 'case-study',
                    ),
                  ),
                ); 
                $cs_resources = new WP_Query($args);
                if ( $cs_resources->have_posts() ) :
              ?>
              <ul class="documents row justify-content-center">
                <?php while ( $cs_resources->have_posts() ) : 
                  $cs_resources->the_post();
                ?>
                <li class="col-md-4 col-sm-6">
                  <div class="card">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'full', array( 'class'  => 'card-img-top img-fluid' ) );
                    } else { 
                    ?>
	                    <img class="card-img-top img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/case-study-default-thubmail.jpg">
                    <?php } ?>
                    <div class="card-body">
                      <small>Case Study</small>
                      <h5 class="card-title"><?php the_title(); ?> </h5>
                      <?php if( get_field('pdf') ): ?>
                      <a class="btn btn-outline-brand-red stretched-link" href="<?php the_field('pdf'); ?>" target="_blank">Get It</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </ul>
              <?php else : ?>
                <p class="text-center mb-5">Stay tuned! We’re going to be updating this section shortly.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Case Studies Tab -->
      <div class="tab-pane fade"id="webinars" role="tabpanel" aria-labelledby="webinars-tab">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title red">E-Book</h2>
            </div>
          </div>
          <div class="row">

            <div class="col-md-12">
            <?php 
                $args = array(
                  'post_type' => 'resource_docs',
                  'tax_query' => array(
                    array (
                    'taxonomy' => 'doc_type',
                    'field' => 'slug',
                    'terms' => 'ebooks',
                    ),
                  ),
                ); 
                $web_resources = new WP_Query($args);
                if ( $web_resources->have_posts() ) :
              ?>
              <ul class="documents row justify-content-center">
                <?php while ( $web_resources->have_posts() ) : 
                  $web_resources->the_post();
                  $web_url= get_field('link');
                ?>
                <li class="col-md-4 col-sm-6">
                  <div class="card">
                    <?php
                    if ( has_post_thumbnail() ) {
                      the_post_thumbnail( 'full', array( 'class'  => 'card-img-top img-fluid' ) );
                     } else { 
                    ?>
	                    <img class="card-img-top img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/webinar-default-thubmail.jpg">
                    <?php } ?>
                    <div class="card-body">
                      <small>E-Book</small>
                      <h5 class="card-title"><?php the_title(); ?> </h5>
                      <a class="btn btn-outline-brand-red stretched-link" href="<?php the_field('ebooks'); ?>" target="_blank">Get It</a>
                    </div>
                  </div>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              </ul>
              <?php else : ?>
                <p class="text-center mb-5">Stay tuned! We’re going to be updating this section shortly.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Webinar Tab -->


    </div>

    <?php get_template_part( 'template-parts/content-cta' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
