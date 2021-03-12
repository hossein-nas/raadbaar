<?php

get_header();?>

            <div class="order-success">
                <div class="col col-12 col-md-6 mx-auto">
                    <div class="row">
                        <div class="head-section">
                            <h4>سفارش شما با موفقیت ثبت شد.</h4>
                        </div>
                        <div class="figure">
                            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/courier.svg" alt="">
                        </div>
                        <?php
                        $order_id = $_GET['order_id'];

                        if($order_id):
                        ?>
                        <div class="order-id">
                            <?php echo $order_id ?>                        
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row text-center">
                </div>
            </div>
<?php get_footer(); ?>