<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<?php 
	if ( have_comments() ) : 
?>
							
        <h4 class="uppercase"><?php comments_popup_link(__(' 0 Comments','tourpacker'),__(' 1 Comments','tourpacker'),__(' % Comments','tourpacker')); ?></h4>
        <div id="comment-wrapper">
		    <ul class="comment-item">
			    <?php wp_list_comments('callback=tourpacker_theme_comment'); ?>
            </ul><!-- .comment-list -->
		<!--End comments and replys-->
		<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
			<nav class="navigation comment-navigation" role="navigation">
			   
				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'tourpacker' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'tourpacker' ) ); ?></div>
			</nav>
			<!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.' , 'tourpacker' ); ?></p>
		<?php endif; ?>	
		</div><!-- End Comment -->

<?php endif; ?>
<!-- //COMMENTS -->
<!-- LEAVE A COMMENT -->
<div id="leave-comment">
<?php
if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $comment_args = array(
            'id_form' => 'contactForm',
            'class_form'    =>  'comment-form',                                
            'title_reply'=> '<h3 class="uppercase">'.esc_html__('Leave a Comment','tourpacker').'</h3>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author' => '<div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="comment-name">'.esc_html__('Your Name','tourpacker').' <span class="text-danger">*</span></label>
                                        <input type="text" name="author" class="form-control" id="name comment-name" >
                                    </div>
                                </div>',   
                'email' => '    <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="comment-email">'.esc_html__('Your Email','tourpacker').' <span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control" id="email comment-email" >
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>'
            ) ),                                
            'comment_field' => '<div class="row">
                                    <div class="col-md-12 mb-30">
                                        <div class="form-group">
                                            <label for="comment-message">'.esc_html__('Message','tourpacker').' <span class="text-danger">*</span></label>
                                            <textarea name="comment"'.$aria_req.' id="comment-message" class="form-control" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>',  
            'label_submit' => 'COMMENT',
            'class_submit' => 'btn btn-primary',
            'comment_notes_before' => '',
            'comment_notes_after' => '',               
    )
?>
<?php comment_form($comment_args); ?>
</div>
