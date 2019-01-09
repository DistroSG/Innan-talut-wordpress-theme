<?php get_header(); ?>
<?php get_sidebar('before-content'); ?>

<main id="main" class="site-content gallery">

	<div class="content">

    <h1 class="entry-title"> <?php echo __('Galleria') ?> </h1>
    <section class="images">

        <?php while (have_posts()): the_post();  ?>
              
          <?php $post = get_post(); ?>
        
          <a href="<?php echo esc_url($post->guid) ?>"><?php rwmb_the_value('art_product_art_select', array( 'size' => 'medium' ), $post_id);?></a>
          
        <?php endwhile;?>

      </section>

      <?php the_posts_pagination( ); ?> 
	</div>

</main>
<?php get_sidebar('after-content'); ?>
<?php get_footer(); ?>
