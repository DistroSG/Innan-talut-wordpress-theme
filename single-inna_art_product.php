<?php get_header(); ?>
<?php get_sidebar('before-content'); ?>

<main id="main" class="site-content art">

	<div class="content">

	
	    <?php while (have_posts()): the_post();  ?>
                        
        <div class="art-content">
            <?php 
                $image = rwmb_meta('art_product_art_select', array( 'size' => 'medium' ), $post_id);
                echo '<a class="image foobox" href="', $image['full_url'], '"><img src="', $image['url'], '"></a>';
            ?>
            <?php
                $audio = reset(rwmb_meta('art_product_audio_select', array('limit' => 1), $post_id));
                echo '<audio class="audio" controls="" src="', $audio["url"],'"></audio>'
             ?>
            <p class="info"><?php  rwmb_the_value('art_product_textarea', array(), $post_id);?></p>
        </div>

        <?php endwhile;?>
		
	</div>

</main>

<?php get_sidebar('after-content'); ?>
<?php get_footer(); ?>