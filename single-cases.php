<?php get_header() ?>

<main class="cases-item">
    <?php while (have_posts()) : the_post();
        $resault = get_field('cases_resault');
        $solution = get_field('cases_solution');


    ?>
        <article class="article">
            <div class="container">
                <div class="article__inner">
                    <h2 class="article__title title-h2">Результаты</h2>
                    <div class="article__content">
                        <div class="article__top">
                            <div class="article__boost-box">
                                <?php $resault_boost = $resault['cases_resault-boost-table']['body'];  ?>

                                <?php for ($i = 0; $i <= count($resault_boost); $i++) :  ?>
                                    <?php for ($j = 0; $j <= count($resault_boost[$i]); $j++) : ?>
                                        <?php
                                        if (empty($resault_boost[$i][$j]['c']) || empty($resault_boost[$i + 1][$j]['c'])) : ?>
                                            <?php $i++;
                                            continue; ?>
                                        <?php else : ?>
                                            <div class="article__boost-item">
                                                <div class="article__boost-number"><?php echo $resault_boost[$i][$j]['c'] ?></div>
                                                <p class="article__boost-text"><?php echo $resault_boost[$i + 1][$j]['c'] ?></p>

                                            </div>

                                        <?php endif ?>
                                    <?php endfor ?>
                                <?php endfor ?>



                            </div>
                        </div>
                        <?php
                        $resault_info = $resault['cases_resault-info'];
                        if (!empty($resault_info)) : ?>
                            <aside class="aside-info">
                                <div class="aside-info__text">
                                    <span><?php echo $resault_info['cases_resault-info-title'] ?></span><?php echo $resault_info['cases_resault-info-text'] ?>

                                </div>

                                <a href='<?php echo $resault_info['cases_resault-info-link']['url'] ?>' class="aside-info__link aside-info__link--small">
                                    <?php echo $resault_info['cases_resault-info-link']['title'] ?></a>
                            </aside>
                        <?php else : ?>
                            <aside></aside>
                        <?php endif ?>

                        <div class="article__bottom">

                        </div>

                    </div>
                </div>
            </div>
        </article>

        <article class="article">
            <div class="container">
                <div class='article__inner'>
                    <h2 class="article__title title-h2"> <?php the_title() ?></h2>
                    <div class="article__content">

                        <div class="article__top">
                            <p class="cases-item__resault-text article__text">
                                <?php echo $resault['cases_resault-full-problem'] ?>
                            </p>
                        </div>




                        <aside></aside>



                        <div class="article__bottom">
                            <h3 class="article__bottom-title">Задачи</h3>
                            <ol class="cases-item__task-list-number article__list-number">
                                <?php


                                $resault_list = explode("\n", $resault['cases_resault-list']);
                                foreach ($resault_list  as $resault_item) : ?>
                                    <li class="article__list-number-item">
                                        <div class="article__list-number-item-text"><?php echo $resault_item ?>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                            </ol>

                            <div class="article__user">
                                <img src="<?php echo $resault['cases_resault-client-avatar'] ?>" alt="" class="article__user-avatar">
                                <div class="article__user-content">
                                    <div class="article__user-subname">Рассказывает</div>
                                    <div class="article__user-name"><?php echo $resault['cases_resault-client-name'] ?>
                                    </div>
                                    <div class="article__user-position">
                                        <?php echo $resault['cases_resault-client-position'] ?>
                                    </div>
                                </div class="article__user-content">
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </article>
        <article class="article">
            <div class="container">
                <div class="article__inner">
                    <h2 class="article__title title-h2">Решение</h2>
                    <div class="article__content">

                        <div class="article__top">
                            <p class="cases-item__solution-text article__text">
                                <?php echo $solution['cases_solution-text'] ?>
                            </p>


                        </div>

                        <?php
                        $solution_info_top = $solution['cases_solution-info-top'];
                        if (!empty($solution_info_top)) : ?>
                            <aside class="cases-item__solution-top-aside-info aside-info">
                                <?php
                                if (!empty($solution_info_top['cases_solution-info-top-title']) || !empty($solution_info_top['cases_solution-info-top-text'])) : ?>
                                    <div class="aside-info__text">
                                        <?php if (!empty($solution_info_top['cases_solution-info-top-title'])) : ?>
                                            <span><?php echo $solution_info_top['cases_solution-info-top-title'] ?></span>
                                        <?php endif ?>
                                        <?php if (!empty($solution_info_top['cases_solution-info-top-text'])) : ?>
                                            <?php echo $solution_info_top['cases_solution-info-top-text'] ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <a href='<?php echo $solution_info_top['cases_solution-info-top-link']['url'] ?>' class="aside-info__link">
                                    <?php echo $solution_info_top['cases_solution-info-top-link']['title'] ?></a>
                            </aside>
                        <?php else : ?>
                            <aside></aside>
                        <?php endif ?>
                        <div class="cases-item__solution-bottom article__bottom">


                            <?php
                            $solution_list = new WP_Query([
                                'numberposts' => -1,
                                'post_type' => 'cases-list',
                                'meta_key' => 'cases_item-order',
                                'orderby' => 'meta_value_num',
                                'order' => 'ASC',

                                'meta_query' => [

                                    [
                                        'key' => 'cases_list-check-case',
                                        'value' => '"' . get_queried_object_id() . '"',
                                        'compare' => 'LIKE'
                                    ]
                                ]
                            ]);

                            if ($solution_list->have_posts()) : ?>
                                <ol class="cases-item__solution-list-number article__list-number">
                                    <?php while ($solution_list->have_posts()) : $solution_list->the_post();
                                        $solution_list_img = acf_photo_gallery('cases_gallery', get_the_ID());    ?>

                                        <li class="article__list-number-item">
                                            <div class="article__list-number-item-text"><span><?php the_title() ?></span>
                                                <?php the_field('cases_item-text') ?></div>

                                            <?php if (!empty($solution_list_img)) : ?>
                                                <div class="article__slider slider-img">
                                                    <?php foreach ($solution_list_img as $solution_item_img) : ?>

                                                        <div class="article__slider-item">
                                                            <img class="article__slider-item-img" src="<?php echo $solution_item_img['full_image_url'] ?>" alt="">
                                                            <div class="article__slider-item-title">
                                                                <?php echo $solution_item_img['caption'] ?></div>

                                                        </div>


                                                    <?php endforeach ?>
                                                </div>
                                            <?php endif ?>
                                        </li>
                                    <?php endwhile ?>
                                    <?php $solution_list->reset_postdata(); ?>

                                </ol>

                            <?php endif ?>
                        </div>



                        <?php
                        $solution_info_bottom = $solution['cases_solution-info-bottom'];
                        if (!empty($solution_info_bottom)) : ?>
                            <aside class="cases-item__solution-bottom-aside-info aside-info">
                                <?php
                                if (!empty($solution_info_bottom['cases_solution-info-bottom-title']) || !empty($solution_info_bottom['cases_solution-info-bottom-text'])) : ?>
                                    <div class="aside-info__text">
                                        <?php if (!empty($solution_info_bottom['cases_solution-info-bottom-title'])) : ?>
                                            <span><?php echo $solution_info_bottom['cases_solution-info-bottom-title'] ?></span>
                                        <?php endif ?>
                                        <?php if (!empty($solution_info_bottom['cases_solution-info-bottom-text'])) : ?>
                                            <?php echo $solution_info_bottom['cases_solution-info-bottom-text'] ?>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <a href='<?php echo $solution_info_bottom['cases_solution-info-bottom-link']['url'] ?>' class="aside-info__link">
                                    <?php echo $solution_info_bottom['cases_solution-info-bottom-link']['title'] ?></a>
                            </aside>
                        <?php else : ?>
                            <aside></aside>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </article>
    <?php endwhile ?>
</main>


<?php
get_template_part('reg-app');
get_footer();
?>