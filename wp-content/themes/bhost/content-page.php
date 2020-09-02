<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package bhost
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
		<div class="meta_area">
			<span class="single_meta"><i class="fa fa-user"></i> <?php echo bhost_author();?></span>
			<span class="single_meta"><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_time('d M , Y'));?></span>
			
		</div>
		
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bhost' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'bhost' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
