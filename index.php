<?php get_header(); ?>
<?php get_sidebar('before-content'); ?>

<main id="main" class="site-content text">

	<div class="content">

		<?php if (have_posts()) : ?>
				<?php 
					while (have_posts()) {
						/**The function the_post() takes the current item in the collection of posts and makes it available for use inside this iteration of The Loop. */ 
						the_post();

						if(!is_front_page()){
							the_title('<h1 class="entry-title">', '</h1>');
						}
						
						the_content();
					}
				?>
		<?php else : ?>
			<h1>Sisältöä ei löytynyt</h1>
			<figure id="not-found-image"><img src="https://upload.wikimedia.org/wikipedia/commons/6/62/%D0%A7%D1%91%D1%80%D0%BD%D1%8B%D0%B9_%D0%BA%D0%B2%D0%B0%D0%B4%D1%80%D0%B0%D1%82._1929._%D0%93%D0%A2%D0%93.PNG" alt="Black Square"></figure>
		<?php endif; ?>

	</div>

</main>

<?php get_sidebar('after-content'); ?>
<?php get_footer(); ?>