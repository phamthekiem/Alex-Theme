<?php
add_action('acf/include_field_types', function () {

    class acf_field_custom_repeater extends acf_field
    {
        public function __construct($settings)
        {
            $this->name = 'custom_repeater';
            $this->label = __('Custom Repeater', 'acf');
            $this->category = 'layout';
            $this->defaults = array(
                'sub_fields' => array()
            );
            $this->settings = $settings;
            parent::__construct();
        }

        /**
         * Render UI cấu hình sub-field trong ACF admin
         */
        public function render_field_settings($field)
        {
            // Giá trị hiện tại
            $sub_fields = isset($field['sub_fields']) && is_array($field['sub_fields']) ? $field['sub_fields'] : array();

            echo '<div class="acf-cr-subfields">';
            echo '<strong>Sub Fields:</strong>';
            echo '<table class="widefat">';
            echo '<thead><tr><th>Label</th><th>Name</th><th>Type</th><th>Remove</th></tr></thead>';
            echo '<tbody>';

            if (!empty($sub_fields)) {
                foreach ($sub_fields as $i => $sf) {
                    $this->render_subfield_row($field['key'], $i, $sf);
                }
            }

            echo '</tbody></table>';
            echo '<button type="button" class="button acf-cr-add-subfield">+ Add Sub Field</button>';
            echo '</div>';

            // JS thêm sub-field
            ?>
            <script>
            jQuery(document).ready(function($){
                $(document).on('click', '.acf-cr-add-subfield', function(e){
                    e.preventDefault();
                    let table = $(this).siblings('table');
                    let count = table.find('tbody tr').length;
                    let key = $(this).closest('.acf-field-object').data('key');

                    let newRow = `
                        <tr>
                            <td><input type="text" name="fields[${key}][sub_fields][${count}][label]" /></td>
                            <td><input type="text" name="fields[${key}][sub_fields][${count}][name]" /></td>
                            <td>
                                <select name="fields[${key}][sub_fields][${count}][type]">
                                    <option value="text">Text</option>
                                    <option value="select">Select</option>
                                    <option value="image">Image</option>
                                </select>
                            </td>
                            <td><button type="button" class="button acf-cr-remove-subfield">Remove</button></td>
                        </tr>`;
                    table.find('tbody').append(newRow);
                });

                $(document).on('click', '.acf-cr-remove-subfield', function(e){
                    e.preventDefault();
                    $(this).closest('tr').remove();
                });
            });
            </script>
            <?php
        }

        private function render_subfield_row($key, $i, $sf)
        {
            ?>
            <tr>
                <td><input type="text" name="fields[<?php echo $key; ?>][sub_fields][<?php echo $i; ?>][label]" value="<?php echo esc_attr($sf['label'] ?? ''); ?>" /></td>
                <td><input type="text" name="fields[<?php echo $key; ?>][sub_fields][<?php echo $i; ?>][name]" value="<?php echo esc_attr($sf['name'] ?? ''); ?>" /></td>
                <td>
                    <select name="fields[<?php echo $key; ?>][sub_fields][<?php echo $i; ?>][type]">
                        <option value="text" <?php selected($sf['type'] ?? '', 'text'); ?>>Text</option>
                        <option value="select" <?php selected($sf['type'] ?? '', 'select'); ?>>Select</option>
                        <option value="image" <?php selected($sf['type'] ?? '', 'image'); ?>>Image</option>
                    </select>
                </td>
                <td><button type="button" class="button acf-cr-remove-subfield">Remove</button></td>
            </tr>
            <?php
        }

        /**
         * Render field khi nhập dữ liệu trong post editor
         */
        public function render_field($field)
        {
            $value = is_array($field['value']) ? $field['value'] : array();
            echo '<div class="acf-custom-repeater" data-name="' . esc_attr($field['name']) . '">';

            if (!empty($value)) {
                foreach ($value as $index => $row_data) {
                    $this->render_row($field, $index, $row_data);
                }
            }

            echo '<button type="button" class="acf-cr-add button">+ Add Row</button>';
            echo '</div>';

            $this->render_scripts($field);
        }

        private function render_row($field, $index, $row_data = array())
        {
            echo '<div class="acf-custom-repeater-row">';
            foreach ($field['sub_fields'] as $sub) {
                $name_attr = $field['name'] . '[' . $index . '][' . $sub['name'] . ']';
                $val = isset($row_data[$sub['name']]) ? $row_data[$sub['name']] : '';

                echo '<div class="acf-cr-field">';
                echo '<label>' . esc_html($sub['label']) . '</label>';

                switch ($sub['type']) {
                    case 'text':
                        echo '<input type="text" name="' . esc_attr($name_attr) . '" value="' . esc_attr($val) . '" />';
                        break;

                    case 'select':
                        echo '<select name="' . esc_attr($name_attr) . '">';
                        echo '<option value="option1"' . selected($val, 'option1', false) . '>Option 1</option>';
                        echo '<option value="option2"' . selected($val, 'option2', false) . '>Option 2</option>';
                        echo '</select>';
                        break;

                    case 'image':
                        $image_url = $val ? wp_get_attachment_image_url($val, 'thumbnail') : '';
                        echo '<div class="acf-cr-image-wrap">';
                        echo '<input type="hidden" name="' . esc_attr($name_attr) . '" value="' . esc_attr($val) . '" />';
                        echo '<img src="' . esc_url($image_url) . '" style="max-width:80px;max-height:80px;' . (!$image_url ? 'display:none;' : '') . '" />';
                        echo '<button type="button" class="acf-cr-upload button">Select Image</button>';
                        echo '</div>';
                        break;
                }
                echo '</div>';
            }
            echo '<button type="button" class="acf-cr-remove button button-danger">Remove</button>';
            echo '</div>';
        }

        private function render_scripts($field)
        {
            ?>
            <style>
                .acf-custom-repeater-row { border:1px solid #ccc; padding:10px; margin-bottom:10px; background:#f9f9f9; }
                .acf-cr-field { margin-bottom:8px; }
                .acf-cr-field label { display:block; font-weight:bold; margin-bottom:4px; }
                .acf-cr-remove { background:#d63638; color:#fff; }
            </style>
            <script>
            jQuery(document).ready(function($){
                let frame;

                $(document).on('click', '.acf-cr-add', function(e){
                    e.preventDefault();
                    let wrapper = $(this).closest('.acf-custom-repeater');
                    let count = wrapper.find('.acf-custom-repeater-row').length;
                    let subFields = <?php echo json_encode($field['sub_fields']); ?>;
                    let newRow = '<div class="acf-custom-repeater-row">';
                    subFields.forEach(function(sf){
                        let nameAttr = wrapper.data('name') + '[' + count + '][' + sf.name + ']';
                        newRow += '<div class="acf-cr-field"><label>'+sf.label+'</label>';
                        if(sf.type === 'text'){
                            newRow += '<input type="text" name="'+nameAttr+'" />';
                        } else if(sf.type === 'select'){
                            newRow += '<select name="'+nameAttr+'"><option value="option1">Option 1</option><option value="option2">Option 2</option></select>';
                        } else if(sf.type === 'image'){
                            newRow += '<div class="acf-cr-image-wrap"><input type="hidden" name="'+nameAttr+'" /><img src="" style="max-width:80px;max-height:80px;display:none;" /><button type="button" class="acf-cr-upload button">Select Image</button></div>';
                        }
                        newRow += '</div>';
                    });
                    newRow += '<button type="button" class="acf-cr-remove button button-danger">Remove</button></div>';
                    $(this).before(newRow);
                });

                $(document).on('click', '.acf-cr-remove', function(e){
                    e.preventDefault();
                    $(this).closest('.acf-custom-repeater-row').remove();
                });

                $(document).on('click', '.acf-cr-upload', function(e){
                    e.preventDefault();
                    let button = $(this);
                    if(frame) frame.close();
                    frame = wp.media({ title: 'Select or Upload Image', button: { text: 'Use this image' }, multiple: false });
                    frame.on('select', function(){
                        let attachment = frame.state().get('selection').first().toJSON();
                        button.siblings('input[type="hidden"]').val(attachment.id);
                        button.siblings('img').attr('src', attachment.sizes.thumbnail.url).show();
                    });
                    frame.open();
                });
            });
            </script>
            <?php
        }

        public function update_value($value, $post_id, $field)
        {
            return is_array($value) ? array_values($value) : $value;
        }
    }

    new acf_field_custom_repeater(array());
});
