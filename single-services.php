<?php

get_header();

while (have_posts()): the_post();
    ?>
    <div class="container">
        <section id="ServicesSingle">
            <div class="row">
                <div class="col-12">
                    <ul class="breadcrumb">
                        <?php get_template_part('template-parts/content/content', 'service-breadcrumb'); ?>
                        <li class="active"> <a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="head-section">
                        <div class="thumbnail">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>

                        <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    </div>
                </div>                  
            </div>
            <div class="row content-row">
                <div class="col-12 col-lg-9 body-text">
                    <div class="content"><?php the_content(); ?></div>
                </div>

                <div class="col-12 col-md-3 sidebar">

                 <?php get_template_part('template-parts/content/content', 'get-sub-services'); ?> 
                 <related-vehicles :post-id="<?php the_ID() ?>"></related-vehicles>
                 
            </div>
        </div>
    </section>
</div>
<?php
endwhile;

$fast_order_needed  = get_field('fast_order_needed');


if ($fast_order_needed) {
    get_template_part('template-parts/content/content', 'fast-ordering');
}
get_template_part('template-parts/content/content', 'ask-question');

get_footer();
?>