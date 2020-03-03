<?php

$fl = get_field('footer_layout', 'option');
$footer = 'components/footers/' . $fl;
get_template_part($footer);

wp_footer(); ?>

</body>

</html>