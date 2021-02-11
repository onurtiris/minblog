<?php if($comments) : ?> 

    <!--- Comments title --->
    <h5 class="card-subtitle mb-4 mt-4"><i class="fas fa-comments orange"></i> Yorumlar</h5>
    <ol class="comments">  
    
    <!--- Comments loop --->
    <?php foreach($comments as $comment) : ?>  
    
    <!--- Comment area --->
    <div class="media">
    <!--- Commenter image --->
    <div class="mr-3"><?php echo get_avatar(get_comment_author_email(), 48, $default = ''); ?></div>
      <div class="media-body">
        <!--- Commenter info --->
        <h7 class="mt-0 card-subtitle"><?php comment_author_link(); ?></h7>
        <p class="card-text"><small class="category-text"><?php comment_date(); ?></small></p>
      </div>
    </div>
    <!--- Comment --->
    <div class="mt-n2 pl-1"><p><?php comment_text(); ?></p></div>
    
    <!--- Comment confirmation --->
    <li id="comment-<?php comment_ID(); ?>" class="ml-0">  <?php if ($comment->user_id == 1) echo "";?>
        <?php if ($comment->comment_approved == '0') : ?>  
            <small><b><i class="fas fa-clock"></i> Yorumunuz onay bekliyor.</b></small>  
        <?php endif; ?>  
    </li>  
    <hr class="alt-hr" />
    <?php endforeach; ?>  
    </ol>  
    
<?php endif; ?> 

<?php if(comments_open()) : ?>
    <!--- New comment area --->
	<h5 class="card-subtitle mb-4 mt-4"><i class="fas fa-edit orange"></i> Bir yorum bırak</h5>
    <?php if(get_option('comment_registration') && !$user_ID) : ?>  
        <p>Öncelikle <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">giriş yapmalısınız</a> yorum atabilmek için.</p><?php else : ?>  
        <form class="mb-5" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">  
            <?php if($user_ID) : ?>  
                <p>Giriş yapıldı: <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Çıkış yap &raquo;</a></p>  
            <?php else : ?>  
               
                    
            <form>
                <div class="form-group">
                <label for="author">İsim<?php if($req) echo " (gerekli)"; ?></label>
                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="form-control"></div>
                
                <div class="form-group">
                <label for="email">Email<?php if($req) echo " (gerekli)"; ?></label>
                <input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="form-control" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Mail adresiniz kimseyle paylaşılmayacaktır.</small></div>
                
                <div class="form-group">
                <label for="url">Website</label>
                <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" class="form-control"></div>

                </row>
            <?php endif; ?>  
            <div class="form-group">
                <label for="url">Yorumunuz</label>
                <textarea class="form-control" id="comment" name="comment" tabindex="4" rows="3"></textarea>   
                </div>
            
            
            <?php //show_subscription_checkbox(); ?>
            
<div class="form-group">
                <input name="submit" class="btn btn-dark rounded-pill pl-4 pr-4" type="submit" id="submit" tabindex="5" value="Yorumu Gönder" />  
                <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /> 
                </div>
            
            </form>
            <?php do_action('comment_form', $post->ID); ?>  
        </form>  
    <?php endif; ?>  
<?php else : ?>  
    <!--- <p>Yorumlar kapalıdır.</p>  --->
<?php endif; ?>