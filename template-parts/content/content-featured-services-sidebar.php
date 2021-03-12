<?php

$args = [
    'post_type' => 'services',
    'posts_per_page' => 4,
    'orderby' => 'rand',
    'meta_query' => array(
        [
            'key' => 'featured',
            'compore' => '=',
            'value' => 1
        ],
    ),
];

$services = new WP_Query($args);

$services_count = wp_count_posts('services')->publish;

if($services_count ): ?>

<div class="sidebar-widget">
    <div class="header">
        <h4>خدمات برگزیده‌ی ما</h4>
    </div>
    <ul class="separator">

<?php while($services->have_posts()): $services->the_post(); ?>
        <li>
            <div class="service-item enlarged">
                <div class="thumb"><?php the_post_thumbnail() ?></div>
                <h4><a href="<?php the_permalink() ?>"><? the_title() ?></a></h4>
            </div>
        </li>
    <?php endwhile; ?>
    </ul>
</div>
<?php endif; wp_reset_postdata() ?>