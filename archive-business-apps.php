<?php

get_header();
?>

<main class="business-apps">
    <div class='container'>
        <div class="business-apps__inner">

            <aside class="business-apps-aside">
                <ul class="business-apps-aside__list">
                    <button data-slug="all" class="business-apps-aside__link link">Все сразу</button>
                    <?php $business_apps_category = get_terms([
                        'taxonomy' => 'business-apps-category',
                        'orderby' =>  'meta_value_num',
                        'order' =>  'ASC',
                        'orderby' => 'slug',
                        'hide_empty' =>  false,
                    ]); ?>
                    <?php foreach ($business_apps_category as $category_item) : ?>
                    <button data-slug="<?php echo $category_item->slug ?>"
                        class="business-apps-aside__link link"><?php echo $category_item->name ?></button>
                    <?php endforeach ?>
                </ul>

            </aside>
            <div class="business-apps__content">
            </div>
        </div>
    </div>
</main>



<?php
get_template_part('reg-app');
get_footer();
?>