<?php

get_header();

while( have_posts() ): the_post();
?>
            <div class="container" id="VehicleSinglePage">
                <div class="row">
                    <div class="col-12">
                        <ul class="breadcrumb">

                            <li class="root"> <a href="<?php echo get_post_type_archive_link(get_post_type()) ?>">
                                <i class="bi bi-house-door-fill"></i>
                            </a></li>
                            <?php ancestors_term_li(get_the_ID(), 'vehicles_cat', '');?> 
                            <li class="active"> <a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="head-section">
                            <div class="thumbnail">
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h2>
                        </div>
                    </div>                  
                </div>

                <div class="row">
                    <div class="col-12 ">
                        <div class="prop-section">
                            <div class="prop-table">
                                <div class="figure">
                                    <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.0625 4.75V0H2.8125C1.26163 0 0 1.26163 0 2.8125V15.0625H5.84769C6.15163 15.0625 6.43731 15.2099 6.61306 15.4589C6.78888 15.7071 6.83281 16.0256 6.73206 16.3122C6.66069 16.5127 6.625 16.7232 6.625 16.9375C6.625 17.9711 7.46637 18.8125 8.5 18.8125C9.53363 18.8125 10.375 17.9711 10.375 16.9375C10.375 16.7232 10.3393 16.5127 10.2679 16.3122C10.1672 16.0256 10.2111 15.707 10.3869 15.4589C10.5627 15.2099 10.8483 15.0625 11.1523 15.0625H15.0625V12.25C12.9943 12.25 11.3125 10.5682 11.3125 8.5C11.3125 6.43181 12.9943 4.75 15.0625 4.75Z" fill="currentColor"/>
                                        <path d="M29.1875 0H16.9375V5.84769C16.9375 6.15163 16.7901 6.43731 16.5411 6.61306C16.2929 6.78975 15.9734 6.83188 15.6878 6.73206C14.5187 6.31187 13.1875 7.25213 13.1875 8.5C13.1875 9.74788 14.5205 10.6808 15.6878 10.2679C15.9734 10.1663 16.293 10.2102 16.5411 10.3869C16.7901 10.5627 16.9375 10.8483 16.9375 11.1523V15.0625H19.75C19.75 12.9943 21.4318 11.3125 23.5 11.3125C25.5682 11.3125 27.25 12.9943 27.25 15.0625H32V2.8125C32 1.26163 30.7384 0 29.1875 0Z" fill="currentColor"/>
                                        <path d="M16.3122 21.7321C16.0247 21.8328 15.707 21.7889 15.4589 21.6131C15.2099 21.4373 15.0625 21.1517 15.0625 20.8477V16.9375H12.25C12.25 19.0057 10.5682 20.6875 8.5 20.6875C6.43181 20.6875 4.75 19.0057 4.75 16.9375H0V29.1875C0 30.7384 1.26163 32 2.8125 32H15.0625V26.1523C15.0625 25.8484 15.2099 25.5627 15.4589 25.3869C15.7071 25.2121 16.0247 25.1681 16.3122 25.2679C17.4786 25.6808 18.8125 24.7479 18.8125 23.5C18.8125 22.2521 17.4804 21.3146 16.3122 21.7321Z" fill="currentColor"/>
                                        <path d="M26.1523 16.9375C25.8484 16.9375 25.5627 16.7901 25.3869 16.5411C25.2111 16.2929 25.1672 15.9744 25.2679 15.6878C25.3393 15.4873 25.375 15.2768 25.375 15.0625C25.375 14.0289 24.5336 13.1875 23.5 13.1875C22.4664 13.1875 21.625 14.0289 21.625 15.0625C21.625 15.2768 21.6607 15.4873 21.7321 15.6878C21.8328 15.9744 21.7889 16.293 21.6131 16.5411C21.4373 16.7901 21.1517 16.9375 20.8477 16.9375H16.9375V19.75C19.0057 19.75 20.6875 21.4318 20.6875 23.5C20.6875 25.5682 19.0057 27.25 16.9375 27.25V32H29.1875C30.7384 32 32 30.7384 32 29.1875V16.9375H26.1523Z" fill="currentColor"/>
                                    </svg>

                                </div>
                                <div class="content">
                                    <h4 class="title">مناسب برای </h4>
                                    <ul>
                                        <?php get_template_part('template-parts/content/content', 'suited-for'); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="prop-table">
                                <div class="figure">
                                    <svg width="36" height="30" viewBox="0 0 36 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 0C1.79086 0 0 1.79086 0 4V30H31.8418C34.0509 30 35.8418 28.2091 35.8418 26V0H4ZM13.1982 22.6829V24.878H5.12195V16.8018H7.31707V21.1306L14.1142 14.3337L15.6663 15.8858L8.86938 22.6829H13.1982ZM30.7198 13.1982H28.5247V8.86938L21.7276 15.6663L20.1755 14.1142L26.9724 7.31707H22.6436V5.12195H30.7198V13.1982Z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="content">
                                    <h4 class="title">ابعاد قابل حمل</h4>
                                    <ul>
                                        <li class="two-cell">
                                            <span>طول</span>
                                            <span>
                                                <strong><?php echo fa_number(get_field('max_length')) ?></strong>
                                                متر
                                            </span>
                                        </li>
                                        <li class="two-cell">
                                            <span>عرض</span>
                                            <span>
                                                <strong><?php echo fa_number(get_field('max_width')) ?></strong>
                                                متر
                                            </span>
                                        </li>
                                        <li class="two-cell">
                                            <span>ارتفاع</span>
                                            <span>
                                                <strong><?php echo fa_number(get_field('max_height')) ?></strong>
                                                متر
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="prop-table">
                                <div class="figure">
                                    <svg width="30" height="32" viewBox="0 0 30 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M28.9984 30.1165L25.6401 11.162C25.5049 10.3989 24.8487 9.84343 24.0822 9.84343H18.497C19.5442 8.79995 20.195 7.35034 20.195 5.74936C20.195 2.57912 17.6455 0 14.5117 0C11.3779 0 8.8283 2.57912 8.8283 5.74936C8.8283 7.35034 9.47909 8.79995 10.5263 9.84343H4.94103C4.1746 9.84343 3.51842 10.3989 3.38315 11.162L0.0248201 30.1165C-0.0577956 30.5832 0.0680798 31.0628 0.368894 31.4264C0.669602 31.7899 1.11412 32 1.5827 32H27.4406C27.9091 32 28.3537 31.7899 28.6544 31.4264C28.9551 31.0628 29.0811 30.5832 28.9984 30.1165ZM14.5117 3.20216C15.9001 3.20216 17.0296 4.34479 17.0296 5.74936C17.0296 7.15394 15.9001 8.29668 14.5117 8.29668C13.1233 8.29668 11.9936 7.15394 11.9936 5.74936C11.9936 4.34479 13.1233 3.20216 14.5117 3.20216ZM14.0981 24.7768C14.0157 24.9305 13.8566 25.0262 13.6837 25.0262H12.9371C12.7698 25.0262 12.6149 24.9365 12.5303 24.7903L10.6826 21.5994L9.50093 22.8196V24.2891C9.50093 24.6962 9.17469 25.0262 8.77227 25.0262C8.36985 25.0262 8.04361 24.6962 8.04361 24.2891V18.4615C8.04361 18.0544 8.36985 17.7244 8.77227 17.7244C9.17469 17.7244 9.50093 18.0544 9.50093 18.4615V20.9668L12.3053 17.8786C12.3946 17.7803 12.5206 17.7244 12.6525 17.7244H13.2932C13.4825 17.7244 13.6533 17.8388 13.7273 18.015C13.8012 18.1912 13.7637 18.3951 13.6322 18.5327L11.687 20.5682L14.079 24.2892C14.1732 24.436 14.1806 24.623 14.0981 24.7768ZM21.2774 23.8044C21.2774 23.9494 21.212 24.087 21.1 24.1775C20.8093 24.4122 20.4261 24.6229 19.9507 24.8095C19.3712 25.0369 18.7845 25.1506 18.1905 25.1506C17.4354 25.1506 16.7775 24.9905 16.216 24.6699C15.6549 24.3496 15.233 23.8914 14.9507 23.2953C14.6684 22.6992 14.5273 22.051 14.5273 21.3503C14.5273 20.59 14.6848 19.9141 15 19.3232C15.3151 18.7321 15.7762 18.279 16.3836 17.9633C16.8461 17.7211 17.4223 17.5997 18.1116 17.5997C19.0077 17.5997 19.7076 17.7899 20.2115 18.1701C20.4298 18.3348 20.6144 18.5268 20.7652 18.7461C20.9093 18.9556 20.9385 19.2247 20.8429 19.4608C20.7473 19.697 20.54 19.8683 20.2919 19.9153L20.2902 19.9156C19.9997 19.9706 19.7051 19.8403 19.5478 19.5872C19.4471 19.4251 19.3187 19.2865 19.1629 19.1711C18.8821 18.9636 18.5317 18.8598 18.1116 18.8598C17.4748 18.8598 16.9684 19.0641 16.5928 19.4724C16.217 19.881 16.029 20.487 16.029 21.2905C16.029 22.1572 16.2193 22.8071 16.6002 23.2405C16.9809 23.6738 17.4797 23.8904 18.097 23.8904C18.4021 23.8904 18.7082 23.8299 19.0151 23.7087C19.3219 23.5874 19.5853 23.4404 19.8053 23.2679V22.3413H18.7444C18.4085 22.3413 18.1364 22.066 18.1364 21.7263C18.1364 21.3866 18.4087 21.1113 18.7444 21.1113H20.806C21.0664 21.1113 21.2774 21.3249 21.2774 21.5882V23.8044Z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="content">
                                    <h4 class="title">وزن قابل حمل</h4>

                                    <ul>
                                        <li class="two-cell">
                                            <span>حداکثر وزن بار</span>
                                            <span>
                                                <strong><?php echo fa_number(get_field('max_weight')) ?></strong>
                                                تن
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row content-row">
                    <div class="col-12 col-lg-9 body-text">
                        <?php if( !empty( get_the_content() )): ?>
                        <div class="content">
                            <?php 
                                the_content(); 
                            ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-12 col-lg-3 col-md-6 sidebar">

                        <div class="sidebar-widget">
                            <div class="header">
                                <h4>سرویسهای مناسب این وسیله نقلیه</h4>
                            </div>
                            <ul class="separator">
                                <li>
                                    <div class="service-item">
                                        <div class="thumb"><img src="<?php echo get_theme_file_uri() ?>/assets/images/ServiceThumb.png" alt="ServiceThumb"></div>
                                        <h4><a href="#">باربری درون شهری</a></h4>
                                    </div>
                                </li>
                                <li>
                                    <div class="service-item">
                                        <div class="thumb"><img src="<?php echo get_theme_file_uri() ?>/assets/images/postimg.png" alt="ServiceThumb"></div>
                                        <h4><a href="#">حمل بار بین الملل</a></h4>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>

<?php
 endwhile;

    get_template_part('template-parts/content/content', 'ask-question');

    get_footer();
 ?>