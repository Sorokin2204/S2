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
    <header class="header">
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
            <div class="header__bottom">
                <div class="container">
                    <div class="header__bottom-inner">
                        <div class="header__content">
                            <h1 class="header__title title">
                                <span>S2.</span> Бизнес-приложения для больших продаж и лёгкого
                                управления.
                            </h1>

                            <p class="header__text">
                                Мы создали для вас настоящий много функциональный центр управления
                                компанией. В одном окне CRM и склад, трекеры задач и проектов,
                                документооборот и кадры, аналитика, кассы, учёт финансов и многое
                                другое. Главное — вы всегда получаете готовое персональное
                                решение.
                            </p>

                            <a href="#" class="header__bottom-btn btn">Попробовать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>