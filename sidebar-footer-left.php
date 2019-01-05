<?php

if (!is_active_sidebar('footer-left')) {
	return;
}

?>

<aside id="footer-left" class="widget-area">
	<?php dynamic_sidebar('footer-left'); ?>
</aside>