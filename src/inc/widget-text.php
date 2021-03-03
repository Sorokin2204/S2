<?php
class  S2_Widget_Text extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('s2_widget_text', 'S2 - Текстовый виджет', [
            'name' => 'S2 - Текстовый виджет',
            'description' => 'Выводит простой текст'
        ]);
    }

    public function form($instance)
    {
?>

        <div>
            <label for='<?php echo $this->get_field_id('id-text') ?>'>Введите текст</label>
            <input id='<?php echo $this->get_field_id('id-text') ?>' type="text" name="<?php echo $this->get_field_name('text'); ?>" value="<?php echo $instance['text']; ?>">
        </div>
<?php
    }

    public function widget($args, $instance)
    {
        echo $instance['text'];
    }

    public function update($new_instance, $old_instance)
    {
        return $new_instance;
    }
}
