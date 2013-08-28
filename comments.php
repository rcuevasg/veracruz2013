<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to steady_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage rtvhome
 * @since rtvhome 1.0
 */
?>

<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'steady' ); ?></p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<div id="commentbox">
<?php if ( have_comments() ) : ?>
			<!-- STARKERS NOTE: The following h3 id is left intact so that comments can be referenced on the page -->
			<h3 id="comments-title">
				<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'steady' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?></h3>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'steady' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'steady' ) ); ?>
<?php endif; // check for comment navigation ?>

			<ol>
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use steady_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define steady_comment() and that will be used instead.
					 * See steady_comment() in steady/functions.php for more.
					 */
					wp_list_comments( array( 'callback' => 'steady_comment' ) );
				?>
			</ol>
</div>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'steady' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'steady' ) ); ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p><?php _e( 'Comments are closed.', 'steady' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php comment_form(); ?>