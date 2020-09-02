<?php
/*
Template Name: Full Width Template
*/

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<div id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
