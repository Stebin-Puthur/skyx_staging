<section id="officeLocations">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="section-title"><?php the_field('office_location_title'); ?></h2>
            </div>
        </div>
    </div>
    <ul class="locations">
        <?php
        if( have_rows('office_locations') ):
            $num = 0;
            while ( have_rows('office_locations') ) : the_row();
                $location_image = get_sub_field('location_image');
                $location_type = get_sub_field('location_type');
                $location_place = get_sub_field('location_place');
                if($location_image == false && empty($location_image) && empty($location_placeo)){
                    echo "<h2>No Locations Found</h2>";
                }
                ?>
                <li>
                    <div class="location-info">
                        <div class="location-image">
                            <img src="<?php echo $location_image; ?>">
                        </div>
                        <div class="location-address">
                            <h3><?php echo $location_type; ?></h3>
                            <p ><?php echo $location_place; ?></p>
                        </div>
                    </div>
                </li>
                <?php
                $num += 1;
            endwhile;
        endif;
        ?>
    </ul>
</section>