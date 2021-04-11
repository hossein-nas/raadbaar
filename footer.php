        </main>       
    </div>
    <footer>
        <div class="body container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="address footer-card">
                        <h4>آدرس مرکزی</h4>
                        <p>
                            تهران / اتوبان ساوه / نسیم شهر / پایانه حمل و نقل کالای مرکزی 
                        </p>
                    </div>
                    <div class="phone-numbers footer-card">
                        <h4>شماره‌های تماس</h4>
                        <ul>
                            <?php 
                                $args = array(
                                    'post_type' => 'phonebook',
                                    'posts_per_page' => -1,
                                );
                                $phonebook = new WP_Query($args);
                                while($phonebook->have_posts()): $phonebook->the_post(); ?>
                                <li>
                                    <span class="right"><?php the_field('caption')?></span>
                                    <span class="left"><a href="tel:+98<?php echo substr(get_field('phone_number'), 1); ?>"><?php the_field("phone_number_label"); ?></a></span>
                                </li>
                            <?php
                                endwhile;
                            ?>
                        </ul>
                    </div>
                </div>
                
                <div class="col-12 col-md-4">
                    <div class="footer-menu-links">
                        <h4>پیوندهای پرکاربرد</h4>
                        <?php wp_nav_menu( array(
                                'menu' => 'footer_menu_bar',
                                'theme_location' => 'footer_menu_bar' 
                            )); ?>
                    </div>
                    <div class="footer-menu-links">
                        <h4>انواع وسیله نقلیه</h4>
                        <?php wp_nav_menu( array(
                                'menu' => 'footer_secondary_menu_bar',
                            )); ?>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p>
                کلیه حقوق این سایت متعلق به شرکت باربری راد بار می‌باشد. هر گونه کپی  و استفاده از مطالب وبسایت پیگرد قانونی دارد.
            </p>
            <div class="designer">
                طراحی شده توسط 
                <span><a href="tel:+989056638513" style="display: inline-block;">حسین نصیری</a></span>
            </div>
        </div>
    </footer>

    <?php do_action('add_call_us_box') ?>
    <?php wp_footer() ?>
</body>
</html>