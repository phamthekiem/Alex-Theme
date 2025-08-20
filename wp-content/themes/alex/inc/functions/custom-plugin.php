<?php
if( function_exists('acf_register_field_type') ) {

    class ACF_Field_Custom_Repeater extends acf_field {

        function __construct( $settings ) {
            $this->name     = 'custom_repeater';
            $this->label    = __('Custom Repeater', 'acf');
            $this->category = 'layout'; // category hiển thị
            $this->defaults = array(
                'sub_fields' => array(),
            );

            $this->settings = $settings;
            parent::__construct();
        }

        // Render UI ở admin
        function render_field( $field ) {
            ?>
            <div class="acf-custom-repeater">
                <button type="button" class="button add-row">+ Add Row</button>
                <div class="rows">
                    <!-- JS sẽ render sub-fields ở đây -->
                </div>
            </div>
            <?php
        }

        // Render UI cấu hình sub-field
        function render_field_settings( $field ) {
            acf_render_field_setting( $field, array(
                'label'        => __('Sub Fields', 'acf'),
                'instructions'=> __('Define the sub fields for each row','acf'),
                'type'         => 'textarea',
                'name'         => 'sub_fields',
            ));
        }

        // Xử lý lưu giá trị
        function update_value( $value, $post_id, $field ) {
            return $value;
        }

        function load_value( $value, $post_id, $field ) {
            return $value;
        }
    }

    acf_register_field_type( new ACF_Field_Custom_Repeater( array() ) );
}
