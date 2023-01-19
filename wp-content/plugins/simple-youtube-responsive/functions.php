<?php
/**********************************************************
 * Simple YouTube Responsive
 * Plugin Functions, Since version 2.0.0
 *
 ***********************************************************/

 if ( !defined('ABSPATH') ){
 	die;
 }
 
/* Get Shortcode Attr from Content */
function eirudo_ytresponsive_shortcodeattr( $content, $regex, $search ) {
	preg_match( "/$regex/", $content, $shortcode_atts );
	
	$search = $search . '=';

	if ( empty( $shortcode_atts ) ) {
		return false;
	}

	$matches = array_filter( $shortcode_atts, function( $var ) use ( $search ) {
		return ( 0 === strpos( trim( $var ), $search ) );
	}
	);

	if ( empty( $matches ) ) {
		return false;
	}

	$tmpArray = array_values( $matches );

	$value_string = array_shift( $tmpArray );

	$val = str_replace( $search , '', $value_string );

	$val = str_replace( '"', '', $val );
	$val = str_replace( "'", '', $val );
	$val = strtok($val, ' ');
	return trim( $val );
}


/*
Hijack shortcode for AMP.
Thanks to John Regan
https://johnregan3.co/2016/08/03/a-comprehensive-guide-to-supporting-amp-in-wordpress/#handling-shortcodes
*/
  function eirudo_ytresponsive_amp( $content ) {
    global $shortcode_tags;
    if ( !function_exists('is_amp_endpoint') || ! is_amp_endpoint() || empty( $shortcode_tags ) || ! is_array( $shortcode_tags ) || ! has_shortcode($content, 'youtube') ) {
      return $content;
    }else{

		$regex = get_shortcode_regex( array( 'youtube' ) );
		preg_match_all('/'.$regex.'/s', $content, $matches);

		// Hitung jumlah shortcode 
		if( $matches ){
		  $jumlahs = count($matches[1]);
		}
		
		for($i=0; $i < $jumlahs; $i++){

		  if ($matches[2][$i] == 'youtube'){
			// Fix attr yang terkumpul
			$attr_str = str_replace (" ", "&", trim ($matches[3][$i]));
			$attr_str = str_replace ('"', '', $attr_str);

			  //  Parse the attributes
			$defaults = array (
			  'ratio' => '16:9',
			);

			// Join if default belum diset
			$attributes = wp_parse_args ($attr_str, $defaults);

			$videoID = false;
			$videoRatio = '16:9';
			
			if ( isset( $attributes['v'] ) ){
				$videoID = $attributes['v'];
			}else if( isset( $attributes['video'] ) ){
				$videoID = $attributes['video'];
			}

			// Jika video ID ada, proses
			if( $videoID ){
			  // Check ratio
			  if ( isset( $attributes['ratio'] ) ){
				  $videoRatio = $attributes['ratio'];
			  }

			  $ratio = explode(':', $videoRatio);
				$ratioX = floatval( $ratio[0] );
				$ratioY = floatval( $ratio[1] );
				$videoWidth = $ratioX * 40;
				$videoHeight = $ratioY * 40;

			  // Get img Thumb
			  if ( isset( $attributes['thumb'] ) ){
				$imgSrc = $attributes['thumb'];
			  }else{
				$imgSrc = 'https://i.ytimg.com/vi/'.$videoID.'/hqdefault_live.jpg';
			  }

			  $vidThumb = '<amp-img src="'.$imgSrc.'" placeholder layout="fill" />';

			  $newEmbed = '<p><amp-youtube width="'.$videoWidth.'" height="'.$videoHeight.'" layout="responsive" data-videoid="'.$videoID.'">'.$vidThumb.'</amp-youtube></p>';

			  
			  // Replace shortcode using AMP Code
			  $toReplace = $matches[0][$i];
			  $content = str_replace($toReplace, '[EIRUDOYTRESPONSIVE-'.$i.']', $content);
			  
			  $content = str_replace( '[EIRUDOYTRESPONSIVE-'.$i.']', $newEmbed, $content );

			}
		  }
		}
		// Output
		return $content;
	}
}
add_filter( 'the_content', 'eirudo_ytresponsive_amp' );


/* Include YouTube AMP Scripts */
function eirudo_ytresponsive_amp_js() {
?>
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<?php
	}
add_action( 'amp_post_template_head', 'eirudo_ytresponsive_amp_js' );



