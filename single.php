<?php 
get_header();

the_post();
?>
    <div class="container">
        <div id="PostSingle">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <div class="head-section">
                        <div class="thumbnail">
                            <?php the_post_thumbnail() ?>
                        </div>
                        <div class="left-side">
                            <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                            <div class="cats">
                                <?php get_template_part('template-parts/content/content', 'cats-ul'); ?>
                            </div>
                        </div>
                    </div>
                </div>                  
            </div>
            <div class="row content-row">
                <div class="col-12 col-lg-9 body-text">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    <div class="Tags__frame tags">
                        <h4>برچسب‌ها</h4>
                        <?php get_template_part('template-parts/content/content', 'tags-ul'); ?>
                    </div>
                </div>
             <div class="col-12 col-lg-3 sidebar">
                    <div class="sidebar-widget author-widget">
                        <div class="author-header">
                            <div class="thumb">
                                <?php echo get_avatar(get_the_author_meta('ID'), 64) ?>
                            </div>
                            
                            <h4><?php the_author_posts_link(); ?></h4>
                        </div>
                        <div class="body">
                            <div class="author-bio">
                                <?php the_author_meta('description') ?>
                            </div>
                            <div class="post-date">
                                <?php echo get_the_date('l, j F Y');?>
                            </div>
                        </div>
                    </div>
                    

                     <?php get_template_part('template-parts/content/content', 'read-more-post'); ?>
                     <?php get_template_part('template-parts/content/content', 'featured-services-sidebar'); ?>
                    
                </div>
            </div>
        </div>
    </div>
    <?php get_template_part('template-parts/content/content', 'ask-question'); ?>

<?php 

get_footer(); ?>
