<!--- Top content --->
<div class="col-md-12 mb-4">
    
    <!--- Query random posts --->
    <?php
    $the_query = new WP_Query( array(
	'post_type'      => 'post',
	'orderby'        => 'rand',
	'posts_per_page' => 3,
    ) ); ?>
    <?php

    // If we have posts lets show them
    if ( $the_query->have_posts() ) : ?>
    
    <div class="row">
        
    <!--- Loop through the posts --->
    <?php while ( $the_query->have_posts() ) : $the_query->the_post();  ?>
    
    <div class="col-md-4 mb-3"><a class="best-link-o" href="<?php the_permalink(); ?>">
    <div class="card border-0 text-white fadein dark-purple">
    
    <!--- Show thumbnail --->
    <?php if ( has_post_thumbnail() ) {
    ?><img src="<?php the_post_thumbnail_url('small'); ?>" class="card-img top-effect"><?php
    } else { ?>
    <!---<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" /> --->
    <img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" class="card-img top-effect">
    <?php } ?>
    <!--  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('small'); ?>" class="card-img" alt="..."></a> -->
    
    <div class="card-img-overlay d-flex">
    <h5 class="card-title  d-flex align-items-center"><?php the_title(); ?></h5>
    </div>
    </div>
    </a>
    </div>
    
    <!--- End while --->
    <?php endwhile; ?>
    </div>
    
    <!--- Reset data --->
    <?php wp_reset_postdata(); ?>
    
    <!--- End if --->
    <?php endif; ?>
  
</div>