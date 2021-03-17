<?php

$widgets = ['widget-title-menu.php', 'widget-contacts.php', 'widget-text.php'];

foreach ($widgets as $w) {
    require_once(__DIR__ . '/src/inc/' . $w);
}



add_action('after_setup_theme', 's2_setup');
add_action('init', 's2_register_types');
add_action('wp_enqueue_scripts', 's2_scripts');
add_action('widgets_init', 's2_register');
add_action('wp_ajax_business_apps_cat', 'filter_business_apps_cat');
add_action('wp_ajax_nopriv_business_apps_cat', 'filter_business_apps_cat');


add_filter('nav_menu_css_class', 'filter_nav_menu_css_class', 1, 4);
add_filter('nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4);



function s2_setup()
{
    register_nav_menus(
        [
            'menu-footer-1' => 'Меню в подвале №1',
            'menu-footer-2' => 'Меню в подвале №2',
            'menu-footer-3' => 'Меню в подвале №3',
            'menu-footer-4' => 'Меню в подвале №4'
        ]
    );
    register_nav_menu('menu-header-bottom-business-apps', 'Меню "Бизнес-приложения S2"');
    register_nav_menu('menu-header-bottom-about', 'Меню "Компания"');

    register_nav_menu('menu-header-social', 'Меню соц.сетей в шапке');
    register_nav_menu('menu-footer-social', 'Меню соц.сетей в подвале');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}


function s2_scripts()
{

    wp_enqueue_script('script-name', _s2_assets_path('js/script.min.js'), array(), date("d.m.y.h.i.s"));
    wp_enqueue_style('style-name', _s2_assets_path('css/style.min.css'), array(), date("d.m.y.h.i.s"));
}


function s2_register()
{
    register_sidebar([
        'name' => 'Сайдбар с телефоном в шапке',
        'id' => 's2-header-tel',
        'before_widget' => null,
        'after_widget' => null,
    ]);

    register_sidebar([
        'name' => 'Сайдбар с соц.сетями в шапке',
        'id' => 's2-header-social',
        'before_widget' => null,
        'after_widget' => null,
    ]);



    register_sidebar([
        'name' => 'Сайдбар с контактами в подвале ',
        'id' => 's2-footer-contact',
        'before_widget' => null,
        'after_widget' => null,
    ]);

    register_sidebar([
        'name' => 'Сайдбар со списками в подвале ',
        'id' => 's2-footer-list',
        'before_widget' => null,
        'after_widget' => null,
        'before_sidebar' => '<div class="footer__list-box">',
        'after_sidebar'  => '</div>',
    ]);

    register_sidebar([
        'name' => 'Сайдбар под подвалом',
        'id' => 's2-footer-info',
        'before_widget' => null,
        'after_widget' => null,
    ]);

    register_widget('s2_footer_list');
    // register_widget('mfc_widget');
    register_widget('s2_widget_text');
    register_widget('s2_widget_contacts');
    //register_widget('s2_widget_social');
}

function s2_register_types()
{


    register_taxonomy('price-period', ['prices-tariff'], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Оплата тарифа',
            'singular_name'     => 'Оплата тарифа',
            'search_items'      => 'Найти Оплату тарифа',
            'all_items'         => 'Все оплаты тарифа',
            'view_item '        => 'Посмотреть Оплату тарифа',
            'edit_item'         => 'Редактировать Оплату тарифа',
            'update_item'       => 'Обновить Оплату тарифа',
            'add_new_item'      => 'Добавить Оплату тарифа',
            'new_item_name'     => 'Новая Оплата тарифа',
            'menu_name'         => 'Все оплаты тарифа',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        'hierarchical'          => true,
    ]);

    register_taxonomy('business-apps-category', ['business-apps'], [
        'label'                 => '',
        'labels'                => [
            'name'              => 'Категория бизнес-приложения',
            'singular_name'     => 'Категория бизнес-приложения',
            'search_items'      => 'Найти категорию бизнес-приложения',
            'all_items'         => 'Все категории бизнес-приложения',
            'view_item '        => 'Посмотреть категорию бизнес-приложения',
            'edit_item'         => 'Редактировать категория бизнес-приложения',
            'update_item'       => 'Обновить категорию бизнес-приложения',
            'add_new_item'      => 'Добавить категорию бизнес-приложения',
            'new_item_name'     => 'Новая категория бизнес-приложения',
            'menu_name'         => 'Все категории бизнес-приложения',
        ],
        'description'           => '', // описание таксономии
        'public'                => true,
        'hierarchical'          => true,
    ]);


    register_post_type('cases', array(
        'labels'             => array(
            'name'               => 'Кейсы', // Основное название типа записи
            'singular_name'      => 'Кейс', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый кейс',
            'edit_item'          => 'Редактировать кейс',
            'new_item'           => 'Новый кейс',
            'view_item'          => 'Посмотреть кейс',
            'search_items'       => 'Найти кейс',
            'not_found'          => 'Кейсов не найдено',
            'not_found_in_trash' => 'В корзине кейсов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Кейсы'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));



    register_post_type('about', array(
        'labels'             => array(
            'name'               => 'О комапнии', // Основное название типа записи
            'singular_name'      => 'О комапнии', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый О комапнии',
            'edit_item'          => 'Редактировать О комапнии',
            'new_item'           => 'Новый О комапнии',
            'view_item'          => 'Посмотреть О комапнии',
            'search_items'       => 'Найти О комапнии',
            'not_found'          => 'О комапнииов не найдено',
            'not_found_in_trash' => 'В корзине О комапнииов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'О компании'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));







    register_post_type('cases-list', array(
        'labels'             => array(
            'name'               => 'Список для кейсов', // Основное название типа записи
            'singular_name'      => 'Список для кейсов', // отдельное название записи типа Book
            'add_new'            => 'Добавить список для кейсов',
            'add_new_item'       => 'Добавить список для кейсов',
            'edit_item'          => 'Редактировать список для кейсов',
            'new_item'           => 'Новый список для кейсов',
            'view_item'          => 'Посмотреть список для кейсов',
            'search_items'       => 'Найти список для кейсов',
            'not_found'          => 'список для кейсов не найдено',
            'not_found_in_trash' => 'В корзине список для кейсов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Список для кейсов'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=cases',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));







    register_post_type('prices', array(
        'labels'             => array(
            'name'               => 'Стоимость', // Основное название типа записи
            'singular_name'      => 'Стоимость', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую стоимость',
            'add_new_item'       => 'Добавить новую стоимость',
            'edit_item'          => 'Редактировать стоимость',
            'new_item'           => 'Новая стоимость',
            'view_item'          => 'Посмотреть стоимость',
            'search_items'       => 'Найти стоимость',
            'not_found'          => 'стоимости не найдено',
            'not_found_in_trash' => 'В корзине стоимости не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Стоимость'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));



    register_post_type('prices-tariff', array(
        'labels'             => array(
            'name'               => 'Тарифные планы', // Основное название типа записи
            'singular_name'      => 'Тарифный план', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый тариф',
            'add_new_item'       => 'Добавить новый тариф',
            'edit_item'          => 'Редактировать тариф',
            'new_item'           => 'Новый тариф',
            'view_item'          => 'Посмотреть тариф',
            'search_items'       => 'Найти тариф',
            'not_found'          => 'Тарифов не найдено',
            'not_found_in_trash' => 'В корзине тарифов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Тарифные планы'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=prices',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));



    register_post_type('prices-comparison', array(
        'labels'             => array(
            'name'               => 'Сравнение планов',
            'singular_name'      => 'Сравнение плана',
            'add_new'            => 'Добавить новое сравнение планов',
            'add_new_item'       => 'Добавить новое сравнение планов',
            'edit_item'          => 'Редактировать сравнение планов',
            'new_item'           => 'Новое сравнение планов',
            'view_item'          => 'Посмотреть сравнение планов',
            'search_items'       => 'Найти сравнение планов',
            'not_found'          => 'Сравнение лановне найдено',
            'not_found_in_trash' => 'В корзине сравнений планов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Сравнение планов'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=prices',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));


    register_post_type('prices-comparison-hd', array(
        'labels'             => array(
            'name'               => 'Сравнение планов (шапка)',
            'singular_name'      => 'Сравнение плана (шапка)',
            'add_new'            => 'Добавить новое сравнение планов (шапка)',
            'add_new_item'       => 'Добавить новое сравнение планов (шапка)',
            'edit_item'          => 'Редактировать сравнение планов (шапка)',
            'new_item'           => 'Новое сравнение планов (шапка)',
            'view_item'          => 'Посмотреть сравнение планов (шапка)',
            'search_items'       => 'Найти сравнение планов (шапка)',
            'not_found'          => 'Сравнение планов (шапка) найдено',
            'not_found_in_trash' => 'В корзине сравнений планов (шапка) не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Сравнение сравнений планов (шапка) '

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=prices',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));

    register_post_type('reviews', array(
        'labels'             => array(
            'name'               => 'Отзывы',
            'singular_name'      => 'Отзыв',
            'add_new'            => 'Добавить новый отзыв',
            'add_new_item'       => 'Добавить новый отзыв',
            'edit_item'          => 'Редактировать отзыв',
            'new_item'           => 'Новый отзыв',
            'view_item'          => 'Посмотреть отзыв',
            'search_items'       => 'Найти отзыв',
            'not_found'          => 'Сравнение отзывов',
            'not_found_in_trash' => 'В корзине отзывов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Отзывы'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));



    register_post_type('business-apps', array(
        'labels'             => array(
            'name'               => 'Бизнес-приложения ',
            'singular_name'      => 'Бизнес-приложение ',
            'add_new'            => 'Добавить новые бизнес-приложения ',
            'add_new_item'       => 'Добавить новое бизнес-приложение ',
            'edit_item'          => 'Редактировать бизнес-приложение ',
            'new_item'           => 'Новое бизнес-приложение ',
            'view_item'          => 'Посмотреть бизнес-приложение ',
            'search_items'       => 'Найти бизнес-приложение ',
            'not_found'          => 'Сравнение бизнес-приложений ',
            'not_found_in_trash' => 'В корзине бизнес-приложений  не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Бизнес-приложения '

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));


    register_post_type('business-apps-list', array(
        'labels'             => array(
            'name'               => 'Список бизнес-приложения',
            'singular_name'      => 'Список бизнес-приложения',
            'add_new'            => 'Добавить новые бизнес-приложения',
            'add_new_item'       => 'Добавить новое бизнес-приложение',
            'edit_item'          => 'Редактировать бизнес-приложение',
            'new_item'           => 'Новое бизнес-приложение',
            'view_item'          => 'Посмотреть бизнес-приложение',
            'search_items'       => 'Найти бизнес-приложение',
            'not_found'          => 'Сравнение бизнес-приложений',
            'not_found_in_trash' => 'В корзине бизнес-приложений  не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Список для бизнес-приложения '

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=business-apps',
        'query_var'          => true,
        'rewrite'            => false,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));

    register_post_type('business-adv-list', array(
        'labels'             => array(
            'name'               => 'Список преимуществ бизнес-приложенияя',
            'singular_name'      => 'Список преимуществ бизнес-приложения',
            'add_new'            => 'Добавить новые Список преимуществ бизнес-приложения',
            'add_new_item'       => 'Добавить новое Список преимуществ бизнес-приложения',
            'edit_item'          => 'Редактировать Список преимуществ бизнес-приложения',
            'new_item'           => 'Новое Список преимуществ бизнес-приложения',
            'view_item'          => 'Посмотреть Список преимуществ бизнес-приложения',
            'search_items'       => 'Найти Список преимуществ бизнес-приложения',
            'not_found'          => 'Сравнение Список преимуществ бизнес-приложений',
            'not_found_in_trash' => 'В корзине Список преимуществ бизнес-приложений  не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Список преимуществ бизнес-приложения '

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'edit.php?post_type=business-apps',
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));




    register_post_type('reg-app', array(
        'labels'             => array(
            'name'               => 'Заявки на регистрацию',
            'singular_name'      => 'Заявка на регистрацию',
            'add_new'            => 'Добавить новые заявки на регистрацию',
            'add_new_item'       => 'Добавить новую заявку на регистрацию',
            'edit_item'          => 'Редактировать заявку на регистрацию',
            'new_item'           => 'Новая заявка на регистрацию',
            'view_item'          => 'Посмотреть заявку на регистрацию',
            'search_items'       => 'Найти заявку на регистрацию',
            'not_found'          => 'Сравнение Заявка на регистрацию',
            'not_found_in_trash' => 'В корзине Заявка на регистрацию не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Заявки на регистрацию'

        ),
        'public'             => true,
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title')
    ));
}

function _s2_assets_path($path)
{
    return get_template_directory_uri() . '/assets/' . $path;
}

function filter_nav_menu_css_class($classes, $item, $args, $depth)
{
    switch ($args->theme_location) {
        case 'menu-header': {
                if ($depth == 0) {
                    $classes[] = 'menu__item';
                } else {
                    $classes[] = 'sub-menu__item';
                }
            }
            break;

        case 'menu-footer-1':
        case 'menu-footer-2':
        case 'menu-footer-3':
        case 'menu-footer-4': {
                $classes[] = 'footer__list-item';
            }
            break;
        case 'menu-footer-social':
        case 'menu-header-social': {
                $classes[] = 'social__item';
            }
            break;
        case 'menu-header-bottom-business-apps':
        case 'menu-header-bottom-about': {
                $classes[] = 'list__item';
            }
            break;
    }
    return $classes;
}

function filter_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    switch ($args->theme_location) {
        case 'menu-header': {
                if ($depth == 0) {
                    $atts['class'] = 'menu__link';
                } else {
                    $atts['class'] = 'sub-menu__link';
                }
            }
            break;
        case 'menu-footer-1':
        case 'menu-footer-2':
        case 'menu-footer-3':
        case 'menu-footer-4': {
                $atts['class'] = 'footer__link link link--small';
            }
            break;
        case 'menu-footer-social':
        case 'menu-header-social': {
                $atts['class'] = 'social__link';
            }
            break;

        case 'menu-header-bottom-about': {
                $atts['class'] = 'list__link link';
            }

        case 'menu-header-bottom-business-apps': {
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                if ($actual_link == $atts['href']) {
                    $atts['class'] = 'list__link link list__link--active';
                } else {
                    $atts['class'] = 'list__link link';
                }
            }

            break;
    }
    return $atts;
}



add_filter('wp_nav_menu_args', 'filter_wp_nav_menu_args');
function filter_wp_nav_menu_args($args)
{
    $locations = get_nav_menu_locations();
    if (!empty($locations)) {
        foreach ($locations as $locationId => $menuValue) {
            if ($args['menu']->term_id == $menuValue) {
                $args['theme_location'] = $locationId;
            }
        }
    }

    switch ($args['theme_location']) {
        case 'menu-header-social': {
                $args['container'] =  false;
                $args['menu_class'] = 'header__social social';
            }
            break;
        case 'menu-footer-social': {
                $args['container'] =  false;
                $args['menu_class'] = 'footer__social social';
            }
            break;
        case 'menu-footer-1':
        case 'menu-footer-2':
        case 'menu-footer-3':
        case 'menu-footer-4': {
                $args['container'] =  false;
                $args['menu_class'] = 'footer__list';
            }
            break;
    }

    return $args;
}


add_filter('dynamic_sidebar_params', 'filter_dynamic_sidebar_params');
function filter_dynamic_sidebar_params($params)
{

    $params[0]['before_title'] = null;

    $params[0]['after_title']  = null;

    return $params;
}



function my_page_columns($columns)
{
    $columns = array(
        'cb' => '< input type="checkbox" />',
        'title' => 'Title',
        'cases_item-text' => 'Custom Field'
    );
    return $columns;
}
add_action("manage_cases-list_posts_custom_column", "my_custom_columns");



function my_custom_columns($column)
{
    global $post;
    if ($column == 'cases_item-text') {
        echo get_field('cases_item-text', $post->ID);
    } else {
        echo '';
    }
}

add_filter("manage_edit-cases-list_columns", "my_page_columns");


function filter_business_apps_cat()
{
    $catSlug = $_POST['category'];
    $response = '';
    $cat = (object) '';
    if ($catSlug == 'all') {
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'business-apps',

        ];

        $args_terms = [
            'taxonomy' => 'business-apps-category',
            'orderby' =>  'meta_value_num',
            'order' =>  'ASC',
            'orderby' => 'slug',
            'hide_empty' =>  false,
        ];
    } else {
        $args = [
            'posts_per_page' => -1,
            'post_type' => 'business-apps',
            'business-apps-category' => $catSlug,
        ];

        $args_terms = [
            'taxonomy' => 'business-apps-category',
            'slug' => $catSlug
        ];
    }

    $list_cat = get_terms($args_terms);

    foreach ($list_cat as $cat) {
        if ($catSlug == 'all')
            $ajaxposts =  new WP_Query($args + ['business-apps-category' => $cat->slug]);
        else {
            $ajaxposts =  new WP_Query($args);
        }
        if ($ajaxposts->have_posts()) {
            $response = <<<EODD
        <div class="business-apps__box">
       <div class="business-apps__title title-h2"> $cat->name </div>
       <ul class="business-apps__list">
EODD;
            echo $response;
            while ($ajaxposts->have_posts()) {
                $ajaxposts->the_post();
                $response = get_template_part('src/templates/_business-apps-item');
            }
            wp_reset_postdata();
            echo $response;
            $response = <<<EOD
        </ul>
        </div>
EOD;
            echo $response;
        }
    }
    wp_die();
}