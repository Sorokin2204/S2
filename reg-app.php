<section class="reg-app" style="background-image: url( <?php echo _s2_assets_path('img/reg-app-bg-1920.png'); ?>)">
    <div class="container">
        <div class="reg-app__inner">
            <?php
            $reg_app_post = get_post(284);
            if ($reg_app_post) : ?>
            <div class="reg-app__content">
                <h2 class="reg-app__title title"><?php echo $reg_app_post->post_title ?></h2>
                <p class="reg-app__text">
                    <?php echo get_field('reg-app_text', $reg_app_post->ID, true) ?>
                </p>

                <?php echo do_shortcode(get_field('reg-app_shortcode', $reg_app_post->ID, true))  ?>

            </div>
            <?php endif ?>
        </div>
    </div>
</section>