<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header">
    <div class="container">
        <div class="logo">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo home_url('/'); ?>" class="site-title"><?php bloginfo('name'); ?></a>
            <?php endif; ?>
        </div>

        <?php if (is_active_sidebar('ad-top-banner')) : ?>
            <?php dynamic_sidebar('ad-top-banner'); ?>
        <?php else : ?>
            <div class="ad-banner top-banner">
                <div class="ad-placeholder">Advertisement 728x90</div>
            </div>
        <?php endif; ?>

        <nav class="main-nav">
            <button class="mobile-menu-btn" id="mobileMenuToggle"><i class="fas fa-bars"></i></button>
            <?php wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'navMenuList',
                'container' => false,
                'fallback_cb' => false,
            )); ?>
        </nav>
    </div>
</header>

<div class="breaking-news">
    <div class="container">
        <span class="breaking-label">Breaking:</span>
        <div class="ticker">
            <?php techsurfex_breaking_ticker(); ?>
        </div>
    </div>
</div>
