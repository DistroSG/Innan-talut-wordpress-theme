<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div id="page" class="site">
            <header id="masthead" class="site-header" style="background-image: url( <?php esc_attr( header_image() ); ?> );
		height: <?php echo esc_attr( get_custom_header()->height ); ?>px">
            <h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' ); ?>

            <?php if ( $description || is_customize_preview() ) : ?>
                <h2 id="site-description"><?php echo $description;?></h2>
            <?php endif; ?>

            </header>
            <nav id="main-nav" class="site-nav"></nav>
            <main id="content" class="site-content">