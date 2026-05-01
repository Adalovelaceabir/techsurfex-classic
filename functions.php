<?php
/**
 * TechSurfex Classic Theme Functions
 */

// Theme setup
function techsurfex_classic_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 40,
        'width'  => 150,
        'flex-height' => true,
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
    
    // Image sizes
    set_post_thumbnail_size(800, 500, true);
    add_image_size('featured-large', 800, 500, true);
    add_image_size('card-image', 400, 220, true);
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'techsurfex-classic'),
    ));
}
add_action('after_setup_theme', 'techsurfex_classic_setup');

// Enqueue scripts and styles
function techsurfex_classic_scripts() {
    wp_enqueue_style('techsurfex-classic-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_script('techsurfex-classic-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0.0', true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'techsurfex_classic_scripts');

// Register widget areas
function techsurfex_classic_widgets_init() {
    // Main sidebar
    register_sidebar(array(
        'name' => __('Main Sidebar', 'techsurfex-classic'),
        'id' => 'sidebar-main',
        'before_widget' => '<div class="sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Top banner ad
    register_sidebar(array(
        'name' => __('Top Banner Ad', 'techsurfex-classic'),
        'id' => 'ad-top-banner',
        'before_widget' => '<div class="ad-banner top-banner">',
        'after_widget' => '</div>',
        'before_title' => '<div class="hidden">',
        'after_title' => '</div>',
    ));
    // Mid content ad
    register_sidebar(array(
        'name' => __('Mid Content Ad', 'techsurfex-classic'),
        'id' => 'ad-mid-content',
        'before_widget' => '<div class="ad-banner mid-banner">',
        'after_widget' => '</div>',
        'before_title' => '<div class="hidden">',
        'after_title' => '</div>',
    ));
    // Bottom banner ad
    register_sidebar(array(
        'name' => __('Bottom Banner Ad', 'techsurfex-classic'),
        'id' => 'ad-bottom-banner',
        'before_widget' => '<div class="ad-banner bottom-banner">',
        'after_widget' => '</div>',
        'before_title' => '<div class="hidden">',
        'after_title' => '</div>',
    ));
    // Footer widgets (4 columns)
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name' => sprintf(__('Footer Column %d', 'techsurfex-classic'), $i),
            'id' => 'footer-' . $i,
            'before_widget' => '<div class="footer-widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ));
    }
}
add_action('widgets_init', 'techsurfex_classic_widgets_init');

// Breaking news ticker (latest 5 posts)
function techsurfex_breaking_ticker() {
    $breaking = new WP_Query(array(
        'posts_per_page' => 5,
        'ignore_sticky_posts' => 1,
    ));
    if ($breaking->have_posts()) {
        echo '<ul>';
        while ($breaking->have_posts()) {
            $breaking->the_post();
            echo '<li><a href="' . get_permalink() . '">🔴 ' . get_the_title() . '</a></li>';
        }
        echo '</ul>';
        wp_reset_postdata();
    } else {
        echo '<ul><li>Latest news coming soon</li></ul>';
    }
}

// Pagination for custom queries
function techsurfex_pagination($query = null) {
    global $wp_query;
    $big = 999999999;
    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $query ? $query->max_num_pages : $wp_query->max_num_pages,
        'type' => 'array',
        'prev_text' => '<i class="fas fa-angle-left"></i>',
        'next_text' => '<i class="fas fa-angle-right"></i>',
    ));
    if (is_array($pages)) {
        echo '<div class="pagination">';
        foreach ($pages as $page) {
            echo $page;
        }
        echo '</div>';
    }
}
?>
