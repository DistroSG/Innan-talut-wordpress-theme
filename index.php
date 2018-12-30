<?php get_header(); ?>
<aside id="sidebar-primary" class="site-sidebar"></aside>

<main id="content" class="site-content">
	<?php
		if ( have_posts() ) :
			echo '<h1> Content was found! </h1>';

			while ( have_posts() ) :
				/**The function the_post() takes the current item in the collection of posts and makes it available for use inside this iteration of The Loop. */
				the_post();
				echo '<h2> Current content is: </h2>';
				the_content();
			endwhile;

		else :
			echo '<h1> No content was found! :( </h1>';
		endif;
	?>
</main>

<?php get_footer(); ?>