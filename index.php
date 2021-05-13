<?php get_header(); ?>

  <div class="row">
      
      <!--- Dynamic top --->
      <?php dynamic_sidebar('minblog-top'); ?>
      
      <!--- Left area --->    
      <div class="col-md-8">

        <!--- Loop start --->
        <?php if (have_posts()) : while (have_posts()) : the_post() ?>
        
          <!--- Content area --->
          <div class="row no-gutters mb-3">
            <!--- Show thumbnail --->
            <div class="col-md-4">
                <?php if ( has_post_thumbnail() ) {
        ?> <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('small'); ?>" class="card-img fadein" alt="..."></a> <?php
        } else { ?>
        <!---<img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" /> --->
        <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" class="card-img fadein" alt="..."></a>
        <?php } ?>
            <!--  <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('small'); ?>" class="card-img" alt="..."></a> -->
            </div>
            <!--- Content info --->
            <div class="col-md-8">
              <div class="card-body">
                <!--- Content title --->
                <h5 class="card-subtitle"><?php echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>'; ?></h5>
                <!--- Content category --->
                <p class="card-text"><small class="category-text"><i class="far fa-folder-open"></i> <?php $category = get_the_category(); if ( $category[0] ) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>'; } ?></small></p>
                <!--- Content summary --->
                <p class="card-text"><?php the_excerpt(); ?></p>
                <!--- Read more --->
                <span class="card-text"><a href="<?php the_permalink(); ?>">Devamını oku</a></span>
                
              </div>
            </div>
          </div>

        <!--- Loop end --->
        <?php endwhile; endif; ?>
    
        <!--- Previous and next link -->
        <div class="mprevious"><?php previous_posts_link(); ?></div>
        <div class="mnext"><?php next_posts_link(); ?></div>

      </div>

      <!--- Sidebar --->
      <div class="col-md-4">
        <div class="mright">
            <?php dynamic_sidebar('page-sidebar'); ?>
        </div>
      </div>
  
      </div>

  </div>

  </div>

<?php get_footer(); ?>