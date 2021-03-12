        <section id="FastOrdering" class="<?php echo is_front_page()? 'diagonal': '' ?>">
            <div class="container ">
                <div class="header-section ">
                    <h3>ثبت سفارش سریع</h3>
                    <p>می‌تونید به سرعت نور سفارش خودتون رو ثبت کنید و ما در کوتاه‌ترین  زمان ممکن بار شما رو جابجا میکنیم</p>

                    <a href="<?php echo site_url('advance-ordering'); ?>" class="goto-advanced btn btn-outline-primary ">
                        ثبت سفارش پیشرفته
                        <i class="bi-arrow-left-short"></i>
                    </a>
                </div>
                <div class="ordering-form-wrapper">
                    <fast-ordering></fast-ordering>
                </div>
                <div class="ordering-figures">

                </div>
            </div>
        </section>