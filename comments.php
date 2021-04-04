<?php

if ( post_password_required() ) {
	return;
}

if ( have_comments() ) {
	$comment_count = get_comments_number(); ?>

	<h3 class="comments-title">
		<?php if ( $comment_count === '1' ) {
			echo 'One response to ';
		} else {
			echo $comment_count . ' responses to ';
		}
		echo '&ldquo;' . get_the_title() . '&rdquo;'; ?>
	</h3>

	<?php the_comments_navigation(); ?>

	<ol class="comment-list">
		<?php wp_list_comments(
			array(
				'style'      => 'ol',
				'short_ping' => true,
			)
		); ?>
	</ol>

	<?php the_comments_navigation();
}

if ( comments_open() ) {
	comment_form();
} else { ?>
	<p class="no-comments">Comments are closed.</p>
<?php }
