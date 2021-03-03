<?php
class  S2_Widget_Contacts extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('s2_widget_contacts', 'S2 - Виджет контактов', [
            'name' => 'S2 - Виджет контактов',
            'description' => 'Выводит контакт и название контакта снизу'
        ]);
    }

    public function form($instance)
    {
?>

        <p>
            <label for='<?php echo $this->get_field_id('id-contact') ?>'>Введите контакт</label>
            <input id='<?php echo $this->get_field_id('id-contact') ?>' type="text" name="<?php echo $this->get_field_name('contact'); ?>" value="<?php echo $instance['contact']; ?>">
        </p>

        <p>
            <label for='<?php echo $this->get_field_id('id-contact-name') ?>'>Введите название контакта</label>
            <input id='<?php echo $this->get_field_id('id-contact-name') ?>' type="text" name="<?php echo $this->get_field_name('contact-name'); ?>" value="<?php echo $instance['contact-name']; ?>">
        </p>
    <?php
    }

    public function widget($args, $instance)
    {

        if (strpos($instance['contact'], '@')) {
            $href_contact = 'email:' . $instance['contact'];
        } else {
            $pattern = '/[^+0-9]/';
            $new_tel = preg_replace($pattern, '', $instance['contact']);
            $href_contact = 'tel:' . $new_tel;
        }
    ?>
        <div class="footer__contact-item">
            <a href="<?php echo $href_contact ?>" class="footer__contact-title"> <?php echo $instance['contact']; ?></a>
            <div class="footer__contact-subtitle"><?php echo $instance['contact-name']; ?></div>
        </div>
<?php


    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
