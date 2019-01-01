<?php
/**
 * The sidebar containing the Footer Bottom Left widget area.
 *
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}

?>

<aside id="footer-bottom-left" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>