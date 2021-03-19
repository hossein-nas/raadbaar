<section id="Vehicles">
    <div class="container ">
        <div class="header-section">
            <h3>انواع وسیله نقلیه</h3>
        </div>
        <div class="wrapper swiper-container" dir="rtl">
            <div class="navigation-arrows swiper-arrows">
                <span class="left swiper-next"><i class="bi-chevron-left "></i></span>
                <span class="right swiper-prev"><i class="bi-chevron-right"></i></span>
            </div>
            <div class="vehicles-list swiper-wrapper">

                <?php
                $args = [
                    'post_type' => 'vehicles',
                    'posts_per_page' => 16,
                    'orderby' => 'rand'
                ];
                $vehicles = new WP_Query($args);
                while( $vehicles->have_posts() ): $vehicles->the_post();
                ?>
                
                <div class="vehicle-item swiper-slide">
                    <h3 class="header"><?php the_title() ?></h3>
                    <div class="thumbnail">
                        <?php the_post_thumbnail('medium') ?>
                    </div>
                    <div class="link-to-vehicle">
                        <a href="<?php the_permalink() ?>">
                            اطلاعات تکمیلی در مورد <?php the_title() ?>
                            <i class="bi-arrow-left-short"></i>
                        </a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
        <div class="fw-link-more link-to-more-vehicles">
            <a href="<?php echo get_post_type_archive_link('vehicles') ?>">
                <i class="bi-arrow-left-short"></i>
                <span>مشاهده تمامی وسایل نقلیه</span>
            </a>
        </div>
    </div>
</section>