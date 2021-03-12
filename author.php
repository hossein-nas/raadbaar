<?php get_header(); ?>
        <main id="Archive" class="author-archive">
            <section class="header-section">
                <div class="author-thumb">
                    <div class="thumb">
                        <?php echo get_avatar(get_the_author_meta("ID")) ?>
                    </div>
                    <h4><?php echo get_the_author_posts_link() ?></h4>
                    <span><?php echo count_user_posts(get_the_author_meta('ID')); ?> نوشته</span>
                </div>
                <p><?php the_archive_description() ?></p>
            </section>
            <div class="container">
                <div class="col col-md-10 mx-auto">
                    <section id="Posts-List" >
<?php 
    if(have_posts() ):
    while(have_posts()): the_post();
?>
                       <?php get_template_part('template-parts/content/content','archive-item-' . get_post_type() );?>
<?php
    endwhile;

    else: ?>
                        <div class="text-center">چیزی برای نمایش وجود ندارد</div>
<?php
    endif;

?>
                        
                    </section>
                    <section id="Pagination">
                        <ul class="pagination-links">
                            <li class="page prev"><a href="#link"></a></li>
                            <li class="page"><a href="#link">۱</a></li>
                            <li class="page"><a href="#link">۲</a></li>
                            <li class="page current"><a href="#link">۳</a></li>
                            <li class="page"><a href="#link">۴</a></li>
                            <li class="to"></li>
                            <li class="page"><a href="#link">۹</a></li>
                            <li class="page next"><a href="#link"></a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </main>
<?php get_footer() ?>