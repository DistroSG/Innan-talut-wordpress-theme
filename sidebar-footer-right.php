<?php

if (!is_active_sidebar('footer-right')) {
	return;
}

?>

<aside id="footer-right" class="widget-area">
	<?php dynamic_sidebar('footer-right'); ?>
</aside>