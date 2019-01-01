<?php
/**
 * The sidebar containing the Footer Bottom Right widget area.
 *
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside id="footer-bottom-right" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</aside>