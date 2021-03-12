<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset='<?php bloginfo('charset'); ?>' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>S2</title>
    <?php wp_head(); ?>
</head>

<body>
    <header class="header" style="background-image: url(<?php if (isHomePage()) {
                                                            echo  _s2_assets_path('img/header-bg-1920.png');
                                                        } else {
                                                            echo  _s2_assets_path('img/header-bg-home-1920.png');
                                                        } ?>)">
        <div class="header__inner">
            <div class="header__top">
                <div class="container container--full">
                    <div class="header__top-inner">
                        <div class="header__box">
                            <div class="header__logo logo">
                                <?php the_custom_logo(); ?>
                            </div>

                            <?php wp_nav_menu([
                                'theme_location' => 'menu-header',
                                'container' => 'nav',
                                'container_class' => 'header__nav',
                                'menu_class' => 'header__menu menu'
                            ]) ?>

                            <a href="#" class="header__login">Войти</a>
                            <a href="tel:+74994907105" class="header__tel">
                                <?php if (is_active_sidebar('s2-header-tel')) {
                                    dynamic_sidebar('s2-header-tel');
                                }
                                ?>
                            </a>

                            <?php if (is_active_sidebar('s2-header-social')) {
                                dynamic_sidebar('s2-header-social');
                            }
                            ?>

                            <a href="#" class="header__top-btn btn">Попробовать</a>

                            <div class="header__menu-btn menu-btn">
                                <div class="menu-btn__line"></div>
                                <div class="menu-btn__line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-over"></div>
            <?php
            function isHomePage()
            {
                $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                return in_array($path, ['/', '/home.html', '/index']);
            }

            if (isHomePage()) {
                get_template_part('header-bottom-home');
            } else if (is_singular('cases')) {
                get_template_part('header-bottom-case');
            } else {
                get_template_part('header-bottom');
            }

            ?>
        </div>
    </header>