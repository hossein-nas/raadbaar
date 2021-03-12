<?php 
$args = array(
    'post_type' => 'social_media',
);

$links = new WP_Query($args);


while($links->have_posts() ): $links->the_post();?>
                    <div class="icon">
                        <a href="<?php echo get_field('link'); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                    </div>
<?php endwhile; ?>