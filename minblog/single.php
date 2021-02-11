<?php get_header(); ?>

  <div class="row">

      <!--- Left area --->    
      <div class="col-md-8">
          
            <!--- Show thumbnail --->
            <?php if ( has_post_thumbnail() ) {
            ?> <img src="<?php the_post_thumbnail_url('small'); ?>" class="d-block w-100 mroll mb-4"> <?php
            } else { ?>
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/default-image.jpg" class="d-block w-100 mroll mb-4">
            <?php } ?>

            <!--- Post title --->
            <h2 class="card-subtitle"><?php the_title(); ?></h2>

        <!--- Loop start --->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
            <!--- Category, author and date area --->
            <div class="mb-3"></div>
            <small class="icons"><i class="far fa-folder-open"></i> <?php $category = get_the_category(); if ( $category[0] ) { echo '<a href="' . get_category_link( $category[0]->term_id ) . '">' . $category[0]->cat_name . '</a>'; } ?></small>
            <small class="icons"><i class="far fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>"><?php the_author(); ?></a></small>
            <small class="icons"><i class="far fa-clock"></i> <?php echo get_the_date(); ?></small>
            <div class="mb-2"></div>
            
            <!--- Content --->
             <div class="card-text"> <p><?php the_content(); endwhile; endif; ?></p></div>
        
        
            <!--- Tags --->
            <small class="tags pr-2 mb-4"><?php          $tags = wp_get_post_tags($post->ID);
             foreach ($tags as $t => $tag) {
                 ?>#<?php
                 echo '<a href="' . get_tag_link($tag->term_id) . '">';
                 echo $tag->name; ?> <?php
                 echo '</a>';
             } ?></small>
         
            <hr class="alt-hr"/>

            <!--- Comments --->
            <?php comments_template(); ?>

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