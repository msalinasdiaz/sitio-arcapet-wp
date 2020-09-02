<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package bhost
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area col-md-12 text-center">
			<div id="main" class="site-main" role="main">

				<section class="error-404 not-found ">
					<header class="page-header">
						<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'bhost' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'It looks like nothing was found at this location. Try again Thanks.', 'bhost' ); ?></p>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
				
				<div class="col-sm-6 center-block">
					<?php get_search_form();?>
				</div>

				<a class="border_btn" href="<?php echo esc_url(home_url('/'));?>"><?php esc_html_e('Back To Home' , 'bhost');?></a>
				
			</div><!-- #main -->
		</div><!-- #primary -->
	</div><!-- row -->
</div><!-- container -->
<?php get_footer(); ?>