/* Shortcode */
function eirudo_ytresponsive( $a ) {

// Unique ID
$unique = uniqid();

 $classing = '';
 $iding = '';
 $imgurl = '';
 
  //Field prefix
  $ytpref = '_eirudo_ytresponsive_';
  

    $tags = shortcode_atts( array(
		'v' => '',
		'video' => '',
		'ratio' => get_option( $ytpref . 'ratio', '16:9' ),
		'class' => get_option( $ytpref . 'classes', '' ),
  		'id' => '',
  		'style' => '',
		'center' => get_option( $ytpref . 'center', 'yes' ),
		'autoplay' => get_option( $ytpref . 'autoplay', 'no' ),
		'lazyload' => get_option( $ytpref . 'lazy', 'yes' ),
		'thumb' => '',
		'imgq' => get_option( $ytpref . 'thumbsize', 'hqdefault' ),
  		'maxwidth' => get_option( $ytpref . 'maxwidth', '100%' ),
		'loop' => get_option( $ytpref . 'loop', 'no' ),
		'controls' => '',
		'allowfullscreen' => get_option( $ytpref . 'fullscreen', 'yes' ),
		'start' => '',
		'end' => '',
		'param' => ''
      ), $a );

  // Shortcode correct or not
	if( $tags['v'] !== '' || $tags['video'] !== '' ){

    // Get video ID
  	if( $tags['v'] !== '' ){
  		$ytid = $tags['v'];
  	}else{
  		$ytid = $tags['video'];
  	}

    // Auto center or not
    if ( $tags['center'] === 'yes' ){
      $center = 'margin-right:auto !important;margin-left:auto !important;';
    } else {
      $center = '';
    }

    // Combine maxwidth and auto center
  	$css = 'width:100%;max-width:' . $tags['maxwidth'] . ';' . $center . 'display:block;clear:both;position:relative;';

    // Aspect ratio
    if( $tags['ratio'] === '' ){
      $tags['ratio'] = '16:9';
    }
  	$ratio = explode( ':', $tags['ratio'] );
  		$ratioX = floatval( $ratio[0] );
  		$ratioY = floatval( $ratio[1] );
  		$setRatio = ( floatval($ratioY) / floatval($ratioX) ) * 100;
  		$cssRatio = 'padding-bottom:' . $setRatio . '%;';
    
  	if( $tags['style'] !== '' ){
  		$css = $css . $tags['style'];
  	}

    // Add custom classes
    if( $tags['class'] !== '' ){
  		$classing = $classing . ' ' . $tags['class'];
  	}

    // Add custom ID
  	if($tags['id'] !== ''){
  		$iding = 'id="' . $tags['id'] . '"';	
  	}

    // Add css to embed code
    $css = ' style="' . $css . '"';
	
	
	// if param enabled, replace custom tags
	if($tags['param'] !== ''){
		$param = '?'.$tags['param'];
		
		//if there's no autoplay (for lazyload issues) add autoplay 
		$cekautoplay = strpos($param, 'autoplay');
		if(!$cekautoplay){
			$param = $param.'&autoplay=0';
		}
	}else{
		
		// Check autoplay 
		if( $tags['autoplay'] === 'yes' ){
			$autoplay = '&autoplay=1';
		}else{
			$autoplay = '&autoplay=0';
		}
		
		// Check custom youtube loop 
		if($tags['loop'] !== 'no'){
			$loop = '&loop=1';	
		}else{
			$loop = '';
		}
		
		// Check custom youtube fullscreen 
		if($tags['allowfullscreen'] !== 'yes'){
			$fullscreen = '&fs=0';	
		}else{
			$fullscreen = '';
		}
		
		// Check custom youtube controls 
		if($tags['start'] !== ''){
			$time = explode(':', $tags['start']);
			$minute = $time[0] * 60;
			$start = '&start='. ($minute + $time[1]);	
		}else{
			$start = '';
		}
		
		if($tags['end'] !== ''){
			$time = explode(':', $tags['end']);
			$minute = $time[0] * 60;
			$end = '&end='. ($minute + $time[1]);	
		}else{
			$end = '';
		}
		
		// Check custom youtube controls 
		if($tags['controls'] !== ''){
			$controls = '&controls='.$tags['controls'];	
		}else{
			$controls = '';
		}

		$param = '?rel=0&'.$autoplay.$start.$end.$loop.$fullscreen.$controls;
	} // end custom param 
	
    // Check lazy load
    if( $tags['lazyload'] === 'yes' ){

      $classing = $classing . ' erd-ytlazyload';
      
      // Set custom URL
      if( $tags['thumb'] !== '' ){
        $imgurl = $tags['thumb'];
      }else{
        $imgurl = 'https://i.ytimg.com/vi/' . $ytid . '/' . $tags['imgq'] . '.jpg';
      }
	  
		$param = str_replace('autoplay=0', 'autoplay=1', $param);

		$output = '<div class="erd-ytplay" id="erdytp-' . $unique . '" data-vid="' . $ytid . '" data-src="https://www.youtube.com/embed/'.$ytid.$param.'"><img src="' . $imgurl . '" alt="YouTube video" /></div>';
      
    }else{
      $output = '<iframe id="erdyti-' . $unique . '" src="https://www.youtube.com/embed/'.$ytid.$param.'" frameborder="0" allowfullscreen=""></iframe>';
    
    }

    // Output embed
  	return '<div id="erdyt-' . $unique . '" data-id="' . $unique . '" class="erd-youtube-responsive' . $classing . '" ' . $iding . ' ' . $css . '><div style="' . $cssRatio . '">' . $output . '</div></div>';
  		
	}else{
		return '';
	}
}
add_shortcode( 'youtube', 'eirudo_ytresponsive' );


/* Enable YouTube Responsive on widget */
add_filter('widget_text','do_shortcode');


/* Add Shortcode Button to TinyMCE Editor Toolbar */
function eirudo_ytresponsive_tinymce_init() {
	//Abort early if the user will never see TinyMCE
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
		return;

	//Add a callback to regiser our tinymce plugin   
	add_filter("mce_external_plugins", "eirudo_ytresponsive_tinymce_register"); 

	// Add a callback to add our button to the TinyMCE toolbar
	add_filter('mce_buttons', 'eirudo_ytresponsive_tinymce_button');
}
add_action('init', 'eirudo_ytresponsive_tinymce_init');

//This callback registers our plug-in
function eirudo_ytresponsive_tinymce_register($plugin_array) {
	$plugin_array['eirudo_ytresponsive'] = plugin_dir_url( __FILE__ ) . 'js/tinymce-buttons.js';
	return $plugin_array;
}

//This callback adds our button to the toolbar
function eirudo_ytresponsive_tinymce_button($buttons) {
	//Add the button ID to the $button array
	$buttons[] = "eirudo_ytresponsive";
	return $buttons;
}
