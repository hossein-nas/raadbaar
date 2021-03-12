<?php 
$args = [
    'post_type' => 'org_customers',
    'post_per_page' => 6
];
$customers = new WP_Query($args);

if($customers->post_count): ?>
<section id="OrganizationalCustomers">
    <div class="container ">
        <div class="header-section">
            <h3>مشتریان سازمانی ما</h3>
        </div>
        <div class="customers">
<?php while( $customers->have_posts()): $customers->the_post(); ?>
            <div class="customer">
                <a href="<?php echo get_field('link_to_customer_website') ?>">
                    <div class="thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                    <h4 class="title">
                        <?php the_title(); ?>
                    </h4>
                </a>    
            </div>
<?php endwhile; wp_reset_postdata(); ?>
            
        </div>
    </div>
</section>

<?php endif; ?>