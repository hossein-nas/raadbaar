<?php
$args = [
    'post_type' => 'post',
    'post_per_page' => 4,
];
$news = new WP_Query($args);
$count = wp_count_posts('post')->publish;

if($count): ?>
<article id="News">
    <div class="list">

<?php while($news->have_posts() ): $news->the_post(); ?>
        <div class="item">
            <a href="<?php the_permalink() ?>">
                <div class="thumbnail"> <?php the_post_thumbnail('medium') ?> </div>
                <div class="body">
                    <h3 class="title"><?php the_title() ?></h3>
                    <p class="text">حمل و نقل بار و کالا بصورت بین شهری یکی از ویژه ترین خدمات مجموعه آنی بار است که با کمترین و به همراه بهترین بیمه نامه در اختیار شما هزینه قرار میگیرد .</p>
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
        <?php endwhile; ?>

    </div>

    <div class="fw-link-more">
        <a href="<?php echo get_post_type_archive_link('post'); ?>">
            <i class="bi-arrow-left-short"></i>
            <span>مطالعه‌ی اخبار بیشتر</span>
        </a>
    </div>

</article>
<?php
endif; wp_reset_postdata();
?>
