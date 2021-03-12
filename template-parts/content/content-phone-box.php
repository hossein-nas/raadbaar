<?php
    $args = array(
        'post_type' => 'phonebook',
        'order' => 'ASC',
        'posts_per_page' => -1,
    );
    $phonebook = new WP_Query($args);
    while($phonebook->have_posts()): $phonebook->the_post(); ?>
            <div class="item">
                <div class="icon">
                    <?php $img = get_field('figure_svg'); 
                    $thumb = wp_get_attachment_url($img['ID']);
                    ?>
                    <img src="<?php echo $thumb; ?>" alt="">
                </div>
                <div class="text">
                    <h5><?php the_field('phone_number_label') ?></h5>
                    <p class="caption"><?php the_field('caption'); ?></p>
                </div>
                <a href="tel:+98<?php echo substr(get_field('phone_number'), 1); ?>" class="call">
                    <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9378 10.6044C12.9333 10.9333 14 11.1111 15.1111 11.1111C15.6 11.1111 16 11.5111 16 12V15.1111C16 15.6 15.6 16 15.1111 16C6.76444 16 0 9.23556 0 0.888889C0 0.4 0.4 0 0.888889 0H4C4.48889 0 4.88889 0.4 4.88889 0.888889C4.88889 2 5.06667 3.06667 5.39556 4.06222C5.49333 4.37333 5.42222 4.72 5.17333 4.95111L3.21778 6.91556C4.49778 9.44 6.56 11.4933 9.07556 12.7733L11.0311 10.8178C11.2089 10.6489 11.4311 10.56 11.6622 10.56C11.7511 10.56 11.8489 10.5778 11.9378 10.6044ZM14.2222 8H16C16 3.58222 12.4178 0 8 0V1.77778C11.44 1.77778 14.2222 4.56 14.2222 8ZM10.6667 8.00011H12.4444C12.4444 5.54678 10.4533 3.55566 8 3.55566V5.33344C9.47556 5.33344 10.6667 6.52455 10.6667 8.00011ZM1.80446 1.77734H3.13779C3.20001 2.55957 3.33335 3.3329 3.53779 4.07068L2.47112 5.14623C2.11557 4.07068 1.88446 2.95068 1.80446 1.77734ZM10.8444 13.5198C11.9111 13.8842 13.0489 14.1153 14.2222 14.1953V12.8531C13.44 12.7998 12.6667 12.6665 11.9111 12.4531L10.8444 13.5198Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
<?php endwhile; ?>