<header>
    <div class="container">
        <a href="<?php echo home_url() ?>" class="logo">
            <img width="556" height="181" src="<?php echo get_theme_file_uri() ?>/assets/images/logo_raadbaar.svg" alt="">
        </a>
        <a href="tel:+982156858135" class="call-us">
            <div class="phoneNumber">
                <span class="code">
                    - ۰۲۱
                </span>

                <span class="number">۸۱۳۵  ۵۶۸۵</span>
            </div>
            <div class="phone-ring">
                <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.43 14.93C17.55 15.3 18.75 15.5 20 15.5C20.55 15.5 21 15.95 21 16.5V20C21 20.55 20.55 21 20 21C10.61 21 3 13.39 3 4C3 3.45 3.45 3 4 3H7.5C8.05 3 8.5 3.45 8.5 4C8.5 5.25 8.7 6.45 9.07 7.57C9.18 7.92 9.1 8.31 8.82 8.57L6.62 10.78C8.06 13.62 10.38 15.93 13.21 17.37L15.41 15.17C15.61 14.98 15.86 14.88 16.12 14.88C16.22 14.88 16.33 14.9 16.43 14.93ZM19 12H21C21 7.03 16.97 3 12 3V5C15.87 5 19 8.13 19 12ZM15 12H17C17 9.24 14.76 7 12 7V9C13.66 9 15 10.34 15 12ZM6.53 5C6.6 5.88 6.75 6.75 6.98 7.58L5.78 8.79C5.38 7.58 5.12 6.32 5.03 5H6.53ZM15.2 18.21C16.4 18.62 17.68 18.88 19 18.97V17.46C18.12 17.4 17.25 17.25 16.4 17.01L15.2 18.21Z" fill="#FAFCFE"/>
                </svg>
            </div>
            <div class="label">
                <span>همین الان تماس بگیرید</span>
            </div>
        </a>

        <div class="social-media-links">
            <div class="label">ما را در شبکه‌های اجتماعی دنبال کنید</div>
            <div class="icons">
                <?php get_template_part("template-parts/content/content", 'social-media-links'); ?>
            </div>
        </div>
        <div class="hamburger" id="hamburger">
            <svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 4C0 1.79086 1.79086 0 4 0H32C34.2091 0 36 1.79086 36 4V32C36 34.2091 34.2091 36 32 36H4C1.79086 36 0 34.2091 0 32V4Z" fill="none"/>
                <g opacity="0.8" class="hamburger-dot">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M27 14.25C27 14.4489 26.921 14.6397 26.7803 14.7803C26.6397 14.921 26.4489 15 26.25 15L21.75 15C21.5511 15 21.3603 14.921 21.2197 14.7803C21.079 14.6397 21 14.4489 21 14.25C21 14.0511 21.079 13.8603 21.2197 13.7197C21.3603 13.579 21.5511 13.5 21.75 13.5L26.25 13.5C26.4489 13.5 26.6397 13.579 26.7803 13.7197C26.921 13.8603 27 14.0511 27 14.25ZM27 18.75C27 18.9489 26.921 19.1397 26.7803 19.2803C26.6397 19.421 26.4489 19.5 26.25 19.5L15.75 19.5C15.5511 19.5 15.3603 19.421 15.2197 19.2803C15.079 19.1397 15 18.9489 15 18.75C15 18.5511 15.079 18.3603 15.2197 18.2197C15.3603 18.079 15.5511 18 15.75 18L26.25 18C26.4489 18 26.6397 18.079 26.7803 18.2197C26.921 18.3603 27 18.5511 27 18.75ZM27 23.25C27 23.4489 26.921 23.6397 26.7803 23.7803C26.6397 23.921 26.4489 24 26.25 24L9.75 24C9.55109 24 9.36032 23.921 9.21967 23.7803C9.07902 23.6397 9 23.4489 9 23.25C9 23.0511 9.07902 22.8603 9.21967 22.7197C9.36032 22.579 9.55109 22.5 9.75 22.5L26.25 22.5C26.4489 22.5 26.6397 22.579 26.7803 22.7197C26.921 22.8603 27 23.0511 27 23.25Z" fill="currentColor" />
                </g>
                <g opacity="0.8" class="hamburger-x">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.219 12.219C12.1492 12.2886 12.0938 12.3714 12.056 12.4625C12.0182 12.5536 11.9987 12.6513 11.9987 12.75C11.9987 12.8486 12.0182 12.9463 12.056 13.0374C12.0938 13.1285 12.1492 13.2113 12.219 13.281L22.719 23.781C22.8599 23.9218 23.0509 24.0009 23.25 24.0009C23.4492 24.0009 23.6402 23.9218 23.781 23.781C23.9219 23.6401 24.001 23.4491 24.001 23.25C24.001 23.0508 23.9219 22.8598 23.781 22.719L13.281 12.219C13.2114 12.1491 13.1286 12.0937 13.0375 12.0559C12.9464 12.0181 12.8487 11.9986 12.75 11.9986C12.6514 11.9986 12.5537 12.0181 12.4626 12.0559C12.3715 12.0937 12.2887 12.1491 12.219 12.219V12.219Z" fill="currentColor"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M23.781 12.219C23.8508 12.2886 23.9063 12.3714 23.9441 12.4625C23.9819 12.5536 24.0013 12.6513 24.0013 12.75C24.0013 12.8486 23.9819 12.9463 23.9441 13.0374C23.9063 13.1285 23.8508 13.2113 23.781 13.281L13.281 23.781C13.1402 23.9218 12.9492 24.0009 12.75 24.0009C12.5508 24.0009 12.3598 23.9218 12.219 23.781C12.0782 23.6401 11.9991 23.4491 11.9991 23.25C11.9991 23.0508 12.0782 22.8598 12.219 22.719L22.719 12.219C22.7887 12.1491 22.8714 12.0937 22.9626 12.0559C23.0537 12.0181 23.1514 11.9986 23.25 11.9986C23.3487 11.9986 23.4463 12.0181 23.5375 12.0559C23.6286 12.0937 23.7113 12.1491 23.781 12.219V12.219Z" fill="currentColor"/>
                </g>
            </svg>

        </div>
    </div>  

</header>