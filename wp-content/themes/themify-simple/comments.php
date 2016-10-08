<?php
/**
 * Template for comments
 * @package themify
 * @since 1.0.0
 */
?>

<?php themify_comment_before(); //hook ?>

<?php if ( have_comments() || comments_open() ) : ?>

<div id="comments" class="commentwrap">

	<?php themify_comment_start(); //hook ?>

	<?php if ( post_password_required() && have_comments() ) : ?>

		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'themify' ); ?></p>

	<?php elseif ( have_comments() ) : ?>

		<h4 class="comment-title"><?php comments_number(__('No Comments','themify'), __('One Comment','themify'), __('% Comments','themify') );?></h4>

		<?php // Comment Pagination
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="pagenav top clearfix">
				<?php paginate_comments_links( array('prev_text' => '&lsaquo;', 'next_text' => '&rsaquo;') );?>
			</div>
			<!-- /.pagenav -->
		<?php endif; ?>

		<ol class="commentlist">
			<?php wp_list_comments('callback=themify_theme_comment'); ?>
		</ol>

		<?php // Comment Pagination
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="pagenav bottom clearfix">
				<?php paginate_comments_links( array('prev_text' => '&lsaquo;', 'next_text' => '&rsaquo;') );?>
			</div>
			<!-- /.pagenav -->
		<?php endif; ?>

	<?php endif; // end have_comments() ?>

	<?php if ( comments_open() ) : ?>

		<?php
		global $req, $aria_req, $user_identity;
		$custom_comment_form = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author">' .
					'<label for="author">' . __( 'NAME' , 'themify' ) . '</label> ' .( $req ? '<span class="required">(' . __( 'required' , 'themify' ) . ')</span>' : '' ).
                                        '<input id="author" name="author" type="text" value="' .
					esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="required" />' .
					'</p>',
			'email'  => '<p class="comment-form-email">' .
                                        '<label for="email">' . __( 'MAIL' , 'themify' ) . '</label> ' .
					( $req ? '<span class="required">(' . __( 'required' , 'themify' ) . ')</span>' : '' ) .
					'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="required email" />' .
					'</p>',
			'url'    =>  '<p class="comment-form-url">' .
                                        '<label for="website">' . __( 'WEBSITE' , 'themify' ) . '</label> '.
					'<input id="url" name="url" type="text" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" size="30"' . $aria_req . ' />' .
					'</p>') ),
			'comment_field' =>  '<p class="comment-form-comment">' .
					'<textarea id="comment" required="required" name="comment" cols="45" rows="8" aria-required="true" class="required"></textarea>' .
					'</p>',
			'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>. <a href="%s">Log out?</a>', 'themify' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( get_the_ID() ) ) )	) . '</p>',
			'title_reply' => __( 'Leave a Reply' , 'themify' ),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'cancel_reply_link' => __( 'Cancel' , 'themify' ),
			'label_submit' => __( 'Submit  Comment' , 'themify' ),
		);
		comment_form($custom_comment_form);
		?>

	<?php endif; // end comments_open() ?>

	<?php themify_comment_end(); //hook ?>

</div>
<!-- /.commentwrap -->

<?php endif; ?>

<?php themify_comment_after(); //hook ?>