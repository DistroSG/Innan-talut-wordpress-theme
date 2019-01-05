<?php

if (!is_active_sidebar('before-content')) {
	return;
}

?>

<aside id="before-content" class="widget-area">
	<?php dynamic_sidebar('before-content'); ?>
</aside>