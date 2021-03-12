<nav>
    <div class="container ">
        <div class="row g-0">
            <div class="col-12 col-lg-9" id="Nav__wrapper">
                <?php
                wp_nav_menu(array(
                    'menu' => 'main_menu',
                    'menu_class' => 'raadbaar-menu nav__first-level',
                    'depth' => 3,
                    'container' => '',
                    'theme_location' => 'header-menu-location'
                )) ;
                ?>

            </div>

            <div class="col-12 col-lg-3  search-box">
                <div class="search-box__frame">
                    <div class="search-input-container">
                        <input type="text" id="search-box" name="s" placeholder='برای جستجو چیزی بنویسید ...' autocomplete="off">
                    </div>
                    <div class="icon-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>  
</nav>