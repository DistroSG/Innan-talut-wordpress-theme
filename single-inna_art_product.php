<?php get_header(); ?>
<?php get_sidebar('before-content'); ?>

<main id="main" class="site-content art">

	<div class="content">

	
	    <?php while (have_posts()): the_post();  ?>
                        
        <div class="art-content">
            <?php the_title('<h1 class="image-title">', '</h1>'); ?>
            <?php $image = rwmb_meta('art_product_art_select', array( 'size' => 'medium' ), $post_id); ?>
            <a class="image foobox" href="<?php echo $image['full_url']; ?>"><img src="<?php echo $image['url']; ?>"></a>
            <?php $audio = reset(rwmb_meta('art_product_audio_select', array('limit' => 1), $post_id)); ?>
            <div class="image-description"><?php rwmb_the_value('art_product_image_wysiwyg', array(), $post_id);?></div>
            <?php  if(!is_null($audio["url"])) :?>
                <audio class="audio" controls="" src="<?php echo $audio["url"];?>"></audio>
                <div class="audio-description"><?php rwmb_the_value('art_product_audio_wysiwyg', array(), $post_id);?></div>
            <?php endif; ?>
             
            
        </div>

        <?php endwhile;?>
		
	</div>

</main>

<?php get_sidebar('after-content'); ?>
<?php get_footer(); ?>