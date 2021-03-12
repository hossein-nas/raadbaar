                        <div class="item <?php echo get_post_type() ?>">
                            <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
                            <div class="body">
                                <div class="header">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                    <span class="human-time"><?php echo human_time_diff( get_post_time('U') ); ?> پیش</span>
                                </div>
                                <div class="body-text">
                                    <?php echo wp_strip_all_tags(get_the_content()); ?>
                                </div>
                                <div class="bottom-detail">
                                    <a href="#" class="author">
                                        <div class="thumb">
                                            <?php echo get_avatar( get_the_author_meta('ID'), 48); ?>
                                        </div>
                                        <?php the_author_posts_link(); ?>
                                    </a>
                                    <div class="tags">
                                        <?php get_template_part('template-parts/content/content', 'tags-ul'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>