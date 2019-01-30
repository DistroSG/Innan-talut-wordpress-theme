<!DOCTYPE html>

<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>

        <div id="page" class="site">

            <header id="masthead" class="site-header">
                <?php get_sidebar('header-right-corner'); ?>
                <h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' ); ?>

                <?php if ( $description || is_customize_preview() ) : ?>
                    <h2 id="site-description"><?php echo $description;?></h2>
                <?php endif; ?>

            </header>

            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <nav id="main-nav" class="site-nav">
                    <button id="nav-button">
							<span id="nav-icon">
								<span id="nav-icon-line-1" class="nav-icon-line"></span>
								<span id="nav-icon-line-2" class="nav-icon-line"></span>
								<span id="nav-icon-line-3" class="nav-icon-line"></span>
							</span>
                    </button>
                    <div class="content">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'depth' => 2 ) ); ?>
                    </div>
                </nav>
            <?php endif; ?> 