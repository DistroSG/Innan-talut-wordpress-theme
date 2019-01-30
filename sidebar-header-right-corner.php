<?php

if (!is_active_sidebar('header-right-corner')) {
	return;
}

?>

<aside id="header-right-corner" class="widget-area">
	<?php dynamic_sidebar('header-right-corner'); ?>
</aside>