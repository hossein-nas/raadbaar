<?php
$args = [
    'post_type' => 'services',
    'posts_per_page' => 5,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'meta_query' => array(
        array(
            'key' => 'featured',
            'compare' => '=',
            'value' => 1
        )
    ),
];
$services = new WP_Query($args);
$count_posts = wp_count_posts('services')->publish;
if($count_posts): ?>
        <section id="featuredServices">
            <div class="container">
                <div class="header-section">
                    <h3>خدمات مجموعه رادبــار</h3>
                    <p class="caption">بی دردسرترین و راحت ترین تجربه حمل بار هدف اصلی مجموعه ما می‌باشد و با تمامی توانمان تلاش می‌کنیم تا با ارائه خدمات مناسب شما عزیزان را به مشتری دائم خودمان تبدیل کنیم</p>
                </div>
                <div class="items">
<?php
    while( $services->have_posts() ): $services->the_post();?>

                    <div class="item service-card">
                        <div class="thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="body">
                            <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                            <p><?php echo wp_trim_words(get_the_content(), 40); ?></p>
                        </div>
                        <a class="link-to-more" href="<?php the_permalink()?>">اطلاعات بیشتر</a>
                    </div>
<?php
    endwhile;
?>                    
                </div>
                <div class="items-archive">
                    <a href="<?php echo get_post_type_archive_link('services'); ?>">
                        <i class="bi-arrow-left-short"></i>
                        مشاهده تمامی خدمات
                    </a>
                </div>
            </div>
        </section>
<?php endif; wp_reset_postdata(); ?>
