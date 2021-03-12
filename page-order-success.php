<?php

get_header();?>
            <div class="container">
                <div class="row text-center">
                    <?php
                    $order_id = $_GET['order_id'];

                    if($order_id):
                    ?>
                    <p>سفارش شما با موفقیت ثبت شد.</p>
                    <p>شناسه سفارش :</p>
                    <h4><?php echo $order_id ?></h4>
                    <?php endif; ?>
                </div>
            </div>
<?php get_footer(); ?>