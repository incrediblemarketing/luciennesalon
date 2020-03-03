<?php

function im_acf_admin_head() {
	?>
	<style type="text/css">
	.acf-field-unique-id {display:none;}
	.acf-fields > .acf-field-unique-id + .acf-field {border-top:0;}
	.hide-label > .acf-label {display:none;}

	[data-name="column_classes"] {padding-top:0 !important; padding-bottom:0 !important;}
	[data-name="column_classes"] > .acf-input > .acf-fields {display:-webkit-box; display:-ms-flexbox; display:flex; border:none;}
	[data-name="column_classes"] [data-name^="column_"] {padding:0; -webkit-box-flex:1; -ms-flex:1; flex:1;}
	[data-name="column_classes"] [data-name^="column_"] + [data-name^="column_"] {margin-left:12px; padding-left:12px; border-left:#eee solid 1px; border-top:none;}
	[data-name="column_classes"] [data-name^="column_"] > .acf-input > .acf-fields {border:none;}
	[data-name="column_classes"] [data-name^="column_"] > .acf-input > .acf-fields > .acf-field {padding-left:0; padding-right:0;}
	/*[data-name="column_classes"] [data-name^="column_"] > .acf-input > .acf-fields > .acf-field + .acf-field {margin-top:12px; padding-top:12px;}*/


	[data-name="global_default_block_options"] > .acf-input > .acf-fields,
	[data-name="global_default_block_content_options"] > .acf-input > .acf-fields {border:none;}
	[data-name="global_default_block_options"] > .acf-input > .acf-fields > .acf-field,
	[data-name="global_default_block_content_options"] > .acf-input > .acf-fields > .acf-field {padding:0;}
	[data-name="global_default_block_options"] > .acf-input > .acf-fields > .acf-field + .acf-field,
	[data-name="global_default_block_content_options"] > .acf-input > .acf-fields > .acf-field + .acf-field {margin-top:15px; padding-top:15px;}

	[data-name="block"] > .acf-input > .acf-fields,
	[data-name="block_content"] > .acf-input > .acf-fields {border:none;}
	[data-name="block"] > .acf-input > .acf-fields > .acf-field,
	[data-name="block_content"] > .acf-input > .acf-fields > .acf-field {padding:0;}
	[data-name="block"] > .acf-input > .acf-fields > .acf-field + .acf-field,
	[data-name="block_content"] > .acf-input > .acf-fields > .acf-field + .acf-field {margin-top:15px; padding-top:15px;}

	[data-name="defaults"] > .acf-input > .acf-fields {display:-webkit-box; display:-ms-flexbox; display:flex; border:none;}
	[data-name="defaults"] > .acf-input > .acf-fields > .acf-field {padding:0; -webkit-box-flex:1; -ms-flex:1; flex:1;}
	[data-name="defaults"] > .acf-input > .acf-fields > .acf-field + .acf-field {border-top:none; margin-left:12px;}

	[data-name="element_fields"] > .acf-input > .acf-fields {border:none;}
	[data-name="element_fields"] > .acf-input > .acf-fields > .acf-field {padding:0;}
	[data-name="element_fields"] > .acf-input > .acf-fields > .acf-field + .acf-field {margin-top:15px; padding-top:15px;}

	.acf-tab-wrap.-left .acf-tab-group .acf-hidden + li.active a {border-top:0;}

	</style>
	<?php
}
add_action('acf/input/admin_head', 'im_acf_admin_head');
