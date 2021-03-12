<?php

$args = [
    'post_type' => ['post', 'articles'],
    'posts_per_page' => 4,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'rand',
];

$posts = new WP_Query($args);

$posts_count = $posts->max_num_pages;

if($posts_count ): ?>

<div class="sidebar-widget">
    <div class="header">
        <h4>بیشتر بخوانید</h4>
    </div>
    <ul class="separator">

<?php while($posts->have_posts()): $posts->the_post(); ?>
        <li>
            <div class="service-item">
                <div class="thumb"><?php the_post_thumbnail() ?></div>
                <h4><a href="<?php the_permalink() ?>"><? the_title() ?></a></h4>
            </div>
        </li>
    <?php endwhile; ?>
    </ul>
</div>
<?php endif; wp_reset_postdata() ?>