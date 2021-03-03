<?php

class s2_footer_list extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 's2_footer_list',
            'description' => 'Создает список ссылок в подвале',

        );

        parent::__construct('s2_footer_list', 'S2 - Список в подвале', $widget_details);
    }


    public function widget($args, $instance)
    {

        $nav_menu = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;

        if (!$nav_menu)
            return;


        $instance['title'] = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        echo '<div class="footer__list-content">';


        if (!empty($instance['title']))
            echo ' <div class="footer__list-title">' . $instance['title'] . '</div>';


        wp_nav_menu(array('fallback_cb' => '', 'menu' => $nav_menu));

        echo '</div>';
    }

    public function update($new_instance, $old_instance)
    {
        $instance['title'] = strip_tags(stripslashes($new_instance['title']));
        $instance['nav_menu'] = (int) $new_instance['nav_menu'];
        return $instance;
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';

        // Get menus
        $menus = wp_get_nav_menus(array('orderby' => 'name'));

        // If no menus exists, direct the user to go and create some.
        if (!$menus) {
            echo '<p>' . sprintf(__('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php')) . '</p>';
            return;
        }
?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
            <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
            <select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
                <?php
                foreach ($menus as $menu) {
                    echo '<option value="' . $menu->term_id . '"'
                        . selected($nav_menu, $menu->term_id, false)
                        . '>' . $menu->name . '</option>';
                }
                ?>
            </select>
        </p>
<?php
    }
}
