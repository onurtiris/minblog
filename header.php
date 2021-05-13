<!doctype html>

<html lang="en">
    
  <head>
    <script src="<?php bloginfo('template_url'); ?>/assets/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="<?php bloginfo('template_url'); ?>/assets/dist/js/bootstrap.bundle.js"></script>  
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/fontawesome/css/all.css" />
    <link href='http://fonts.googleapis.com/css?family=Muli:300italic,400italic,600italic,400,300,600,700,800&subset=latin-ext' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title( '-', true, 'right' ); ?><?php bloginfo('name'); ?></title> 
    <?php wp_head(); ?>
    
  </head>
  
  <body <?php body_class(); ?>>
      
      
    <nav class="navbar navbar-expand-md navbar-dark fixed-top topline">
    <div class="container mblank"><a href="<?php echo get_option("siteurl"); ?>" class="navbar-brand"><?php if ( get_custom_logo() ) { the_custom_logo(); } else { bloginfo(name); } ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">

    <ul class="navbar-nav ml-auto ">
    <?php wp_nav_menu( array(
    'theme_location'  => 'primary',
    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
    'container'       => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'navbarsExampleDefault',
    'menu_class'      => 'navbar-nav mr-auto',
    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
    'walker'          => new WP_Bootstrap_Navwalker(),
    ) ); ?>
    </ul>

  </div>
  
</div>
</nav>

<main role="main" class="container">

  <div class="mcontent">