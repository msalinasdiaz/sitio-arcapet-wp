<?php
/**
 * @package bhost
 */
 
$categories_list = get_the_category_list( esc_html__( ', ', 'bhost' ) );
$tags_list = get_the_tag_list( '', esc_html__( ', ', 'bhost' ) ); 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	
		<div class="meta_area">
			<span class="single_meta"><i class="fa fa-user"></i> <?php echo bhost_author();?></span>
			<span class="single_meta"><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_time('d M , Y'));?></span>
			<span class="single_meta"><i class="fa fa-comments"></i> <?php comments_popup_link( '0 comments', '1 Comment ', '% Comments ', 'comments-link', ' 0 Comments '); ?></span>
			<?php if($categories_list){ ?><span class="single_meta"><i class="fa fa-folder"></i> <?php echo bhost_wp_kses($categories_list); ?></span><?php } ?>
			<?php if($tags_list){ ?><span class="single_meta"><i class="fa fa-tags"></i> <?php echo bhost_wp_kses($tags_list); ?></span><?php } ?>
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

</article><!-- #post-## -->

<!-- About the Author -->
<div class="about-author">
	<div class="author_image">
		<?php echo get_avatar( get_the_author_meta('email') , 120 ); ?>
	</div>
	<div class="author_info">
		<h4><?php printf(__('Written By' , 'bhost')); ?> <?php the_author(); ?></h4>
		<p><?php echo get_the_author_meta('description');?></p>		
	</div>
</div>