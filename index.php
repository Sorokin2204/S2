<?php

get_header();
?>


<main class="cases">
    <div class="container">
        <div class="cases__inner">
            <?php if (have_posts()) : ?>
            <div class="cases__box">
                <?php while (have_posts()) :
                        the_post(); ?>
                <div class="cases__item">
                    <?php the_post_thumbnail('full', ['class' => 'cases__img']); ?>
                    <div class="cases__introduction">Внедрение S2 в производство сувенирной продукции</div>
                    <div class="cases__title"><?php the_title(); ?></div>
                    <div class="cases__subtitle">Кейс компании MUSTPRINT</div>
                    <p class="cases__text"><?php echo get_the_excerpt() ?></p>
                    <a href="<?php get_permalink() ?>" class="cases__link link"
                        aria-label="Читать содержание кейса : <?php the_title() ?>">Читать кейс </a>
                </div>
                <?php endwhile ?>

                <!-- 
                <div class="cases__item">
                    <img src="<?php echo  _s2_assets_path('img/cases-img.png') ?>" alt="" class="cases__img">
                    <div class="cases__introduction">На обработку заявок теперь уходит вдвое меньше времени</div>
                    <div class="cases__title">На обработку заявок теперь уходит вдвое меньше времени</div>
                    <div class="cases__subtitle">Кейс компании MUSTPRINT</div>
                    <p class="cases__text">Качественная работа с клиентами заботит не только крупные корпорации, но и
                        небольшие организации. Компания «Р-Пауэр» внедрила S2, чтобы преодолеть сбои в работе, иметь
                        доступ
                        к истории общения с заказчиками, и закрывать задачи в срок.</p>
                    <a href="#" class="cases__link link">Читать кейс </a>
                </div>
                <div class="cases__item">
                    <img src="<?php echo  _s2_assets_path('img/cases-img.png') ?>" alt="" class="cases__img">
                    <div class="cases__introduction">Внедрение S2 в производство сувенирной продукции</div>
                    <div class="cases__title">Как мы перестали терять до 700 000 рублей в месяц</div>
                    <div class="cases__subtitle">Кейс компании MUSTPRINT</div>
                    <p class="cases__text">Сотрудники вели клиентскую базу в Excel, задачи фиксировали на канбан-досках.
                        Но
                        они все равно медленно обрабатывали заявки и часто забывали перезвонить заказчикам. А компания
                        теряла до 700 тысяч рублей в месяц.</p>
                    <a href="#" class="cases__link link">Читать кейс </a>
                </div>
                <div class="cases__item">
                    <img src="<?php echo  _s2_assets_path('img/cases-img.png') ?>" alt="" class="cases__img">
                    <div class="cases__introduction">Внедрение S2 в производство сувенирной продукции</div>
                    <div class="cases__title">Как мы перестали терять до 700 000 рублей в месяц</div>
                    <div class="cases__subtitle">Кейс компании MUSTPRINT</div>
                    <p class="cases__text">Сотрудники вели клиентскую базу в Excel, задачи фиксировали на канбан-досках.
                        Но
                        они все равно медленно обрабатывали заявки и часто забывали перезвонить заказчикам. А компания
                        теряла до 700 тысяч рублей в месяц.</p>
                    <a href="#" class="cases__link link">Читать кейс </a>
                </div>
                <div class="cases__item">
                    <img src="<?php echo  _s2_assets_path('img/cases-img.png') ?>" alt="" class="cases__img">
                    <div class="cases__introduction">Внедрение S2 в производство сувенирной продукции</div>
                    <div class="cases__title">Как мы перестали терять до 700 000 рублей в месяц</div>
                    <div class="cases__subtitle">Кейс компании MUSTPRINT</div>
                    <p class="cases__text">Сотрудники вели клиентскую базу в Excel, задачи фиксировали на канбан-досках.
                        Но
                        они все равно медленно обрабатывали заявки и часто забывали перезвонить заказчикам. А компания
                        теряла до 700 тысяч рублей в месяц.</p>
                    <a href="#" class="cases__link link">Читать кейс </a>
                </div> -->
            </div>
            <?php else : ?>
            <p>НЕТ ЗАПИСЕй</p>
            <?php endif ?>
        </div>
    </div>
</main>

<? get_footer();
?>