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
<div class="page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo get_stylesheet_directory_uri(); ?>/img/company-banner-bg.jpg" data-speed="0.6" data-position-y="bottom">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-10">
        <h1 class="page-title"><?php the_field('banner_title'); ?></h1>
        <?php the_field('banner_content'); ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#leadership-team">
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

      <!-- Section Leadership Team -->
      <section id="leadership-team">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title"><?php the_field('leadership_team_title'); ?></h2>
              <ul class="team">
                <?php 
					if( have_rows('leadership_team_members') ):
					$num = 0;
					while ( have_rows('leadership_team_members') ) : the_row();
					$team_member_photo = get_sub_field('leadership_team_member_photo');
					$team_member_photo_colour = get_sub_field('leadership_team_member_photo_colour');
					$team_member_name = get_sub_field('leadership_team_member_name');
					$team_member_title = get_sub_field('leadership_team_member_title');
					$team_member_linkedin = get_sub_field('leadership_team_member_linkedin');
				?>
                <li>
                  <div class="member-photo">
                    <img class="img-fluid" src="<?php echo $team_member_photo['url']; ?>" alt="<?php echo $team_member_photo['alt']; ?>">
                    <img class="img-fluid img-top" src="<?php echo $team_member_photo_colour['url']; ?>" alt="<?php echo $team_member_photo_colour['alt']; ?>">
                  </div>
                  <div class="member-info">
                    <div class="member-name-link">
                      <span class="name"><?php echo $team_member_name; ?></span>
                      <a class="linkedin" href="<?php echo $team_member_linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <div class="member-title"><?php echo $team_member_title; ?></div>
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

      <!-- Section Drone As A Service -->
      <section id="strategicPartnerships">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2 class="section-title"><?php the_field('partnership_title'); ?></h2>
              <ul class="partners">
                <?php 
					if( have_rows('partnership') ):
					$num = 0;
					while ( have_rows('partnership') ) : the_row();
					$partnership_logo = get_sub_field('partnership_logo');
					$partnership_name = get_sub_field('partnership_name');
					$partnership_link = get_sub_field('partnership_link');
				?>
                <li data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                  <a href="<?php echo $partnership_link; ?>" target="_blank">
                    <div class="sr-only"><?php echo $partnership_name; ?></div>
                    <img class="img-fluid" src="<?php echo $partnership_logo['url']; ?>" alt="<?php echo $partnership_logo['alt']; ?>">
                  </a>
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

      <?php get_template_part( 'template-parts/content-news' ); ?>

      <?php get_template_part( 'template-parts/content-careers' ); ?>

      <?php get_template_part( 'template-parts/content-cta' ); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
