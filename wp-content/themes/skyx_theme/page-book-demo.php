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
global $post;

$book_a_demo_title = get_field('book_a_demo_title',$post->ID);
$book_a_demo_bg = get_field('book_a_demo_bg',$post->ID);
$bookImg = wp_get_attachment_image_src($book_a_demo_bg, 'full')[0];

$form_content = get_field('form_content',$post->ID);

$book_a_demo_30_min_paragraph = get_field('book_a_demo_30_min_paragraph',$post->ID);
$book_a_cards = get_field('book_a_cards',$post->ID);
$book_a_demo_button = get_field('book_a_demo_button',$post->ID);

?>
<div class=" book-demo-ban page-banner d-flex flex-column justify-content-center align-items-start parallax-window" data-image-src="<?php echo $bookImg ?>" data-speed="0.6" data-position-y="bottom">
  <div class="container inner-container-sec">
    <div class="row justify-content-left">
      <div class="col col-md-6">
       <?php 

       echo $book_a_demo_title; ?>
      </div>
    </div>
  </div>
  <a class="anchor" href="#contactForm">
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
            <!-- start: Book a Form-->
            <div class="book_form d-flex flex-column justify-content-center align-items-start ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col col-md-12">
                            <?php echo $form_content ?>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- end: Book a Form -->
            <!-- Start: Included Steps -->
            <div class="book_form_included d-flex flex-column justify-content-center align-items-start ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col col-md-12">
                            <div class="para_title">
                                <?php echo $book_a_demo_30_min_paragraph ?>
                            </div>
                            <div class="book_cards">
                                 <?php if(have_rows('book_a_cards', $post->ID)) { ?>
                                    <div class="book_crds">
                                         <?php while (have_rows('book_a_cards', $post->ID)) {
                                            the_row();

                                            $cards_details = get_sub_field('cards_details', $post->ID);

                                            ?>
                                            <div class="bookCrd">
                                                <?php echo $cards_details?>
                                            </div>
                                         <?php }?>
                                    </div>
                                 <?php }?>
                            </div>
                            <div class="book_btn">
                                <?php echo $book_a_demo_button ?>
                            </div>
                            

                        </div>
                    </div>
        
                </div>
            </div>
            <!-- End: Included Steps -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
