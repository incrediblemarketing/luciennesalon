<?php

if (class_exists('acf_field')) {

	class acf_field_unique_id extends acf_field {

		function __construct() {
			$this->name = 'unique_id';
			$this->label = __('Unique ID', 'acf-unique_id');
			$this->category = 'layout';
			$this->l10n = array();

			parent::__construct();
		}

		function render_field( $field ) {
			?>
			<input type="text" readonly="readonly" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" />
			<?php
		}

		function update_value( $value, $post_id, $field ) {
			if (!$value) {
				$value = uniqid();
			}
			return $value;
		}

		function validate_value( $valid, $value, $field, $input ){
			return true;
		}
	}

	// create field
	new acf_field_unique_id();

}

