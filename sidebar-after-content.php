<?php

if (!is_active_sidebar('after-content')) {
	return;
}

?>

<aside id="after-content" class="widget-area">
	<?php dynamic_sidebar('after-content'); ?>
</aside>