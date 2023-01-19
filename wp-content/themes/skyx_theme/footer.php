<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package skyx_theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
      <div class="row align-items-center">
        <div class="col-lg text-center text-lg-left">
          <a class="logo" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="sr-only"><?php bloginfo( 'name' ); ?></span><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/img/skyx-logo-white-text.svg"></a>
        </div>
        <?php
        wp_nav_menu( array(
          'theme_location'    => 'footer-menu',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'col-lg-auto',
          'container_id'      => 'footer-menu-01',
          'menu_class'        => 'nav justify-content-center',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
        <div class="col">
          <ul class="nav justify-content-center justify-content-lg-end">
            <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/SkyxSystems/" target="_blank"><span class="sr-only">Facebook</span><i class="fab fa-facebook-square"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="https://twitter.com/SkyXUAV" target="_blank"><span class="sr-only">Twitter</span><i class="fab fa-twitter-square"></i></a></li>
            <li class="nav-item"><a class="nav-link" href="https://www.linkedin.com/company/skyx-systems/" target="_blank"><span class="sr-only">LinkedIn</span><i class="fab fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col">
          <ul class="legal text-center">
            <li>&copy; <?php echo date('Y'); ?> SkyX. All rights reserved.</li>
            <li><a href="/privacy/">Privacy Policy</a></li>
            <li><a href="/cookie-policy/">Cookie Policy</a></li>
          </ul>
        </div>
      </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
        
   

<?php wp_footer(); ?>

</body>
</html>
