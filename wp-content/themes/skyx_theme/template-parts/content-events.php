<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package skyx_theme
 */

?>

<!-- News Component-->
<?php 
  $argsevents = array(
    'post_type' => 'events',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'ASC',
  ); 
  $uevents = new WP_Query($argsevents);
if ( $uevents->have_posts() ) :
?>
<!-- UPCOMING EVENTS COMPONENT-->
<section id="upcoming-events">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="section-title green">Upcoming Events</h2>
        <ul class="events">
        <?php while ( $uevents->have_posts() ) : $uevents->the_post(); ?>
        <?php 
        $format_in = 'Ymd';
        $format_month = 'F'; // the format you want to end up with
        $format_day = 'd';
        $date = DateTime::createFromFormat($format_in, get_field('event_date'));
?>
          <li>
            <div class="card">
              <div class="card-body">
                <div class="event-date"><span class="binds"></span><span class="month"><?php echo $date->format( $format_month ); ?></span><span class="day"><?php echo $date->format( $format_day ); ?></span></div>
                <div class="event-details">
                  <div class="event-type">
                    <?php
                      $terms = get_the_terms( $post->ID , 'event_type' );
                      foreach ( $terms as $term ) {
                        echo $term->name;
                      }
                    ?>
                  </div>
                  <div class="event-name"><?php the_title();?></div>
                  <div class="event-time"><?php the_field('event_start_time'); ?> - <?php the_field('event_end_time'); ?> <?php the_field('event_time_zone'); ?></div><a class="btn btn-outline-primary mt-2" href="<?php the_field('event_link'); ?>" target="_blank">Sign Up</a>
                </div>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </ul>
      </div>
    </div>
  </div>
</section>
<?php else : ?>
<?php endif; ?>