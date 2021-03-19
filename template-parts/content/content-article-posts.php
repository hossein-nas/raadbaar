<?php

$args = [
    'post_type' => 'articles',
    'post_per_page' => 4,
];
$articles = new WP_Query($args);

$articles_count = wp_count_posts('articles')->publish;

if($articles_count) :?>

<article id="Posts">
    <div class="list">

<?php while($articles->have_posts() ): $articles->the_post(); ?>

        <div class="item">
            <a href="<?php the_permalink() ?>">
                <div class="thumbnail">
                    <?php the_post_thumbnail('medium') ?>
                </div>
                <div class="body">
                    <h3 class="title"><?php the_title() ?></h3>
                    <p class="text"><?php echo wp_trim_words( get_the_content(), 30 ) ?></p>
                    <div class="detail">
                        <div class="author">
                            <div class="thumbnail">
                                <?php echo get_avatar( get_the_author_meta('ID'), 32) ?>
                            </div>
                            <?php the_author() ?>
                        </div>
                        <div class="date">
                            <?php echo fa_number(human_time_diff(get_post_time('U'))) ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
<?php endwhile; wp_reset_postdata(); ?>
        
    </div>
    <div class="fw-link-more">
        <a href="<?php echo get_post_type_archive_link('articles'); ?>">
            <i class="bi-arrow-left-short"></i>
            <span>مطالعه‌ی مقالات بیشتر</span>
        </a>
    </div>
</article>
<?php endif; wp_reset_postdata();?>