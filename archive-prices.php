<?php get_header() ?>

<main class="prices">
    <section class="prices-tariffs">
        <div class="container">
            <div class="prices-tariffs__inner">



                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post() ?>
                        <h2 class="prices-tariffs__title title-h2"><?php the_title() ?></h2>
                        <div class="prices-tariffs__content">

                            <p class="prices-tariffs__text"> <?php the_field('prices_text') ?></p>


                        <?php endwhile ?>
                    <?php endif ?>



                    <div class="prices-tariffs__toggle">


                        <input type="checkbox" name="toggle" id="price-toggle">
                        <label for="toggle"><?php echo get_term_by('slug', 'prices-period_year', 'price-period')->name ?></label>

                        <label for="toggle"><?php echo get_term_by('slug', 'prices-period_mounth', 'price-period')->name ?></label>
                    </div>
                        </div>

                        <?php $query = new WP_Query([
                            'numberposts' => -1,
                            'post_type' => 'prices-tariff',
                            'meta_key' => 'tariff_order',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC'
                        ]);
                        if ($query->have_posts()) :
                        ?>

                            <div class="prices-tariffs__box">
                                <?php while ($query->have_posts()) :
                                    $query->the_post();
                                    $tariff_list = get_field('tariff_list');
                                    $tariff_list = explode("\n", $tariff_list);
                                ?>



                                    <div class="prices-tariffs__item" style="background-color: <?php the_field('tariff_color') ?>;">
                                        <div class="prices-tariffs__item-title">
                                            <?php the_title() ?>
                                        </div>
                                        <div class="prices-tariffs__item-text"> <?php the_field('tariff_text') ?></div>
                                        <div class="prices-tariffs__item-price prices-tariffs__item-price-month">
                                            <?php the_field('tariff_price-month') ?> ₽/месяц</div>
                                        <div class="prices-tariffs__item-price prices-tariffs__item-price-year"><?php the_field('tariff_price-year') ?>
                                            ₽/год</div>
                                        <div class="prices-tariffs__item-subprice">за пользователя</div>
                                        <a href="#" class="prices-tariffs__item-btn btn">Попробовать бесплатно</a>
                                        <div class="prices-tariffs__item-function-title">Функции тарифа</div>
                                        <p class="prices-tariffs__item-function-text">Функции тарифа <?php the_title() ?></p>
                                        <ul class="prices-tariffs__item-function-list">
                                            <?php foreach ($tariff_list as $tariff_item) : ?>

                                                <li class="prices-tariffs__item-function-item"> <?php echo $tariff_item ?></li>
                                            <?php endforeach ?>

                                        </ul>
                                    </div>
                                <?php endwhile ?>
                            </div>

                        <?php else : ?>
                            <p>НЕТ ТАРИФОВ</p>
                        <?php endif ?>
                        <?php wp_reset_query()  ?>
            </div>
        </div>
    </section>




    <section class="prices-comparison">
        <div class="container">
            <div class="prices-comparison__inner">

                <?php $query_comparison = new WP_Query([
                    'numberposts' => -1,
                    'post_type' => 'prices-comparison-hd'
                ]);
                if ($query_comparison->have_posts()) :

                ?>
                    <header class="prices-comparison__head">



                        <?php while ($query_comparison->have_posts()) :
                            $query_comparison->the_post();

                            $table = get_field('prices-comparison_hd-table');

                        ?>

                            <h2 class="prices-comparison__head-title title-h2">
                                <?php the_title() ?>
                            </h2>


                            <table class="prices-comparison__head-table">
                                <?php if (!empty($table['header'])) : ?>
                                    <thead>
                                        <tr class="prices-comparison__head-tr">
                                            <?php foreach ($table['header'] as $th) : ?>
                                                <th class="prices-comparison__head-th"><?php echo $th['c'] ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                <?php endif ?>


                                <tbody>
                                    <?php foreach ($table['body'] as $tr) : ?>
                                        <tr class="prices-comparison__head-tr">
                                            <?php foreach ($tr as $td) : ?>

                                                <td class="prices-comparison__head-td">
                                                    <?php if (!empty($td['c'])) : ?>
                                                        <div class="prices-comparison__head-td-price"> от <?php echo $td['c'] ?> ₽/месяц
                                                        </div>
                                                        <div class="prices-comparison__head-td-subprice">за пользователя</div>
                                                    <?php endif ?>
                                                </td>

                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>


                        <?php endwhile ?>


                    </header>
                <?php endif ?>
                <?php wp_reset_query()  ?>

                <div class="prices-comparison__box">

                    <?php $query_comparison = new WP_Query([
                        'numberposts' => -1,
                        'post_type' => 'prices-comparison'
                    ]);
                    if ($query_comparison->have_posts()) :
                    ?>

                        <?php while ($query_comparison->have_posts()) :
                            $query_comparison->the_post();

                            $table = get_field('price-comparison_table') ?>



                            <div class="prices-comparison__item">
                                <table class="prices-comparison__table">
                                    <?php if (!empty($table['header'])) : ?>
                                        <thead>
                                            <tr class="prices-comparison__tr">
                                                <?php foreach ($table['header'] as $th) : ?>
                                                    <th class="prices-comparison__th"><?php echo $th['c'] ?></th>
                                                <?php endforeach ?>
                                            </tr>
                                        </thead>
                                    <?php endif ?>


                                    <tbody>
                                        <?php foreach ($table['body'] as $tr) : ?>
                                            <tr class="prices-comparison__tr">
                                                <?php foreach ($tr as $td) : ?>
                                                    <td class="prices-comparison__td"><?php echo $td['c'] ?></td>
                                                <?php endforeach ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php endwhile ?>
                    <?php endif ?>
                    <?php wp_reset_query()  ?>


                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_template_part('reg-app');
get_footer();
?>