<?php get_header(); ?>

  <div class="row">

      <!--- Left area --->   
      <div class="col-md-8">

            <!--- Show thumbnail --->
            <?php if ( has_post_thumbnail() ) {
            ?> <img src="<?php the_post_thumbnail_url('small'); ?>" class="d-block w-100 mroll mb-4"> <?php
            } else { } ?>

            <!--- Post title --->
            <h2 class="card-subtitle"><?php the_title(); ?></h2>
        
            <!--- Loop start and content --->
            <div class="card-text"><p><?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif; ?></p></div>
        
            <!--- Comments --->
            <?php comments_template(); ?>

     
      </div>

      <!--- Sidebar -->
      <div class="col-md-4">
        <div class="mright">
            <?php dynamic_sidebar('page-sidebar'); ?>
        </div>
      </div>
  
      </div>

  </div>

  </div>

<?php get_footer(); ?>