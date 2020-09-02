<?php
/**
 * @package bhost
 */
 
$categories_list = get_the_category_list( esc_html__( ', ', 'bhost' ) );
$tags_list = get_the_tag_list( '', esc_html__( ', ', 'bhost' ) ); 
 
?>

<article id="post-<?php the_ID(); ?>" class="single-post">
	<header class="entry-header">
		<?php if(has_post_thumbnail()){?>
			<div class="post-thumb-image">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail('post-thumb'); ?></a>
			</div><!-- .post-thumb-image -->
		<?php }?>
		
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	
		<div class="meta_area">
			<span class="single_meta"><i class="fa fa-user"></i> <?php echo bhost_author();?></span>
			<span class="single_meta"><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_time('d M , Y'));?></span>
			<span class="single_meta"><i class="fa fa-comments"></i> <?php comments_popup_link( '0 comments', '1 Comment ', '% Comments ', 'comments-link', ' 0 Comments '); ?></span>
			<?php if($categories_list){ ?><span class="single_meta"><i class="fa fa-folder"></i> <?php echo bhost_wp_kses($categories_list); ?></span><?php } ?>
			<?php if($tags_list){ ?><span class="single_meta"><i class="fa fa-tags"></i> <?php echo bhost_wp_kses($tags_list); ?></span><?php } ?>
		</div>
	
	<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bhost' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'bhost' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->