<?php
if (!defined('ABSPATH')) exit();



class PGBlockFormFieldCheckbox
{
    function __construct()
    {
        add_action('init', array($this, 'register_scripts'));
    }


    // loading src files in the gutenberg editor screen
    function register_scripts()
    {
        // wp_register_style('editor_style', post_grid_plugin_url . 'src/blocks/text/index.css');
        //wp_register_script('editor_script', post_grid_plugin_url . 'src/blocks/text/index.js', array('wp-blocks', 'wp-element'));


        register_block_type('post-grid/form-field-checkbox', array(
            //'editor_script' => 'editor_script',
            //'editor_style' => 'editor_style',
            //'script' => 'front_script',
            'uses_context' =>  ["postId", "loopIndex", "postType", "queryId"],
            //'style' => 'front_style',
            'render_callback' => array($this, 'theHTML'),
            'attributes' =>  array(
                'wrapper' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'labelWrap' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'enable' => true,
                            'class' => '',
                        ),
                    ),
                ),
                'label' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'label',
                            'for' => 'label',
                            'enable' => true,
                            'text' => 'Your Name',
                            'class' => 'pg-form-field-label',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'item' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'itemLabel' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'input' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'value' => NULL,
                            'name' => '',
                            'required' => false,
                            'disabled' => false,
                            'multiple' => false,
                            'autofocus' => NULL,
                            'readonly' => false,
                            'args' =>
                            array(
                                0 =>
                                array(
                                    'label' => 'Option 1',
                                    'value' => 'option1',
                                ),
                                1 =>
                                array(
                                    'label' => 'Option 2',
                                    'value' => 'option2',
                                ),
                                2 =>
                                array(
                                    'label' => 'Option 3',
                                    'value' => 'option3',
                                ),
                            ),
                            'id' => '',
                            'class' => 'pg-form-field-checkbox',
                            'postion' => 'afterLabel',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'inputWrap' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'enable' => true,
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'errorWrap' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'div',
                            'enable' => true,
                            'text' => '',
                            'position' => 'afterInput',
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'requiredWrap' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'options' =>
                        array(
                            'tag' => 'span',
                            'enable' => true,
                            'class' => '',
                        ),
                        'styles' =>
                        array(),
                    ),
                ),
                'blockId' =>
                array(
                    'type' => 'string',
                    'default' => '',
                ),
                'customCss' =>
                array(
                    'type' => 'string',
                    'default' => '',
                ),
                'blockCssY' =>
                array(
                    'type' => 'object',
                    'default' =>
                    array(
                        'items' =>
                        array(),
                    ),
                ),
            )


        ));
    }

    function front_script($attributes)
    {
    }
    function front_style($attributes)
    {
    }

    // front-end output from the gutenberg editor 
    function theHTML($attributes, $content, $block)
    {


        global $postGridCustomCss;
        global $postGridCssY;



        $post_ID = isset($block->context['postId']) ? $block->context['postId'] : '';
        $post_url = get_the_permalink($post_ID);
        $the_post = get_post($post_ID);
        $text = '';

        $blockId = isset($attributes['blockId']) ? $attributes['blockId'] : '';
        $blockAlign = isset($attributes['align']) ? 'align' . $attributes['align'] : '';
        $customCss = isset($attributes['customCss']) ? $attributes['customCss'] : '';


        $labelWrap = isset($attributes['labelWrap']) ? $attributes['labelWrap'] : [];
        $labelWrapOptions = isset($labelWrap['options']) ? $labelWrap['options'] : [];

        $input = isset($attributes['input']) ? $attributes['input'] : [];
        $inputOptions = isset($input['options']) ? $input['options'] : [];
        $inputType = isset($inputOptions['type']) ? $inputOptions['type'] : 'text';
        $inputPlaceholder = isset($inputOptions['placeholder']) ? $inputOptions['placeholder'] : '';
        $inputValue = isset($inputOptions['value']) ? $inputOptions['value'] : [];
        $inputName = !empty($inputOptions['name']) ? $inputOptions['name'] : $blockId;
        $inputRequired = isset($inputOptions['required']) ? $inputOptions['required'] : false;
        $inputDisabled = isset($inputOptions['disabled']) ? $inputOptions['disabled'] : false;
        $inputReadonly = isset($inputOptions['readonly']) ? $inputOptions['readonly'] : false;
        $inputArgs = isset($inputOptions['args']) ? $inputOptions['args'] : [];

        $inputName = $inputName . '[]';

        $inputWrap = isset($attributes['inputWrap']) ? $attributes['inputWrap'] : [];
        $inputWrapOptions = isset($inputWrap['options']) ? $inputWrap['options'] : [];


        $label = isset($attributes['label']) ? $attributes['label'] : [];
        $labelOptions = isset($label['options']) ? $label['options'] : [];
        $labelEnable = isset($labelOptions['enable']) ? $labelOptions['enable'] : true;
        $labelText = isset($labelOptions['text']) ? $labelOptions['text'] : '';


        $errorWrap = isset($attributes['errorWrap']) ? $attributes['errorWrap'] : [];
        $errorWrapOptions = isset($errorWrap['options']) ? $errorWrap['options'] : [];
        $errorWrapPosition = isset($errorWrapOptions['position']) ? $errorWrapOptions['position'] : '';
        $errorWrapText = isset($errorWrapOptions['text']) ? $errorWrapOptions['text'] : '';


        $blockCssY = isset($attributes['blockCssY']) ? $attributes['blockCssY'] : [];
        $postGridCssY[] = isset($blockCssY['items']) ? $blockCssY['items'] : [];


        $postGridCustomCss .= $customCss;







        ob_start();


?>



        <div class="<?php echo esc_attr($blockId); ?>">


            <div class='label-wrap'>

                <?php if ($labelEnable) : ?>
                    <label for=""><?php echo wp_kses_post($labelText); ?></label>
                <?php endif; ?>


                <?php if ($errorWrapPosition == 'afterlabel') : ?>
                    <div class='error-wrap'><?php echo wp_kses_post($errorWrapText); ?></div>
                <?php endif; ?>


            </div>
            <div class='input-wrap'>

                <?php

                if (!empty($inputArgs)) :
                    foreach ($inputArgs as $index => $inputArg) :

                ?><div className='item'>
                            <input id="<?php echo esc_attr($blockId . '-' . $index) ?>" type="checkbox" placeholder="<?php echo esc_attr($inputPlaceholder); ?>" value="<?php echo esc_attr($inputArg['value']); ?>" name="<?php echo esc_attr($inputName); ?>" <?php if ($inputRequired) : ?> required <?php endif; ?> <?php if ($inputDisabled) : ?> disabled <?php endif; ?> <?php if ($inputReadonly) : ?> readonly <?php endif; ?> <?php if (in_array($inputArg['value'], $inputValue)) : ?> checked <?php endif; ?> />
                            <label for="<?php echo esc_attr($blockId . '-' . $index) ?>">
                                <?php echo wp_kses_post($inputArg['label']); ?>
                            </label>
                        </div>

                <?php

                    endforeach;
                endif;

                ?>



                <?php if ($errorWrapPosition == 'afterInput') : ?>
                    <div class='error-wrap'><?php echo wp_kses_post($errorWrapText); ?></div>

                <?php endif; ?>
            </div>






        </div>

<?php
        return ob_get_clean();
    }
}

$PGBlockFormFieldCheckbox = new PGBlockFormFieldCheckbox();
