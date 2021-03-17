<?php get_header() ?>


<?php while (have_posts()) : the_post();
    $gallery = acf_photo_gallery('business-apps_gallery', get_the_ID());    ?>
<main class="business-apps-item">
    <section class="business-apps-item-control">
        <div class="container">
            <div class="business-apps-item-control__inner">
                <h2 class="business-apps-item-control__title title-h2">
                    <?php the_title() ?>
                </h2>
                <p class="business-apps-item-control__text"><?php the_field('business-apps_text') ?> </p>

                <div class="business-apps-item-control__slider slider-img">
                    <?php foreach ($gallery as $gallery_img) : ?>
                    <div class="business-apps-item-control__slider-item">
                        <img class="business-apps-item-control__slider-item-img"
                            src="<?php echo $gallery_img['full_image_url'] ?>" alt="">
                    </div>

                    <?php endforeach ?>


                </div>
            </div>
        </div>
    </section>


    <div class="business-apps-item-advantages">
        <div class="container">
            <div class="business-apps-item-advantages__inner">
                <h2 class="business-apps-item-advantages__head-title title-h2">
                    <?php the_field('business-apps_advantages') ?></h2>
                <div class="business-apps-item-advantages__box">
                    <?php $advatages_list = new WP_Query([
                            'numberposts' => -1,
                            'post_type' => 'business-adv-list',
                            'meta_key' => 'business-adv-order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => [
                                [
                                    'key' => 'business-adv-check-app',
                                    'value' => '"' . get_queried_object_id() . '"',
                                    'compare' => 'LIKE'
                                ]
                            ]
                        ]);
                        ?>
                    <ol class="business-apps-item-advantages__list">
                        <?php while ($advatages_list->have_posts()) : $advatages_list->the_post();  ?>
                        <li class="business-apps-item-advantages__item">
                            <div class="business-apps-item-advantages__number"></div>
                            <div class="business-apps-item-advantages__title"><?php the_title() ?></div>
                            <div class="business-apps-item-advantages__text">
                                <?php the_field('business-adv-text') ?>
                            </div>
                        </li>
                        <?php endwhile ?>


                    </ol>

                </div>

            </div>
        </div>
    </div>

    <div class="business-apps-item-questions">
        <div class='container'>
            <div class="business-apps-item-questions__inner">
                <div class="business-apps-item-questions__head-title title-h2">Вопрос — ответ</div>
                <?php $questions_list = new WP_Query([
                        'numberposts' => -1,
                        'post_type' => 'business-apps-list',
                        'meta_key' => 'business-apps_order',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => [
                            [
                                'key' => 'business-apps_answer-check-app',
                                'value' => '"' . get_queried_object_id() . '"',
                                'compare' => 'LIKE'
                            ]
                        ]
                    ]);
                    ?>

                <ul class="business-apps-item-questions__list">
                    <?php while ($questions_list->have_posts()) : $questions_list->the_post() ?>
                    <li class="business-apps-item-questions__item">
                        <div class="business-apps-item-questions__title"><?php the_title() ?></div>
                        <p class="business-apps-item-questions__text"><?php the_field('business-apps_answer') ?></p>
                    </li>
                    <?php endwhile ?>

                </ul>
            </div>

        </div>
    </div>

</main>
<?php
endwhile;
get_template_part('reg-app');
get_footer();
?>