<?php

$widgets = ['widget-title-menu.php', 'widget-contacts.php', 'widget-text.php'];

foreach ($widgets as $w) {
    require_once(__DIR__ . '/src/inc/' . $w);
}



add_action('after_setup_theme', 's2_setup');
add_action('wp_enqueue_scripts', 's2_scripts');
add_action('widgets_init', 's2_register');


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
    register_nav_menu('menu-header', 'Меню в шапке');
    register_nav_menu('menu-header-social', 'Меню соц.сетей в шапке');
    register_nav_menu('menu-footer-social', 'Меню соц.сетей в подвале');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}


function s2_scripts()
{
    wp_enqueue_script('script-name', _s2_assets_path('js/script.min.js'));
    wp_enqueue_style('style-name', _s2_assets_path('css/style.min.css'));
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
