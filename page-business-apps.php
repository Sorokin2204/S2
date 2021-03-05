<?php

get_header();
?>

<main class="business-apps">
    <div class='container'>
        <div class="business-apps__inner">
            <aside class="business-apps-aside">
                <ul class="business-apps-aside__list">
                    <li class="business-apps-aside__item"><a href="#" class="business-apps-aside__link link business-apps-aside__link--active">Все сразу</a></li>
                    <li class="business-apps-aside__item"><a href="#" class="business-apps-aside__link link">Клиенты и продажами</a></li>
                    <li class="business-apps-aside__item"><a href="#" class="business-apps-aside__link link">Контроль и отчёты</a></li>
                    <li class="business-apps-aside__item"><a href="#" class="business-apps-aside__link link">Автоматизация процессов</a></li>
                    <li class="business-apps-aside__item"><a href="#" class="business-apps-aside__link link">Коммуникация и интеграция</a></li>
                </ul>

            </aside>
            <div class="business-apps__content">
                <div class="business-apps__box">
                    <div class="business-apps__title title-h2">Клиенты и продажи</div>

                    <ul class="business-apps__list">
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление клиентами</div>
                                <p class="business-apps__text">В S2 вся история работы с покупателем собрана в его карточке: контакты, документы, пи…</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление продажами</div>
                                <p class="business-apps__text">S2 - это бесплатная CRM-система для продаж, которая позволяет вести учет заявок и сделок</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Запись клиентов на услуги</div>
                                <p class="business-apps__text">CRM с расписанием S2 позволит избежать путаницы в записях: в программу уже встроен интеракти…</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление финансами</div>
                                <p class="business-apps__text">Благодаря S2 управление финансами вашей компании значительно упростится</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="business-apps__box">
                    <div class="business-apps__title title-h2">Клиенты и продажи</div>

                    <ul class="business-apps__list">
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление клиентами</div>
                                <p class="business-apps__text">В S2 вся история работы с покупателем собрана в его карточке: контакты, документы, пи…</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление продажами</div>
                                <p class="business-apps__text">S2 - это бесплатная CRM-система для продаж, которая позволяет вести учет заявок и сделок</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Запись клиентов на ус…</div>
                                <p class="business-apps__text">CRM с расписанием S2 позволит избежать путаницы в записях: в программу уже встроен интеракти…</p>
                            </div>
                        </li>
                        <li class="business-apps__item">
                            <img src="<?php echo _s2_assets_path('img/business-apps-img.png'); ?>" alt="" class="business-apps__item-img">
                            <div class='business-apps__item-content'>
                                <div class="business-apps__item-title">Управление финансами</div>
                                <p class="business-apps__text">Благодаря S2 управление финансами вашей компании значительно упростится</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
get_template_part('reg-app');
get_footer();
?>