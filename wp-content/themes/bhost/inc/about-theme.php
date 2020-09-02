<?php
/**
 * bhost about theme
 *
 * @package bhost about theme
 */
 
//about theme info
add_action( 'admin_menu', 'bhost_abouttheme' );
function bhost_abouttheme() {    	
	add_theme_page( __('About Theme', 'bhost'), __('About Theme', 'bhost'), 'edit_theme_options', 'bhost_theme_guide', 'bhost_theme_mostrar_guide');   
} 

//guidline for about theme
function bhost_theme_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_html_e('About Theme Info', 'bhost'); ?>
		   </div>
          <p><?php esc_html_e('BHOST PRO is a Responsive WordPress Theme with a clean, flat and modern design. BHOST PRO has a clean design focused on high-level content organization. It\'s easy to navigate and promotes a feeling of user satisfaction. You can be comfortable to choose the best one for your site.','bhost'); ?></p>
		  <a href="<?php echo BHOST_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo BHOST_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'bhost'); ?></a> | 
				<a href="<?php echo BHOST_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro Version', 'bhost'); ?></a> 
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo BHOST_PRO_THEME_URL; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>	
			
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>