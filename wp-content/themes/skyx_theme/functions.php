<?php
/**
 * skyx_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skyx_theme
 */

if ( ! function_exists( 'skyx_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function skyx_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on skyx_theme, use a find and replace
		 * to change 'skyx_theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'skyx_theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'blog-post', 400, 250, array( 'center', 'center' ) );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'skyx_theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'skyx_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'skyx_theme_setup' );

add_filter( 'intermediate_image_sizes_advanced', 'prefix_remove_default_images' );
// Remove default image sizes here.
function prefix_remove_default_images( $sizes ) {
 unset( $sizes['small']); // 150px
 unset( $sizes['medium']); // 300px
 unset( $sizes['large']); // 1024px
 unset( $sizes['medium_large']); // 768px
 return $sizes;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skyx_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'skyx_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'skyx_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skyx_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar News', 'skyx_theme' ),
		'id'            => 'sidebar-news',
		'description'   => esc_html__( 'Add widgets here.', 'skyx_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Blog', 'skyx_theme' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'skyx_theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skyx_theme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function skyx_theme_scripts() {
  wp_enqueue_style('fontawesome-5-pro', 'https://pro.fontawesome.com/releases/v5.9.0/css/all.css', array(), null);
  wp_enqueue_style( 'skyx_theme-style', get_stylesheet_uri() );
  wp_enqueue_style('app-style', get_template_directory_uri() . '/css/app.css');
  wp_deregister_script( 'jquery' ); // Remove WP jQuery version
  wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '3.4.1', true );
  wp_deregister_script( 'jquery-migrate' ); // Remove WP jQuery version
  wp_enqueue_script( 'jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.0.1.min.js', array( 'jquery'), '3.0.1', true );
  wp_enqueue_script(  'popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array( 'jquery' ),'',true  );
  wp_enqueue_script( 'bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array( 'jquery' ),'',true );

	wp_enqueue_script( 'skyx_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
  wp_enqueue_script( 'skyx_theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
  wp_enqueue_script( 'hubspot', '//js.hsforms.net/forms/v2.js', array(), '20190604', true );
  wp_enqueue_script( 'aos-script', get_template_directory_uri() . '/js/vendor/aos.js', array(), '20190604', true );
  wp_enqueue_style('aos-style', get_template_directory_uri() . '/css/vendor/aos.css');
  wp_enqueue_script( 'pushy', get_template_directory_uri() . '/js/vendor/pushy.js', array(), '20190604', true );
  wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/vendor/parallax.min.js', array(), '20190604', true );
  wp_enqueue_style('lightbox-style', get_template_directory_uri() . '/css/vendor/lightbox.css');
  wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/js/vendor/lightbox.js', array(), '20190604', true );
  wp_enqueue_script( 'app-script', get_template_directory_uri() . '/js/app.js', array(), '20190604', true );
  if ( is_page( '26' ) ) {
    wp_enqueue_style('player-css', 'https://cdn.plyr.io/3.5.3/plyr.css');
    wp_enqueue_script( 'player-js', 'https://cdn.plyr.io/3.5.3/plyr.polyfilled.js', array(), '20190604', true );
    wp_enqueue_script( 'solution', get_stylesheet_directory_uri() . '/js/pages/solution.js', array(),'20190604',true );
  }

  if ( is_page( '14' ) ) {
    wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBcIW29-F8f7wZVTwYHp8k6l2KmmQxtADo&callback=initMap', array(), '20190604', true );
    wp_enqueue_script( 'contact', get_stylesheet_directory_uri() . '/js/pages/contact.js', array(),'20190604',true );
  }
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skyx_theme_scripts' );

function add_style_attributes( $html, $handle ) {

  if ( 'fontawesome-5-pro' === $handle ) {
      return str_replace( "media='all'", "media='all' integrity='sha384-vlOMx0hKjUCl4WzuhIhSNZSm2yQCaf0mOU1hEDK/iztH3gU4v5NMmJln9273A6Jz' crossorigin='anonymous'", $html );
  }

  return $html;
}
add_filter( 'style_loader_tag', 'add_style_attributes', 10, 2 );


add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );
function add_attribs_to_scripts( $tag, $handle, $src ) {

  if ( 'jquery' === $handle ) {
    return '<script type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>';
  }
  if ( 'jquery-migrate' === $handle ) {
    return '<script type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4=" crossorigin="anonymous"></script>';
  }
  if ( 'popper' === $handle ) {
    return '<script type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>';
  }
  if ( 'bootstrap' === $handle ) {
    return '<script type="text/javascript" src="' . esc_url( $src ) . '" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
  }

  if ( 'google-maps-api' === $handle ) {
    return '<script type="text/javascript" src="' . esc_url( $src ) . '" async defer></script>';
  }

return $tag;
}

/**
 * Register Custom Navigation Walker
 */
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

register_nav_menus( array(
  'main-menu-left' => __( 'Main Menu Left', 'skyx_theme' ),
  'main-menu-right' => __( 'Main Menu Right', 'skyx_theme' ),
  'footer-menu' => __( 'Footer Menu', 'skyx_theme' )
) );

//Create Custom Offcanvas menu
function offcanvas_menu() {
  register_nav_menu('mobile-menu',__( 'Offcanvas Menu' ));
}
add_action( 'init', 'offcanvas_menu' );

add_filter( 'nav_menu_link_attributes', 'my_menu_atts', 10, 3 );
function my_menu_atts( $atts, $item, $args )
{
  // Provide the id of the targeted menu item
  $menu_target = 20;

  // inspect $item

  if ($item->ID == $menu_target) {
    // original post used a comma after 'modal' but this caused a 500 error as is mentioned in the OP's reply
    $atts['data-toggle'] = '#';
    $atts['data-target'] = '#demoModal';
    $atts['class'] = 'btn btn-outline-light';
  }
  return $atts;
}

require get_template_directory() . '/inc/wp-bootstrap4.1-pagination.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//Remove title from Archive title
add_filter( 'get_the_archive_title', function ($title) {

  if ( is_category() ) {

          $title = single_cat_title( '', false );

      } elseif ( is_tag() ) {

          $title = single_tag_title( '', false );

      } elseif ( is_author() ) {

          $title = '<span class="vcard">' . get_the_author() . '</span>' ;

      }

  return $title;

});

/*
* Define a constant path to our single template folder
*/
define('SINGLE_PATH', TEMPLATEPATH . '/single');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;

/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :

if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

endforeach;
}

// Customize Search Form
function my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="md search-form" action="' . home_url( '/' ) . '" >
  <div class="form-group">
    <input class="search-field form-control" type="text" value="' . get_search_query() . '" name="s" id="s" />
    <label for="s">Search</label>
    <div class="line"></div>
  </div>
  <input class="sr-only" type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
  </form>';

  return $form;
}

add_filter( 'get_search_form', 'my_search_form', 100 );

//Exclude pages from WordPress Search
if (!is_admin()) {
  function wpb_search_filter($query) {
  if ($query->is_search) {
  $query->set('post_type', 'post');
  }
  return $query;
  }
  add_filter('pre_get_posts','wpb_search_filter');
  }


  add_filter( 'category_rewrite_rules', 'vipx_filter_category_rewrite_rules' );
function vipx_filter_category_rewrite_rules( $rules ) {
    $categories = get_categories( array( 'hide_empty' => false ) );

    if ( is_array( $categories ) && ! empty( $categories ) ) {
        $slugs = array();
        foreach ( $categories as $category ) {
            if ( is_object( $category ) && ! is_wp_error( $category ) ) {
                if ( 0 == $category->category_parent ) {
                    $slugs[] = $category->slug;
                } else {
                    $slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
                }
            }
        }

        if ( ! empty( $slugs ) ) {
            $rules = array();

            foreach ( $slugs as $slug ) {
                $rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')(/page/(\d)+/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
            }
        }
    }
    return $rules;
}

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/skyx-logo-colour.png);
		height:75px;
		width:380px;
		background-size: 380px 75px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );