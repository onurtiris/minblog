<?php

// Include CSS
function load_stylesheets()
{
    wp_register_style('bootsrap', get_template_directory_uri() . '/assets/dist/css/bootstrap.css' , array(), false, 'all');
    wp_enqueue_style('bootsrap');

    wp_register_style('stylesheet', get_template_directory_uri() . '/style.css' , array(), false, 'all');
    wp_enqueue_style('stylesheet');
    
}

add_action('wp_enqueue_scripts','load_stylesheets');

// Theme supports
add_theme_support('post-thumbnails');
add_image_size('small', 500, 412, true);
add_theme_support('menus');
add_theme_support('widgets');

// Filter except length to 35 words
function tn_custom_excerpt_length( $length )
{
    return 15;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

//Filter the excerpt "read more" string
function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Sidebar
register_sidebar (
    array(
            'name' => 'minBlog Sidebar',
            'id' => 'page-sidebar',
            'class' => 'mright',
            'before_title' => '<div class="mright"><div class="widget-title"><h5>',
            'after_title' => '</h5></div>',
            'before_content' => '<div class="widget-content"><li>',
            'after_content' => '</li></div></div>',
        )
    
    );
    
// Top
register_sidebar (
    array(
            'name' => 'minBlog Top',
            'id' => 'minblog-top',
            'class' => '',
            'before_title' => '<div class="col-md-12 mb-4">',
            'after_title' => '',
            'before_content' => '',
            'after_content' => '</div>',
        )
    
    );
    
// Random post widget
class randomPost extends WP_Widget {
    public function __construct()
    {
        parent::__construct('widget_randompost', '*minBlog | Rastgele Yazılar',
            [
                'classname' => 'widget_randompost',
                'description' => 'Rastgele 3 yazı ekler.'
            ]);
    }
    public function form()
    {
        ?> <p>Sadece minBlog Top kısmında çalışır.</p><?php
    }
    public function widget()
    {
        include("top-random.php");
    }

}

function register_randompost_widget(){
    register_widget('randomPost');
}
add_action('widgets_init','register_randompost_widget');

// Latest post widget
class latestPost extends WP_Widget {
    public function __construct()
    {
        parent::__construct('widget_latestpost', '*minBlog | Son Yazılar',
            [
                'classname' => 'widget_latestpost',
                'description' => 'Son 3 yazıyı ekler.'
            ]);
    }
    public function form()
    {
        ?> <p>Sadece minBlog Top kısmında çalışır.</p><?php
    }
    public function widget()
    {
        include("top-category.php");
    }

}

function register_latestpost_widget(){
    register_widget('latestPost');
}
add_action('widgets_init','register_latestpost_widget');
    
    
// Register Nav Walker class_alias
require_once('class-wp-bootstrap-navwalker.php');

// Theme Support
function wpb_theme_setup(){
    // Nav Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
        
        )
    );
}

add_action('after_setup_theme', 'wpb_theme_setup');

// Custom Logo
add_theme_support( 'custom-logo', array(
	'height'      => 40,
	'width'       => 140,
	'flex-height' => false,
	'flex-width'  => false,
	'header-text' => array( 'site-title', 'site-description' ),
) );


