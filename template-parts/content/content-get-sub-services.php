<?php
$all_services = get_pages( array(
                        'post_type'         => 'services', //here's my CPT
                        'post_status'       => array( 'publish' ) //my custom choice
                    ) );
 
//Using the function
$inherited_services = get_page_children( get_the_ID(), $all_services );

if( $inherited_services) :
?>
                            <div class="sidebar-widget">
                                <div class="header">
                                    <h4> خدمات زیر دسته </h4>
                                </div>
                                <ul class="separator">

                                    <?php                                         
                                        foreach($inherited_services as $service): $s = get_post($service);
                                            $permalink = get_permalink($service->ID);
                                            $title = get_the_title($service->ID);
                                            $thumb = get_the_post_thumbnail($service->ID);?>
                                    <li>
                                        <div class="service-item">
                                            <div class="thumb"><?php echo $thumb ?></div>
                                            <h4><a href="<?php echo $permalink ?>"><?php echo $title ?></a></h4>
                                        </div>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
<?php endif; ?>