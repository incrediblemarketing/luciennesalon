<?php

function shortcode_call_number() {
	$text = get_field('business_phone_display', 'options');
	$tel = get_field('business_phone_url', 'options');
	
	if ($text && $tel) : 
		return '<a href="tel:'.$tel.'">'.$text.'</a>';
	endif;
}
add_shortcode('call_number', 'shortcode_call_number');
