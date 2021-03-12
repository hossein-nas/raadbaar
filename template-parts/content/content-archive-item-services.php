                        <div class="item service">
                            <div class="thumbnail"><?php the_post_thumbnail(); ?></div>
                            <div class="body">
                                <div class="header">
                                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                </div>
                                <div class="body-text">
                                    <?php echo wp_strip_all_tags(get_the_excerpt()); ?>
                                </div>
                                <div class="bottom-detail">
                                    <div class="tags">
                                        <?php get_template_part('template-parts/content/content', 'tags-ul'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>