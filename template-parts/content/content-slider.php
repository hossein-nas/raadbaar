<?php
$args = array(
    'post_type' => 'slider',
    'posts_per_page' => 5,
);

$slider = new WP_Query($args);
$iteration = 0;

if($slider->found_posts): ?>
        <section id="slider">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">

                    <?php while($slider->have_posts() ): $slider->the_post(); ?>
                    <li data-bs-target="#carousel-<?php the_ID() ?>" data-bs-slide-to="<?php echo $iteration ?>" class="<?php echo $iteration ==0 ? 'active' : '' ?>"></li>
                    <?php $iteration++; endwhile; ?>
                </ol>
                <div class="carousel-inner">
                    <?php $iteration=0; while($slider->have_posts() ): $slider->the_post(); ?>
                    <div class="carousel-item <?php echo $iteration ==0 ? 'active' : '' ?>">
                        <?php the_post_thumbnail(0, array('class'=> 'd-block w-100')); ?>
                        <div class="carousel-caption d-none d-md-block">
                            <h5><a href="<?php the_field('related_post'); ?>"> <?php the_title(); ?> </a></h5>
                            <p><?php echo wp_strip_all_tags(get_the_content()) ?></p>
                        </div>
                    </div>
                    <?php $iteration++; endwhile; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>  
        </section>
<?php endif; ?>