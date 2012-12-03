<?php
/**
 * The template for displaying Author Archive pages.
 */

get_header(); ?>

		<div id="container" class="<?php autofocus_layout_class(); ?>">
			<div id="content" role="main">

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<section>
				<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'autofocus' ), "<span class='vcard'><a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a></span>" ); ?></h1>
			</section>

        <?php } ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts	 */
	$archive_layout = of_get_option($shortname . '_archive_layout');
	get_template_part( 'content', 'index' );

?>
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_footer(); ?>
