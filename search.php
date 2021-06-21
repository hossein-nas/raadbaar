<?php get_header(); ?>
<main id="Archive" class="posts">
    <section class="header-section">
        <h4>نتایج جستجو "<?php echo get_search_query() ?>"</h4>
    </section>
    <div class="container">
        <div class="col col-md-10 mx-auto">
            <section id="Posts-List" >
                <?php
                if (have_posts()):
                    while (have_posts()): the_post();
                        ?>
                        <?php get_template_part('template-parts/content/content', 'archive-item-' . get_post_type());?>
                        <?php
                    endwhile;

                else: ?>
                    <div class="text-center">چیزی برای نمایش وجود ندارد</div>
                    <?php
                endif;

                ?>
                
            </section>
            <?php rb_pagination(); ?>
        </div>
    </div>
</main>
<?php get_footer() ?>
