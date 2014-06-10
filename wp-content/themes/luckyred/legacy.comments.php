<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage luckyred
 * @since luckyred 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<?php
if ( function_exists('wp_list_comments') ) :
// new comments.php stuff
else :
// old comments.php stuff
endif;
?>

<?php
if ( post_password_required() ) {
	echo '<p class="nocomments">This post is password protected. Enter the password to view comments.</p>';
	return;
}
?>

<?php
if ( have_comments() ) : ?>
<h4 id="comments"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h4>
<ul class="commentlist">
	<?php wp_list_comments(); ?></ul>
<div class="navigation">
<div class="alignleft"><?php previous_comments_link() ?></div>
<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) :
		// If comments are open, but there are no comments.
	else : // comments are closed
	endif;
endif;
?>