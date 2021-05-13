<!--- Top content --->
<div class="col-md-12 mb-4">
<div class="row">
<?php $CatPosts = new WP_Query("showposts=3"); while($CatPosts->have_posts()) : $CatPosts->the_post();?>
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
<?php endwhile; ?>

</div>
</div>