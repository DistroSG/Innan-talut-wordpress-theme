<?php get_header(); ?>

<main id="main" class="site-content">

	<div class="content">

		<?php if (have_posts()) : ?>
				<?php 
					while (have_posts()) :
						/**The function the_post() takes the current item in the collection of posts and makes it available for use inside this iteration of The Loop. */ 
						the_post(); 
						the_content();
					endwhile; 
				?>
		<?php else : ?>
			<h1> No content was found! :( </h1>
		<?php endif; ?>

	</div>

</main>

<?php get_footer(); ?>