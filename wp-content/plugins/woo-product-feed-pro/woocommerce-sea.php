<?php
/**
 * Plugin Name: Product Feed PRO for WooCommerce
 * Version:     8.6.4
 * Plugin URI:  https://www.adtribes.io/support/?utm_source=wpadmin&utm_medium=plugin&utm_campaign=woosea_product_feed_pro
 * Description: Configure and maintain your WooCommerce product feeds for Google Shopping, Facebook, Remarketing, Bing, Yandex, Comparison shopping websites and over a 100 channels more.
 * Author:      AdTribes.io
 * Plugin URI:  https://wwww.adtribes.io/pro-vs-elite/
 * Author URI:  https://www.adtribes.io
 * Developer:   Joris Verwater, Eva van Gelooven
 * License:     GPL3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires at least: 4.5
 * Tested up to: 5.5
 *
 * Text Domain: woo-product-feed-pro
 * Domain Path: /languages
 *
 * WC requires at least: 3.6
 * WC tested up to: 4.3
 *
 * Product Feed PRO for WooCommerce is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * Product Feed PRO for WooCommerce is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Product Feed PRO for WooCommerce. If not, see <http://www.gnu.org/licenses/>.
 */

/** 
 * If this file is called directly, abort.
 */
if (!defined('WPINC')) {
    die;
}

if (!defined('ABSPATH')) {
   exit;
}

/**
 * Plugin versionnumber, please do not override.
 * Define some constants
 */
define( 'WOOCOMMERCESEA_PLUGIN_VERSION', '8.6.4' );
define( 'WOOCOMMERCESEA_PLUGIN_NAME', 'woocommerce-product-feed-pro' );
define( 'WOOCOMMERCESEA_PLUGIN_NAME_SHORT', 'woo-product-feed-pro' );

if ( ! defined( 'WOOCOMMERCESEA_FILE' ) ) {
        define( 'WOOCOMMERCESEA_FILE', __FILE__ );
}

if ( ! defined( 'WOOCOMMERCESEA_PATH' ) ) {
        define( 'WOOCOMMERCESEA_PATH', plugin_dir_path( WOOCOMMERCESEA_FILE ) );
}

if ( ! defined( 'WOOCOMMERCESEA_BASENAME' ) ) {
        define( 'WOOCOMMERCESEA_BASENAME', plugin_basename( WOOCOMMERCESEA_FILE ) );
}

if ( ! defined( 'WOOCOMMERCESEA_PLUGIN_URL' ) ) { 
	define( 'WOOCOMMERCESEA_PLUGIN_URL', plugins_url() . '/' . WOOCOMMERCESEA_PLUGIN_NAME_SHORT ); 
}

/**
 * Enqueue css assets
 */
function woosea_styles() {
        wp_register_style( 'woosea_admin-css', plugins_url( '/css/woosea_admin.css', __FILE__ ), '',WOOCOMMERCESEA_PLUGIN_VERSION );
        wp_enqueue_style( 'woosea_admin-css' );

        wp_register_style( 'woosea_jquery_ui-css', plugins_url( '/css/jquery-ui.css', __FILE__ ), '',WOOCOMMERCESEA_PLUGIN_VERSION );
        wp_enqueue_style( 'woosea_jquery_ui-css' );

        wp_register_style( 'woosea_jquery_typeahead-css', plugins_url( '/css/jquery.typeahead.css', __FILE__ ), '',WOOCOMMERCESEA_PLUGIN_VERSION );
        wp_enqueue_style( 'woosea_jquery_typeahead-css' );
}
add_action( 'admin_enqueue_scripts' , 'woosea_styles' );

/**
 * Enqueue js assets admin pages
 */
function woosea_scripts($hook) {
	// Enqueue Jquery
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-dialog');
	wp_enqueue_script('jquery-ui-calender');
	wp_enqueue_script('jquery-ui-datepicker');

	// Only register and enqueue JS scripts from within the plugin itself
     	if (preg_match("/product-feed-pro/i",$hook)){
	        // JS files for ChartJS
        	wp_register_script( 'woosea_chart-bundle-js', plugin_dir_url( __FILE__ ) . 'js/Chart.bundle.js', WOOCOMMERCESEA_PLUGIN_VERSION, true  );
        	wp_enqueue_script( 'woosea_chart-bundle-js' );

        	// Minimized JS files for ChartJS
        	wp_register_script( 'woosea_chart-bundle-min-js', plugin_dir_url( __FILE__ ) . 'js/Chart.bundle.min.js', WOOCOMMERCESEA_PLUGIN_VERSION, true  );
        	wp_enqueue_script( 'woosea_chart-bundle-min-js' );	

		// Bootstrap typeahead
		wp_register_script( 'typeahead-js', plugin_dir_url( __FILE__ ) . 'js/typeahead.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'typeahead-js' );

		// JS for adding input field validation
		wp_register_script( 'woosea_validation-js', plugin_dir_url( __FILE__ ) . 'js/woosea_validation.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'woosea_validation-js' );

		// JS for autocomplete
		wp_register_script( 'woosea_autocomplete-js', plugin_dir_url( __FILE__ ) . 'js/woosea_autocomplete.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'woosea_autocomplete-js' );

		// JS for adding table rows to the rules page
		wp_register_script( 'woosea_rules-js', plugin_dir_url( __FILE__ ) . 'js/woosea_rules.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'woosea_rules-js' );

		// JS for adding table rows to the field mappings page
		wp_register_script( 'woosea_field_mapping-js', plugin_dir_url( __FILE__ ) . 'js/woosea_field_mapping.js', '', WOOCOMMERCESEA_PLUGIN_VERSION, true );
		wp_enqueue_script( 'woosea_field_mapping-js' );

		// JS for getting channels
		wp_register_script( 'woosea_channel-js', plugin_dir_url( __FILE__ ) . 'js/woosea_channel.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'woosea_channel-js' );
	
		// JS for managing keys
		wp_register_script( 'woosea_key-js', plugin_dir_url( __FILE__ ) . 'js/woosea_key.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
		wp_enqueue_script( 'woosea_key-js' );

	}
	// JS for manage projects page
	wp_register_script( 'woosea_manage-js', plugin_dir_url( __FILE__ ) . 'js/woosea_manage.js', '',WOOCOMMERCESEA_PLUGIN_VERSION, true  );
	wp_enqueue_script( 'woosea_manage-js' );
}
add_action( 'admin_enqueue_scripts' , 'woosea_scripts' );

/**
 * Enqueue js assets front pages
 */
function woosea_front_scripts() {
        $add_facebook_pixel = get_option ('add_facebook_pixel');

        if($add_facebook_pixel == "yes"){
		// JS for manage projects page
 		wp_enqueue_script( 'woosea_add_cart-js', plugin_dir_url( __FILE__ ) . 'js/woosea_add_cart.js', array('jquery'), true );

		//passing variables to the javascript file
		wp_localize_script('woosea_add_cart-js', 'frontEndAjax', array(
 			'ajaxurl' => admin_url( 'admin-ajax.php' ),
 			'nonce' => wp_create_nonce('woosea_ajax_nonce')
 		));
	}

	// Always register orders conversion tracking
 	// wp_enqueue_script( 'woosea_tracking-js', plugin_dir_url( __FILE__ ) . 'js/woosea_tracking.js', array('jquery'), true );
	
	//passing variables to the javascript file
	// wp_localize_script('woosea_tracking-js', 'frontEndAjax', array(
 	//	'ajaxurl' => admin_url( 'admin-ajax.php' ),
 	//	'nonce' => wp_create_nonce('woosea_ajax_nonce')
 	//));
}
add_action( 'wp_enqueue_scripts' , 'woosea_front_scripts' );

/**
 * Get product variation ID based on dropdown selects product page
 */
function woosea_storedattributes_details(){ 
  	//checking the nonce. will die if it is no good.
   	check_ajax_referer('woosea_ajax_nonce', 'nonce');
	if(isset($_POST['data_to_pass'])){
        	$productId = sanitize_text_field($_POST['data_to_pass']);

		// Remove previous drop-down selection
		delete_option( 'selected_values' );

		// Good idea to make sure things are set before using them
		$selected_values = isset( $_POST['storedAttributes'] ) ? (array) $_POST['storedAttributes'] : array();

		// Any of the WordPress data sanitization functions can be used here
		$selected_values = array_map( 'esc_attr', $selected_values );
      	
		// Save drop-down selection
		update_option( 'selected_values', $selected_values);
	}
}
add_action( 'wp_ajax_nopriv_woosea_storedattributes_details', 'woosea_storedattributes_details' );
add_action( 'wp_ajax_woosea_storedattributes_details', 'woosea_storedattributes_details' );

/**
 * Get details to load in the Facebook AddToCart event (pixel)
 */
function woosea_addtocart_details(){ 
  	//checking the nonce. will die if it is no good.
   	check_ajax_referer('woosea_ajax_nonce', 'nonce');
        $productId = sanitize_text_field($_POST['data_to_pass']);
	$variationId = 0;

	if(!empty ($productId) ){
		$product = wc_get_product( $productId );
		$selected_values = get_option('selected_values');
		unset($selected_values['productId']);
		$_GET = $selected_values;
                $variation_id = woosea_find_matching_product_variation( $product, $_GET );
		if($variation_id > 0){
			$productId = $variation_id;
		}       
		$nr_get = count($_GET);
		$product_name = $product->get_name();
		$product_type = $product->get_type();
		$product_price = $product->get_price();
		$product_regular_price = $product->get_regular_price();
		$product_sale_price = $product->get_sale_price();
		$product_sku = $product->get_sku();
	        $currency = get_woocommerce_currency();

             	$cats = "";
              	$all_cats = get_the_terms( $productId, 'product_cat' );
		if(!empty($all_cats)){
	             	foreach ($all_cats as $key => $category) {
        	        	$cats .= $category->name.",";
              		}
                }
     
               	// strip last comma
              	$cats = rtrim($cats, ",");
             	$cats = str_replace("&amp;","&", $cats);

        	$data = array (
 			'product_id'		=> $productId,
	               	'product_name' 		=> $product_name,
                	'product_type' 		=> $product_type,
			'product_price'		=> $product_price,
			'product_regular_price'	=> $product_regular_price,
			'product_sale_price'	=> $product_sale_price,
			'product_sku'		=> $product_sku,
			'product_currency'	=> $currency,
			'product_cats'		=> $cats
        	);

        	echo json_encode($data);
        	wp_die();
	}
}
add_action( 'wp_ajax_nopriv_woosea_addtocart_details', 'woosea_addtocart_details' );
add_action( 'wp_ajax_woosea_addtocart_details', 'woosea_addtocart_details' );

/**
 * Internationalisation of plugin
 */
function woosea_load_plugin_textdomain() {
	load_plugin_textdomain( 'woosea', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'woosea_load_plugin_textdomain' );

/**
 * Required classes
 */
require plugin_dir_path(__FILE__) . 'classes/class-admin-pages-template.php';
require plugin_dir_path(__FILE__) . 'classes/class-cron.php';
require plugin_dir_path(__FILE__) . 'classes/class-get-products.php';
require plugin_dir_path(__FILE__) . 'classes/class-admin-notifications.php';
require plugin_dir_path(__FILE__) . 'classes/class-update-channel.php';
require plugin_dir_path(__FILE__) . 'classes/class-attributes.php';
require plugin_dir_path(__FILE__) . 'classes/class-google-remarketing.php';

/**
 * Add links to the plugin page
 */
function woosea_plugin_action_links($links, $file) {
	static $this_plugin;
 
    	if (!$this_plugin) {
        	$this_plugin = plugin_basename(__FILE__);
    	}
 
    	// check to make sure we are on the correct plugin
    	if ($file == $this_plugin) {
		// link to what ever you want
		$host = $_SERVER['HTTP_HOST'];
        	$plugin_links[] = '<a href="https://adtribes.io/support/?utm_source='.$host.'&utm_medium=pluginpage&utm_campaign=support" target="_blank">Support</a>';
        	$plugin_links[] = '<a href="https://adtribes.io/tutorials/?utm_source='.$host.'&utm_medium=pluginpage&utm_campaign=tutorials" target="_blank">Tutorials</a>';
        	$plugin_links[] = '<a href="https://adtribes.io/pro-vs-elite/?utm_source='.$host.'&utm_medium=pluginpage&utm_campaign=go elite" target="_blank" style="color:green;"><b>Go Elite</b></a>';
        	$plugin_links[] = '<a href="https://adtribes.io/pro-vs-elite/?utm_source='.$host.'&utm_medium=pluginpage&utm_campaign=premium support" target="_blank">Premium Support</a>';

        	// add the links to the list of links already there
		foreach($plugin_links as $link) {
			array_unshift($links, $link);
		}
    	}
    	return $links;
}
add_filter('plugin_action_links', 'woosea_plugin_action_links', 10, 2);


/**
 * Get category path for Facebook pixel
 */
function woosea_get_term_parents( $id, $taxonomy, $link = false, $project_taxonomy, $nicename = false, $visited = array() ) {
	// Only add Home to the beginning of the chain when we start buildin the chain
    	if(empty($visited)){
        	$chain = 'Home';
      	} else {
           	$chain = '';
     	}

   	$parent = get_term( $id, $taxonomy );
    	$separator = ' > ';

      	if ( is_wp_error( $parent ) )
       		return $parent;

    	if($parent){
        	if ($nicename){
                	$name = $parent->slug;
            	} else {
                   	$name = $parent->name;
            	}

         	if ($parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited, TRUE )){
               		$visited[] = $parent->parent;
               		$chain .= woosea_get_term_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
          	}

          	if ($link){
                	$chain .= $separator.$name;
            	} else {
                	$chain .= $separator.$name;
          	}
   	}
   	return $chain;
}


/**
 * Add Facebook pixel 
 */
function woosea_add_facebook_pixel( $product = null ){
        if ( ! is_object( $product ) ) {
                global $product;
        }
	$fb_pagetype = WooSEA_Google_Remarketing::woosea_google_remarketing_pagetype();
   	$add_facebook_pixel = get_option ('add_facebook_pixel');
	$currency = get_woocommerce_currency();     

	if($add_facebook_pixel == "yes"){	
        	$facebook_pixel_id = get_option("woosea_facebook_pixel_id");

		if($facebook_pixel_id > 0){
			if ($fb_pagetype == "product"){
                		if ( '' !== $product->get_price()) {
                
		 			$fb_prodid = get_the_id();
					$product_name = $product->get_name();
					$cats = "";
					$all_cats = get_the_terms( $fb_prodid, 'product_cat' );
					if(!empty($all_cats)){
				        	foreach ($all_cats as $key => $category) {
							$cats .= $category->name.",";
						}
					}
					// strip last comma
					$cats = rtrim($cats, ",");
					$cats = str_replace("&amp;","&", $cats);

					if(!empty($fb_prodid)){

                                        	if(!$product) {
                                                	return -1;
                                        	}

						if ( $product->is_type( 'variable' ) ) {
							// We should first check if there are any _GET parameters available
							// When there are not we are on a variable product page but not on a specific variable one
							// In that case we need to put in the AggregateOffer structured data
							$variation_id = woosea_find_matching_product_variation( $product, $_GET );

							$nr_get = count($_GET);

							// This is a variant product	
							if(($nr_get > 0) AND ($variation_id > 0)){
								$variable_product = wc_get_product($variation_id);
								// for variants use the variation_id and not the item_group_id
								// otherwise Google will disapprove the items due to itemID mismatches
								$fb_prodid = $variation_id;					
	
								if(is_object( $variable_product ) ) {
									$product_price = $variable_product->get_price();
									$fb_price = $product_price;
								} else {
									// AggregateOffer
       	       						 	   	$prices  = $product->get_variation_prices();
       	       		 			     			$lowest  = reset( $prices['price'] );
               	        				 		$highest = end( $prices['price'] );

                 			  			     	if ( $lowest === $highest ) {
                        				     	  		$fb_price = wc_format_decimal( $lowest, wc_get_price_decimals() );
                               					 	} else {
                        			       	 			$fb_lowprice  = wc_format_decimal( $lowest, wc_get_price_decimals() );
                        				        		$fb_highprice = wc_format_decimal( $highest, wc_get_price_decimals() );
										$fb_price = $fb_lowprice;
									}
								}
								$viewContent = "fbq(\"track\",\"ViewContent\",{content_category:\"$cats\", content_name:\"$product_name\", content_type:\"product\", content_ids:[\"$fb_prodid\"], value:\"$fb_price\", currency:\"$currency\"});";
							} else {
								// This is a parent variable product
								// Since these are not allowed in the feed, at the variations product ID's
								// Get children product variation IDs in an array
								$woosea_content_ids = "variation";
								$woosea_content_ids = get_option( 'add_facebook_pixel_content_ids' );

								if($woosea_content_ids == "variation"){
									$children_ids = $product->get_children();
									$content = "";	
                                					foreach ($children_ids as $id){
										$content .= '\''.$id.'\',';
                                        					//$content .= $id.',';
                                					}
								} else {
									$content = '\''.$fb_prodid.'\'';
								}

                                                		$content = rtrim($content, ",");
                       		 				$prices  = $product->get_variation_prices();
	               	 					$lowest  = reset( $prices['price'] );
                      						$highest = end( $prices['price'] );

         	          	  	 		 	if ( $lowest === $highest ) {
                	       			 			$fb_price = wc_format_decimal( $lowest, wc_get_price_decimals());
                     		 				} else {
                       		 					$fb_lowprice = wc_format_decimal( $lowest, wc_get_price_decimals() );
                        			       		 	$fb_highprice = wc_format_decimal( $highest, wc_get_price_decimals() );
									$fb_price = $fb_lowprice;
								}
								$viewContent = "fbq(\"track\",\"ViewContent\",{content_category:\"$cats\", content_name:\"$product_name\", content_type:\"product_group\", content_ids:[$content], value:\"$fb_price\", currency:\"$currency\"});";
							}
						} else {
							// This is a simple product page
        						$fb_price = wc_format_decimal( $product->get_price(), wc_get_price_decimals() );
							$viewContent = "fbq(\"track\",\"ViewContent\",{content_category:\"$cats\", content_name:\"$product_name\", content_type:\"product\", content_ids:[\"$fb_prodid\"], value:\"$fb_price\", currency:\"$currency\"});";
						}
					}
				}
			} elseif ($fb_pagetype == "cart"){
				// This is on the order thank you page
  				if( isset( $_GET['key'] ) && is_wc_endpoint_url( 'order-received' ) ) {
                			$order_string = sanitize_text_field($_GET['key']);
					if(!empty($order_string)){
						$order_id = wc_get_order_id_by_order_key( $order_string );
						$order = wc_get_order( $order_id );
						$order_items = $order->get_items();
						$currency = get_woocommerce_currency();
						$order_real = 0;
						$contents = "";

						if ( !is_wp_error( $order_items )) {
							foreach( $order_items as $item_id => $order_item) {
								$prod_id = $order_item->get_product_id();
								$variation_id = $order_item->get_variation_id();
								if($variation_id > 0){
									$prod_id = $variation_id;
								}

								$prod_quantity = $order_item->get_quantity();
								$order_total = $order_item->get_total();
								$order_subtotal = $order_item->get_subtotal();
								$order_subtotal_tax= $order_item->get_subtotal_tax();
								$order_real = number_format(($order_subtotal+$order_subtotal_tax),2)+$order_real;
								$contents .= "{'id': '$prod_id', 'quantity': $prod_quantity},";												
							}
						}
						$contents = rtrim($contents, ",");
						$viewContent = "fbq('track','Purchase',{currency:'$currency', value:'$order_real', content_type:'product', contents:[$contents]});";
					}
				} else {
					// This is on the cart page itself
					$currency = get_woocommerce_currency();
					$cart_items = WC()->cart->get_cart();
					$cart_real = 0;
					$contents = "";

					$checkoutpage = wc_get_checkout_url();
					$current_url = get_permalink(get_the_ID()); 

					if(!empty($cart_items)){
						if( !is_wp_error( $cart_items )) {
							foreach( $cart_items as $cart_id => $cart_item) {
								$prod_id = $cart_item['product_id'];
								if($cart_item['variation_id'] > 0){
									$prod_id = $cart_item['variation_id'];
								}
								$contents .= '\''.$prod_id.'\',';
								//$contents .= "$prod_id,";												
								$line_total = $cart_item['line_total'];
								$line_tax = $cart_item['line_tax'];
								$cart_real = number_format(($line_total+$line_tax),2)+$cart_real;
						
							}
							$contents = rtrim($contents, ",");

							// User is on the billing pages
							if($checkoutpage == $current_url){
								$viewContent = "fbq(\"track\",\"InitiateCheckout\",{currency:\"$currency\", value:\"$cart_real\", content_type:\"product\", content_ids:[$contents]});";
							} else {
								// User is on the basket page
								$viewContent = "fbq(\"track\",\"AddToCart\",{currency:\"$currency\", value:\"$cart_real\", content_type:\"product\", content_ids:[$contents]});";
							}
						}
					}
				}
			} elseif ($fb_pagetype == "category"){
				$term = get_queried_object();

				global $wp_query;
				$ids = wp_list_pluck( $wp_query->posts, "ID" );
				$fb_prodid = "";

				foreach ($ids as $id){
					$_product = wc_get_product($id);
					if(!$_product) {
						return -1;
					}

					if($_product->is_type('simple')){
						// Add the simple product ID
 						$fb_prodid .= '\''.$id.'\',';
					} else {
						// This is a variable product, add variation product ID's
						$children_ids = $_product->get_children();
                                		foreach ($children_ids as $id){

 						$fb_prodid .= '\''.$id.'\',';
 							$fb_prodid .= '\''.$id.'\',';
                                		}
					}
				}
		               	$fb_prodid = rtrim($fb_prodid, ",");
				$category_name = $term->name;
                                $category_path = woosea_get_term_parents( $term->term_id, 'product_cat', $link = false, $project_taxonomy = false, $nicename = false, $visited = array() );
				$viewContent = "fbq(\"track\",\"ViewCategory\",{content_category:\"$category_path\", content_name:\"$category_name\", content_type:\"product\", content_ids:\"[$fb_prodid]\"});";
			} elseif ($fb_pagetype == "searchresults"){
				$term = get_queried_object();
                		$search_string = sanitize_text_field($_GET['s']);
				
				global $wp_query;
				$ids = wp_list_pluck( $wp_query->posts, "ID" );
				$fb_prodid = "";

				foreach ($ids as $id){
					$_product = wc_get_product($id);
					if(!$_product) {
						return -1;
					}

					$ptype = $_product->get_type();
					if($ptype == "simple"){
						// Add the simple product ID
 						$fb_prodid .= '\''.$id.'\',';
					} else {
						// This is a variable product, add variation product ID's
						$children_ids = $_product->get_children();
                                		foreach ($children_ids as $id){
 							$fb_prodid .= '\''.$id.'\',';
							//$fb_prodid .= $id.',';
                                		}
					}
				}
		               	$fb_prodid = rtrim($fb_prodid, ",");
				$viewContent = "fbq(\"trackCustom\",\"Search\",{search_string:\"$search_string\", content_type:\"product\", content_ids:\"[\"$fb_prodid\"]\"});";
			} else {
				// This is another page than a product page
				$viewContent = "";
			}
		?>
		<!-- Facebook Pixel Code – added Product Feed Pro for WooCommerce by AdTribes.io -->
		<!------------------------------------------------------------------------------
		Make sure the g:id value in your Facebook catalogue feed matched with
		the content of the content_ids parameter in the Facebook Pixel Code
		------------------------------------------------------------------------------->
		<script type="text/javascript">
			console.log("Facebook Pixel by AdTribes.io - 3");
  			!function(f,b,e,v,n,t,s)
  			{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  			n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  			if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  			n.queue=[];t=b.createElement(e);t.async=!0;
  			t.src=v;s=b.getElementsByTagName(e)[0];
  			s.parentNode.insertBefore(t,s)}(window, document,'script',
  			'https://connect.facebook.net/en_US/fbevents.js');
  			fbq("init", "<?php print"$facebook_pixel_id";?>");
  			fbq("track", "PageView");
			<?php
				if(strlen($viewContent) > 2){
					print"$viewContent";
				}
			?>
		</script>
		<noscript>
  			<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php print"$facebook_pixel_id";?>&ev=PageView&noscript=1"/>
		</noscript>	
		<!-- End Facebook Pixel Code -->
		<?php
		}
	}
}
add_action('wp_footer', 'woosea_add_facebook_pixel');

/**
 * Add Google Adwords Remarketing code to footer
 */
function woosea_add_remarketing_tags( $product = null ){
        if ( ! is_object( $product ) ) {
                global $product;
        }
	$ecomm_pagetype = WooSEA_Google_Remarketing::woosea_google_remarketing_pagetype();
   	$add_remarketing = get_option ('add_remarketing');
      
	if($add_remarketing == "yes"){	
        	$adwords_conversion_id = get_option("woosea_adwords_conversion_id");

		if($adwords_conversion_id > 0){
			if ($ecomm_pagetype == "product"){
                		if ( '' !== $product->get_price()) {
                 		$ecomm_prodid = get_the_id();

				if(!empty($ecomm_prodid)){

                                        if(!$product) {
                                                return -1;
                                        }

					if ( $product->is_type( 'variable' ) ) {
						// We should first check if there are any _GET parameters available
						// When there are not we are on a variable product page but not on a specific variable one
						// In that case we need to put in the AggregateOffer structured data
						$variation_id = woosea_find_matching_product_variation( $product, $_GET );
						$nr_get = count($_GET);
	
						if($nr_get > 0){
							$variable_product = wc_get_product($variation_id);
							
							// for variants use the variation_id and not the item_group_id
							// otherwise Google will disapprove the items due to itemID mismatches
							$ecomm_prodid = $variation_id;					
	
							if(is_object( $variable_product ) ) {
								$product_price = $variable_product->get_price();

                						// ----- remove HTML TAGs ----- 
                						//$product_price = preg_replace ('/<[^>]*>/', ' ', $product_price);
								$ecomm_price = $product_price;
							} else {
								// AggregateOffer
       	       					 	   	$prices  = $product->get_variation_prices();
       	       		 			     		$lowest  = reset( $prices['price'] );
               	        				 	$highest = end( $prices['price'] );

                 			  		     	if ( $lowest === $highest ) {
                        			     	  		$ecomm_price = wc_format_decimal( $lowest, wc_get_price_decimals() );
                               				 	} else {
                        			       	 		$ecomm_lowprice  = wc_format_decimal( $lowest, wc_get_price_decimals() );
                        				        	$ecomm_highprice = wc_format_decimal( $highest, wc_get_price_decimals() );
								}
							}
						} else {
							// When there are no parameters in the URL (so for normal users, not coming via Google Shopping URL's) show the old WooCommwerce JSON
                       		 			$prices  = $product->get_variation_prices();
                      	 				$lowest  = reset( $prices['price'] );
                      					$highest = end( $prices['price'] );

         	            	 		 	if ( $lowest === $highest ) {
                	       		 			$ecomm_price = wc_format_decimal( $lowest, wc_get_price_decimals());
                     		 			} else {
                       		 				$ecomm_lowprice = wc_format_decimal( $lowest, wc_get_price_decimals() );
                        			       	 	$ecomm_highprice = wc_format_decimal( $highest, wc_get_price_decimals() );
							}
						}
					} else {
        					$ecomm_price = wc_format_decimal( $product->get_price(), wc_get_price_decimals() );
      					}
				}
				?>
				<script type="text/javascript">
				var google_tag_params = {
				ecomm_prodid: <?php print "$ecomm_prodid";?>,
				ecomm_pagetype: '<?php print "$ecomm_pagetype";?>',
				ecomm_totalvalue: <?php print "$ecomm_price";?>,
				};
				</script>
		
			<?php
			}
		} elseif ($ecomm_pagetype == "cart"){
				$ecomm_prodid = get_the_id();

				?>
				<script type="text/javascript">
				var google_tag_params = {
				ecomm_prodid: '<?php print "$ecomm_prodid";?>',
				ecomm_pagetype: '<?php print "$ecomm_pagetype";?>',
				};
				</script>
				<?php
		} else {
			// This is another page than a product page
			?>
               		<script type="text/javascript">
     	          	var google_tag_params = {
     	          	ecomm_pagetype: '<?php print "$ecomm_pagetype";?>',
    	           	};
        	       	</script>
			<?php
		}
		?>
			<!-- Google-code – remarketing tag added by AdTribes.io -->
			<!--------------------------------------------------
			You need to make sure that the ecomm_prodid parameter, which we fill with your
			WooCommerce product Id matches the g:id field for your Google Merchant Center feed. 
			--------------------------------------------------->
			<script type="text/javascript">
			/* <![CDATA[ */
			var google_conversion_id = <?php print "$adwords_conversion_id";?>;
			var google_custom_params = window.google_tag_params;
			var google_remarketing_only = true;
			/* ]]> */
			</script>
			<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
			</script>
			<noscript>
			<div style="display:inline;">
			<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/<?php print "$adwords_conversion_id";?>/?guid=ON&amp;script=0"/>
			</div>
			</noscript>
			<!-- End Google Remarketing Pixel Code -->
			<?php
		}
	}
}
add_action('wp_footer', 'woosea_add_remarketing_tags');

/**
 * Hook and function that will run during plugin uninstall.
 */
function uninstall_woosea_feed(){
	require plugin_dir_path(__FILE__) . 'classes/class-uninstall-cleanup.php';
    	WooSEA_Uninstall_Cleanup::uninstall_cleanup();
}
register_uninstall_hook(__FILE__, 'uninstall_woosea_feed');

/**
 * Hook and function that will run during plugin deactivation.
 */
function deactivate_woosea_feed(){
	require plugin_dir_path(__FILE__) . 'classes/class-deactivate-cleanup.php';
    	WooSEA_Deactivate_Cleanup::deactivate_cleanup();
}
register_deactivation_hook(__FILE__, 'deactivate_woosea_feed');

/**
 * Hooks and functions that will run during plugin activation.
 */
function activate_woosea_feed(){
	require plugin_dir_path(__FILE__) . 'classes/class-activate.php';
    	WooSEA_Activation::activate_checks();
}
register_activation_hook(__FILE__, 'activate_woosea_feed');

/**
 * Close the get Elite notification
 **/
function woosea_getelite_notification(){
	//delete_option('woosea_getelite_notification');

	$get_elite_notice = array(
		"show" => "no",
		"timestamp" => date( 'd-m-Y' )
	);

	update_option('woosea_getelite_notification',$get_elite_notice);
}
add_action( 'wp_ajax_woosea_getelite_notification', 'woosea_getelite_notification' );

/**
 * Close the get Elite activation notification
 **/
function woosea_getelite_active_notification(){

	//delete_option('woosea_getelite_active_notification');

	$get_elite_notice = array(
		"show" => "no",
		"timestamp" => date( 'd-m-Y' )
	);

	update_option('woosea_getelite_active_notification',$get_elite_notice);
}
add_action( 'wp_ajax_woosea_getelite_active_notification', 'woosea_getelite_active_notification' );

/**
 * Request our plugin users to write a review
 **/
function woosea_request_review(){
	// Only request for a review when:
	// Plugin activation has been > 1 week
	// Active projects > 0

	$cron_projects = get_option( 'cron_projects' );
	if(!empty( $cron_projects )){
		$nr_projects = count($cron_projects);
		$first_activation = get_option ( 'woosea_first_activation' );
 		$notification_interaction = get_option( 'woosea_review_interaction' );
		$current_time = time();
		$show_after = 604800; // Show only after one week
		$is_active = $current_time-$first_activation;
		$page = basename($_SERVER['REQUEST_URI']);

//		if (preg_match("/woo-product-feed-pro|woosea_manage_feed|woosea_manage_settings/i",$page)){

			if(($nr_projects > 0) AND ($is_active > $show_after) AND ($notification_interaction != "yes")){
			echo '<div class="notice notice-info review-notification">';
			echo '<table><tr><td></td><td><font color="green" style="font-weight:normal";><p>Hey, I noticed you have been using our plugin, <u>Product Feed PRO for WooCommerce by AdTribes.io</u>, for over a week now and have created product feed projects with it - that\'s awesome! Could you please do Eva and me a BIG favor and give it a 5-star rating on WordPress? Just to help us spread the word and boost our motivation. We would greatly appreciate if you would do so :)<br/>~ Adtribes.io support team<br><ul><li><span class="ui-icon ui-icon-caret-1-e" style="display: inline-block;"></span><a href="https://wordpress.org/support/plugin/woo-product-feed-pro/reviews?rate=5#new-post" target="_blank" class="dismiss-review-notification">Ok, you deserve it</a></li><li><span class="ui-icon ui-icon-caret-1-e" style="display: inline-block;"></span><a href="#" class="dismiss-review-notification">Nope, maybe later</a></li><li><span class="ui-icon ui-icon-caret-1-e" style="display: inline-block;"></span><a href="#" class="dismiss-review-notification">I already did</a></li></ul></p></font></td></tr></table>';
			echo '</div>';	
			}
//		}
	}
}
add_action('admin_notices', 'woosea_request_review');

/**
 * Create a seperate MySql table for saving conversion information
 */
function woosea_create_db_table(){
	// Create MySql conversion table
	global $wpdb;
	$version = get_option( 'my_plugin_version', '1.5.2' );
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'adtribes_my_conversions';

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		conversion_time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		project_hash varchar(256) NOT NULL,
		utm_source varchar(256) NOT NULL,
		utm_campaign varchar(256) NOT NULL,
		utm_medium varchar(256) NOT NULL,
		utm_term varchar(256) NOT NULL,
		productId int(128) NOT NULL,
		orderId int(128) NOT NULL,
		UNIQUE KEY id (id),
		UNIQUE KEY orderId (orderId)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}
register_activation_hook(__FILE__, 'woosea_create_db_table');

/**
 * Add some JS and mark-up code on every front-end page in order to get the conversion tracking to work
 */
function woosea_hook_header() {
	$marker = sprintf('<!-- This website runs the Product Feed PRO for WooCommerce by AdTribes.io plugin -->');
	echo "\n${marker}\n";
}
add_action('wp_head','woosea_hook_header');

/**
 * We need to be able to make an AJAX call on the thank you page
 */
function woosea_inject_ajax( $order_id ){
	// Last order details
	$order = new WC_Order( $order_id );
	$order_id = $order->get_id();
	$customer_id = $order->get_user_id();
	$total = $order->get_total();

	update_option('last_order_id', $order_id);
}
add_action( 'woocommerce_thankyou', 'woosea_inject_ajax' );

/**
 * Register own cron hook(s), it will execute the woosea_create_all_feeds that will generate all feeds on scheduled event
 */
add_action( 'woosea_cron_hook', 'woosea_create_all_feeds'); // create a cron hook

/**
 * Add WooCommerce SEA plugin to Menu
 */
function woosea_menu_addition(){
		add_menu_page(__( 'Product Feed PRO for WooCommerce', 'woo-product-feed-pro' ), __( 'Product Feed Pro','woo-product-feed-pro' ), 'manage_options', __FILE__, 'woosea_generate_pages', esc_url( WOOCOMMERCESEA_PLUGIN_URL . '/images/icon-16x16.png'),99);
            	add_submenu_page(__FILE__, __( 'Feed configuration', 'woo-product-feed-pro' ), __( 'Create feed', 'woo-product-feed-pro' ), 'manage_options', __FILE__, 'woosea_generate_pages');
            	add_submenu_page(__FILE__, __( 'Manage feeds', 'woo-product-feed-pro' ), __( 'Manage feeds', 'woo-product-feed-pro' ), 'manage_options', 'woosea_manage_feed', 'woosea_manage_feed');
            	add_submenu_page(__FILE__, __( 'Settings', 'woo-product-feed-pro' ), __( 'Settings', 'woo-product-feed-pro' ), 'manage_options', 'woosea_manage_settings', 'woosea_manage_settings');
}

/**
 * Get the attributes for displaying the attributes dropdown on the rules page
 * Gets all attributes, product, image and attributes
 */
function woosea_ajax() {
	$rowCount = sanitize_text_field($_POST['rowCount']);

	$attributes_dropdown = get_option('attributes_dropdown');
	if (!is_array($attributes_dropdown)){
		$attributes_obj = new WooSEA_Attributes;
		$attributes_dropdown = $attributes_obj->get_product_attributes_dropdown();
        	update_option( 'attributes_dropdown', $attributes_dropdown, 'yes');
	}

	$data = array (
		'rowCount' => $rowCount,
		'dropdown' => $attributes_dropdown
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_ajax', 'woosea_ajax' );

/**
 * Get a list of categories for the drop-down 
 */
function woosea_categories_dropdown() {
	$rowCount = sanitize_text_field($_POST['rowCount']);

	$orderby = 'name';
	$order = 'asc';
	$hide_empty = false ;
	$cat_args = array(
    		'orderby'    => $orderby,
    		'order'      => $order,
    		'hide_empty' => $hide_empty,
	);

	$categories_dropdown = "<select name=\"rules[$rowCount][criteria]\">";
	$product_categories = get_terms( 'product_cat', $cat_args );

	foreach ($product_categories as $key => $category) {
		$categories_dropdown .= "<option value=\"$category->name\">$category->name ($category->slug)</option>";	

	}
	$categories_dropdown .= "</select>";

	$data = array (
		'rowCount' => $rowCount,
		'dropdown' => $categories_dropdown
	);
	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_categories_dropdown', 'woosea_categories_dropdown' );

/**
 * Save Google Dynamic Remarketing Conversion Tracking ID
 */
function woosea_save_adwords_conversion_id() {
	$adwords_conversion_id = sanitize_text_field($_POST['adwords_conversion_id']);
	update_option("woosea_adwords_conversion_id", $adwords_conversion_id);
}
add_action( 'wp_ajax_woosea_save_adwords_conversion_id', 'woosea_save_adwords_conversion_id' );

/**
 * Save batch size 
 */
function woosea_save_batch_size() {
	$batch_size = sanitize_text_field($_POST['batch_size']);
	update_option("woosea_batch_size", $batch_size);
}
add_action( 'wp_ajax_woosea_save_batch_size', 'woosea_save_batch_size' );

/**
 * Save Facebook Pixel ID
 */
function woosea_save_facebook_pixel_id() {
	$facebook_pixel_id = sanitize_text_field($_POST['facebook_pixel_id']);
	update_option("woosea_facebook_pixel_id", $facebook_pixel_id);
}
add_action( 'wp_ajax_woosea_save_facebook_pixel_id', 'woosea_save_facebook_pixel_id' );

/**
 * Mass map categories to the correct Google Shopping category taxonomy
 */
function woosea_add_mass_cat_mapping(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
	$catMappings = $_POST['catMappings'];
	
	// I need to sanitize the catMappings Array
	$mappings = array();
	foreach ($catMappings as $mKey => $mVal){
		$mKey = sanitize_text_field($mKey);
		$mVal = sanitize_text_field($mVal);
		$piecesVal = explode("||", $mVal);
		$mappings[$piecesVal[1]] = array(
			"rowCount"		=> $piecesVal[1],
			"categoryId"		=> $piecesVal[1],
			"criteria"		=> $piecesVal[0],
			"map_to_category"	=> $piecesVal[2],

		);
	}
	
	$project = WooSEA_Update_Project::get_project_data(sanitize_text_field($project_hash));
	// This happens during configuration of a new feed
        if(empty($project)){
		$project_temp = get_option( 'channel_project' );
       		if(array_key_exists('mappings', $project_temp)){
			$project_temp['mappings'] = $mappings + $project_temp['mappings'];
		} else {
 			$project_temp['mappings'] = $mappings;
		}
                update_option( 'channel_project',$project_temp,'yes');
	} else {
		// Only update the ones that changed
		foreach ($mappings as $categoryId => $catArray){
			if (array_key_exists($categoryId, $project['mappings'])){
				$project['mappings'][$categoryId] = $catArray;
			} else {
				$project['mappings'][$categoryId] = $catArray;
			}
		}
		$project_updated = WooSEA_Update_Project::update_project_data($project);
	}
	$data = array (
		'status_mapping' 	=> "true",
	);

	echo json_encode($data);
	wp_die();

}
add_action( 'wp_ajax_woosea_add_mass_cat_mapping', 'woosea_add_mass_cat_mapping' );

/**
 * Map categories to the correct Google Shopping category taxonomy
 */
function woosea_add_cat_mapping() {
	$rowCount = sanitize_text_field($_POST['rowCount']);
	$className = sanitize_text_field($_POST['className']);
	$map_to_category = sanitize_text_field($_POST['map_to_category']);
	$project_hash = sanitize_text_field($_POST['project_hash']);
	//$criteria = sanitize_text_field($_POST['criteria']);

	$criteria = $_POST['criteria'];
	$status_mapping = "false";
	$project = WooSEA_Update_Project::get_project_data(sanitize_text_field($project_hash));	

	// This is during the configuration of a new feed
	if(empty($project)){
		$project_temp = get_option( 'channel_project' );
	
		$project_temp['mappings'][$rowCount]['rowCount'] = $rowCount;
		$project_temp['mappings'][$rowCount]['categoryId'] = $rowCount;
		$project_temp['mappings'][$rowCount]['criteria'] = $criteria;
		$project_temp['mappings'][$rowCount]['map_to_category'] = $map_to_category;

                update_option( 'channel_project',$project_temp,'yes');
		$status_mapping = "true";
		// This is updating an existing product feed
	} else {
		$project['mappings'][$rowCount]['rowCount'] = $rowCount;
		$project['mappings'][$rowCount]['categoryId'] = $rowCount;
		$project['mappings'][$rowCount]['criteria'] = $criteria;
		$project['mappings'][$rowCount]['map_to_category'] = $map_to_category;

		$project_updated = WooSEA_Update_Project::update_project_data($project);	
		$status_mapping = "true";
	}

	$data = array (
		'rowCount' 		=> $rowCount,
		'className'		=> $className,
		'map_to_category' 	=> $map_to_category,
		'status_mapping' 	=> $status_mapping,
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_add_cat_mapping', 'woosea_add_cat_mapping' );

/**
 * Retrieve variation product id based on it attributes
 **/
function woosea_find_matching_product_variation( $product, $attributes ) {
 
    foreach( $attributes as $key => $value ) {
        if( strpos( $key, 'attribute_' ) === 0 ) {
            continue;
        }
        unset( $attributes[ $key ] );
        $attributes[ sprintf( 'attribute_%s', $key ) ] = $value;
    }

    if( class_exists('WC_Data_Store') ) {
        $data_store = WC_Data_Store::load( 'product' );
     	return $data_store->find_matching_product_variation( $product, $attributes );
    } else {
        return $product->get_matching_variation( $attributes );
    }
}

/**
 * Remove the price from the JSON-LD on variant product pages
 * As WooCommerce shows the wrong price and it causes items
 * to disapproved in Google's Merchant center because of it
 */
function woosea_product_delete_meta_price( $product = null ) {

	$markup_offer = array();
	$structured_data_fix = get_option ('structured_data_fix');

	if ( ! is_object( $product ) ) {
		global $product;
	}
	if ( ! is_a( $product, 'WC_Product' ) ) {
		return;
	}
	$shop_name = get_bloginfo( 'name' );
	$shop_url  = home_url();
	$shop_currency = get_woocommerce_currency();

	// Sisplay URL of current page. 
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
		$link = "https"; 
	} else {
   		 $link = "http"; 
	}  
	// Here append the common URL characters. 
	$link .= "://"; 
	// Append the host(domain name, ip) to the URL. 
	$link .= $_SERVER['HTTP_HOST']; 
	// Append the requested resource location to the URL 
	$link .= $_SERVER['REQUEST_URI']; 
     
	if($structured_data_fix == "yes"){

		$pr_woo = wc_get_price_to_display($product);

//		if ( '' !== $product->get_regular_price() ) {
			$product_id = get_the_id();
	
			// Get product MPN
			$mpn = get_post_meta( $product_id, '_woosea_mpn', true );
	
			// Get product condition
			$condition = ucfirst( get_post_meta( $product_id, '_woosea_condition', true ) );

			if(!$condition){
				$json_condition = "NewCondition";
			} else {
				$json_condition = $condition."Condition";
			}                	

                        // Assume prices will be valid until the end of next year, unless on sale and there is an end date.
                        $price_valid_until = date( 'Y-12-31', current_time( 'timestamp', true ) + YEAR_IN_SECONDS );
		
                      	if(!$product) {
                        	return -1;
                      	}
	
			if ( $product->is_type( 'variable' ) ) {
				// We should first check if there are any _GET parameters available
				// When there are not we are on a variable product page but not on a specific variable one
				// In that case we need to put in the AggregateOffer structured data
				$nr_get = count($_GET);

				if($nr_get > 0){
					//$variation_id = woosea_find_matching_product_variation( $product, $_GET );
					$mother_id = wc_get_product()->get_id();
					$children_ids = $product->get_children();

					foreach ($children_ids as &$child_val) {
                             	   		$product_variations = new WC_Product_Variation( $child_val );
                                		$variations = array_filter($product_variations->get_variation_attributes());
						$from_url = str_replace("\\","",$_GET,$i);
						$intersect = array_intersect($from_url, $variations);
						if($variations == $intersect){
							$variation_id = $child_val;
						}
					}

					if(isset($variation_id )){
						$variable_product = wc_get_product($variation_id);
					}

					if( (isset($variation_id)) AND ( is_object( $variable_product ) ) ) {
						$qty = 1;

						// on default show prices including tax	
                                		$product_price = wc_get_price_including_tax($variable_product);
						$structured_vat = get_option ('structured_vat');

						// user requested to have prices without tax
                                		if($structured_vat == "yes"){
                                        		$tax_rates = WC_Tax::get_base_tax_rates( $product->get_tax_class() );	

							// Workaround for price caching issues
                        				if(!empty($tax_rates)){
                                				$tax_rates[1]['rate'] = 0;
                        				}

							// Make sure tax rates are numeric
							if( is_numeric($tax_rates[1]['rate']) ){
								if( is_numeric($variable_product->get_price()) ){
                        						$product_price = wc_get_price_excluding_tax($variable_product,array('price'=> $variable_product->get_price())) * (100+$tax_rates[1]['rate'])/100;
								}
							}
						}	

						// Force rounding to two decimals 
						if(!empty($product_price)){
							$product_price = round($product_price, 2);
						}

						// Get product MPN
						$mpn = get_post_meta( $variation_id, '_woosea_mpn', true );

						// Get product condition
						$condition = ucfirst( get_post_meta( $variation_id, '_woosea_condition', true ) );

						if(!$condition){
							$json_condition = "NewCondition";
						} else {
							$json_condition = $condition."Condition";
						}                	

						// Get stock status
						$stock_status = $variable_product->get_stock_status();
                       		 		if ($stock_status == "outofstock"){
                       		         		$availability = "OutOfStock";
                        			} else {
                                			$availability = "InStock";
                        			}
                                
						if ( $variable_product->is_on_sale() && $variable_product->get_date_on_sale_to() ) {
                                        		$price_valid_until = date( 'Y-m-d', $variable_product->get_date_on_sale_to()->getTimestamp() );
                                		}

						$markup_offer = array(
							'@type'         	=> 'Offer',
							'price'			=> $product_price,
						        'priceValidUntil'    	=> $price_valid_until,
	                                                'priceSpecification' => array(
								'@type'			=> 'PriceSpecification',
								'price'                 => $product_price,
                                                        	'priceCurrency'         => $shop_currency,
                                                        	'valueAddedTaxIncluded' => wc_prices_include_tax() ? 'true' : 'false',
                                                	),	
							'priceCurrency' 	=> $shop_currency,
							'itemCondition' 	=> 'https://schema.org/'.$json_condition.'',
							'availability'  	=> 'https://schema.org/'.$availability.'',
							'sku'           	=> $variable_product->get_sku(),
							'image'         	=> wp_get_attachment_url( $product->get_image_id() ),
							'description'   	=> $product->get_description(),
							'seller'        	=> array(
								'@type' 	=> 'Organization',
								'name'  	=> $shop_name,
								'url'   	=> $shop_url,
							),
							'url'			=> $link
						);
					} else {
						// AggregateOffer
       	        	                 	$prices  = $product->get_variation_prices();
       	             		            	$lowest  = reset( $prices['price'] );
                        	        	$highest = end( $prices['price'] );

                                        	$price_valid_until = date( 'Y-m-d', $variable_product->get_date_on_sale_to()->getTimestamp() );

                   	          	   	if ( $lowest === $highest ) {
                        	                	$markup_offer = array(
                              		                  	'@type' => 'Offer',
                                	               	 	'price' => wc_format_decimal( $lowest, wc_get_price_decimals() ),
                                        	       		'priceCurrency' => $shop_currency,
						              	'priceSpecification' => array(
									'@type'			=> 'PriceSpecification',
                                                        		'price'                 => wc_format_decimal( $lowest, wc_get_price_decimals() ),
                                                        		'priceCurrency'         => $shop_currency,
                                                        		'valueAddedTaxIncluded' => wc_prices_include_tax() ? 'true' : 'false',
                                                		),	
								'itemCondition' => 'https://schema.org/'.$json_condition.'',
                                        			'availability'  => 'https://schema.org/' . $stock = ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
                                   	     				'sku'           => $product->get_sku(),
                                        				'image'         => wp_get_attachment_url( $product->get_image_id() ),
                                        				'description'   => $product->get_description(),
                                        				'seller'        => array(
                                                				'@type' => 'Organization',
                                                				'name'  => $shop_name,
                                                				'url'   => $shop_url,
                                        				), 
								'url'		=> $link
			                		);
                                		} else {
                                        		$markup_offer = array(
                                      		          	'@type'     => 'AggregateOffer',
                                             		   	'lowPrice'  => wc_format_decimal( $lowest, wc_get_price_decimals() ),
                        	             		        'highPrice' => wc_format_decimal( $highest, wc_get_price_decimals() ),
                                		              	'priceCurrency' => $shop_currency,
						        	'priceValidUntil'    	=> $price_valid_until,
								'itemCondition' => 'https://schema.org/'.$json_condition.'',
								'availability'  => 'https://schema.org/' . $stock = ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
        	                                		'sku'           => $product->get_sku(),
                	                        		'image'         => wp_get_attachment_url( $product->get_image_id() ),
                        	                		'description'   => $product->get_description(),
                                	        		'seller'        => array(
                                        	       	 		'@type' => 'Organization',
                                        	        		'name'  => $shop_name,
                                                			'url'   => $shop_url,
                                        			),
								'url'		=> $link
			        	        	);
						}
					}
				} else {
					// This is a variation product page but no variation has been selected. WooCommerce always shows the price of the lowest priced
					// variation product. That is why we also put this in the JSON
					// When there are no parameters in the URL (so for normal users, not coming via Google Shopping URL's) show the old WooCommwerce JSON
					$product_price = round(wc_get_price_to_display($product),2);
                        		$price_valid_until = date( 'Y-12-31', current_time( 'timestamp', true ) + YEAR_IN_SECONDS );
                        		
					$markup_offer += array(
                                		'@type'         	=> 'Offer',
						'price'			=> $product_price,
						'priceCurrency' 	=> $shop_currency,
						'priceValidUntil'    	=> $price_valid_until,
                                		'availability'  	=> 'https://schema.org/' . ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
        	                                'sku'           	=> $product->get_sku(),
				 		'seller'        	=> array(
                                        		'@type' 	=> 'Organization',
                                        		'name'  	=> $shop_name,
                                        		'url'   	=> $shop_url,
                                		),
						'url'			=> $link
                        		);

				}
	   		} else {
                             	// This is a simple product
				// By default show prices including tax
				$product_price = wc_get_price_including_tax($product);
                            	$structured_vat = get_option ('structured_vat');

				// Use prices excluding tax
                           	if($structured_vat == "yes"){
         	               		$tax_rates = WC_Tax::get_base_tax_rates( $product->get_tax_class() );   
					if(!empty($tax_rates)){
                                        	$tax_rates[1]['rate'] = 0;
                               		}
                             		$product_price = wc_get_price_excluding_tax($product,array('price'=> $product->get_price())) * (100+$tax_rates[1]['rate'])/100;
				}
				$product_price = round($product_price, 2);

                        	// Assume prices will be valid until the end of next year, unless on sale and there is an end date.
                        	$price_valid_until = date( 'Y-12-31', current_time( 'timestamp', true ) + YEAR_IN_SECONDS );

				$markup_offer = array(
 	           	            	'@type' => 'Offer',
                       			'price' => $product_price,
				        'priceValidUntil'    => $price_valid_until,
					'priceCurrency' => $shop_currency,
                                      	'priceSpecification' => array(
 						'@type'                 => 'PriceSpecification',
                                        	'price'                 => $product_price,
                                            	'priceCurrency'         => $shop_currency,
                                            	'valueAddedTaxIncluded' => wc_prices_include_tax() ? 'true' : 'false',
                                     	),
					'itemCondition' => 'https://schema.org/'.$json_condition.'',
					'availability'  => 'https://schema.org/' . $stock = ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
					'sku'           => $product->get_sku(),
					'image'         => wp_get_attachment_url( $product->get_image_id() ),
					'description'   => $product->get_description(),
					'seller'        => array(
						'@type' => 'Organization',
						'name'  => $shop_name,
						'url'   => $shop_url,
					),
					'url'		=> $link
                      		);
            		}
//		}
	} else {
		// Just use the old WooCommerce buggy setting
                if ( '' !== $product->get_price() ) {

			$price_valid_until = date( 'Y-12-31', current_time( 'timestamp', true ) + YEAR_IN_SECONDS );
                       
                      	if(!$product) {
                        	return -1;
                     	}
 
			if ( $product->is_type( 'variable' ) ) {
                                $prices  = $product->get_variation_prices();
                                $lowest  = reset( $prices['price'] );
                                $highest = end( $prices['price'] );
                            	$permalink = get_permalink( $product->get_id() ); 
                            	$price_valid_until = date( 'Y-m-d', $product->get_date_on_sale_to()->getTimestamp() );
                                
				if ( $lowest === $highest ) {

                                        $markup_offer = array(
                                                '@type' => 'Offer',
                                                'price' => wc_format_decimal( $lowest, wc_get_price_decimals() ),
				               	'priceValidUntil'    => $price_valid_until,
					        'priceCurrency' => $shop_currency,
                                		'availability'  => 'https://schema.org/' . ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
						'url'           => $permalink,
					        'priceSpecification' => array(
                                                        'price'                 => wc_format_decimal( $lowest, wc_get_price_decimals() ),
                                                        'priceCurrency'         => $shop_currency,
                                                        'valueAddedTaxIncluded' => wc_prices_include_tax() ? 'true' : 'false',
                                                ),

                                        );


                                } else {
		                        $markup_offer = array(
                                        	'@type'     => 'AggregateOffer',
                                                'lowPrice'  => wc_format_decimal( $lowest, wc_get_price_decimals() ),
                                                'highPrice' => wc_format_decimal( $highest, wc_get_price_decimals() ),
				               	'priceValidUntil'    => $price_valid_until,
					        'priceCurrency' => $shop_currency,
                                		'availability'  => 'https://schema.org/' . ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
                        			'url'           => $permalink,    
			   		 	'seller'        => array(
                                        		'@type' => 'Organization',
                                        		'name'  => $shop_name,
                                        		'url'   => $shop_url,
                                		),
                        		);
                                }
                        } else {
                                if ( $product->is_on_sale() && $product->get_date_on_sale_to() ) {
                                        $price_valid_until = date( 'Y-m-d', $product->get_date_on_sale_to()->getTimestamp() );
                                }

				$permalink = get_permalink( $product->get_id() );
                                $markup_offer = array(
                                        '@type' => 'Offer',
                                        'price' => wc_format_decimal( $product->get_price(), wc_get_price_decimals() ),
			                'priceValidUntil'    => $price_valid_until,
					'priceCurrency' => $shop_currency,
                                        'priceSpecification' => array(
                                                'price'                 => wc_format_decimal( $product->get_price(), wc_get_price_decimals() ),
                                                'priceCurrency'         => $shop_currency,
                                                'valueAddedTaxIncluded' => wc_prices_include_tax() ? 'true' : 'false',
                                        ),
                                	'availability'  => 'https://schema.org/' . ( $product->is_in_stock() ? 'InStock' : 'OutOfStock' ),
                               	        'url'           => $permalink,
					'seller'        => array(
                                        	'@type' => 'Organization',
                                        	'name'  => $shop_name,
                                        	'url'   => $shop_url,
                                	),
				);
                        }
		}
	}
	return $markup_offer;
}
//add_filter( 'woocommerce_structured_data_product_offer', 'woosea_product_delete_meta_price', 1000, 1 );


/**
 * Fix the WooCommerce schema markup bug for variation prices 
 */
function woosea_product_fix_structured_data( $product = null ) {
        $markup = array();

        if ( ! is_object( $product ) ) {
                global $product;
        }
        if ( ! is_a( $product, 'WC_Product' ) ) {
                return;
        }

       	$shop_name = get_bloginfo( 'name' );
     	$shop_url  = home_url();
     	$currency  = get_woocommerce_currency();
   
        // Sisplay URL of current page. 
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                $link = "https";
        } else {
                 $link = "http";
        }
        // Here append the common URL characters. 
        $link .= "://";
        // Append the host(domain name, ip) to the URL. 
        $link .= $_SERVER['HTTP_HOST'];
        // Append the requested resource location to the URL 
        $link .= $_SERVER['REQUEST_URI'];

        $structured_data_fix = get_option ('structured_data_fix');

	// This is an Elite user who enababled the structured data fix
        if($structured_data_fix == "yes"){
	    	// We should first check if there are any _GET parameters available
     		// When there are not we are on a variable product page but not on a specific variable one
      		// In that case we need to put in the AggregateOffer structured data
     		$nr_get = count($_GET);

	    	if($nr_get > 0){
			// This is a variable product
             		$mother_id = wc_get_product()->get_id();
              		$children_ids = $product->get_children();
                        $prod_type = $product->get_type();

			if($prod_type == "variable"){
            			foreach ($children_ids as &$child_val) {
                			$product_variations = new WC_Product_Variation( $child_val );
                     			$variations = array_filter($product_variations->get_variation_attributes());
                     			$from_url = str_replace("\\","",$_GET,$i);
                      			$intersect = array_intersect($from_url, $variations);
                     			if($variations == $intersect){
                        			$variation_id = $child_val;
                       			}
             			}
			}


            		if(isset($variation_id )){
                		$variable_product = wc_get_product($variation_id);
               		}

            		if( (isset($variation_id)) AND ( is_object( $variable_product ) ) ) {

	    			$markup = array(      
        				'@type'       => 'Product', 
             				'@id'         => $link . '#product', // Append '#product' to differentiate between this @id and the @id generated for the Breadcrumblist.
              				'name'        => $variable_product->get_name(),
             				'url'         => $link,
                                	'description' => wp_strip_all_tags( do_shortcode( $product->get_short_description() ? $product->get_short_description() : $product->get_description() ) ),
     				);
    				$image     = wp_get_attachment_url( $variable_product->get_image_id() );
                		if ( $image ) {
                        		$markup['image'] = $image;
                		}
				
				// Get product brand
                                $brand = get_post_meta( $variation_id, '_woosea_brand', true );
                		if ( $brand ) {
                        		$markup['brand'] = array (
						'@type'		=> 'Thing',
						'name'		=> $brand,
					);
                		}
		      	
				// Get product MPN
                                $mpn = get_post_meta( $variation_id, '_woosea_mpn', true );
                		if ( $mpn ) {
                        		$markup['mpn'] = $mpn;
                		}

                        	// Get product GTIM
                        	$gtin = get_post_meta( $variation_id, '_woosea_gtin', true );

                        	if ( $gtin ) {
                                	$gtin_length = strlen($gtin);
                                
                                	if ( $gtin_length == 14){
                                        	$markup['gtin14'] = $gtin;
                                	} elseif ( $gtin_length == 13){
                                        	$markup['gtin13'] = $gtin;
                                	} elseif ( $gtin_length == 12){
                                        	$markup['gtin12'] = $gtin;
                                	} elseif ( $gtin_length == 8){
                                        	$markup['gtin8'] = $gtin;
                                	} else {
                                        	// do not add GTIN to markup
                                	}
                        	}
	
				// Declare SKU or fallback to ID.
      				if ( $variable_product->get_sku() ) {
        				$markup['sku'] = $variable_product->get_sku();
      				} else {
           				$markup['sku'] = $variable_product->get_id();
      				}

        	                // Get the offers structured data schema markup
	                        $markup['offers'][0] = woosea_product_delete_meta_price($product);

				// This only works for WooCommerce 3.6 and higher (wc_review_ratings_enabled function)
			        if ( ($product->get_rating_count()) OR (function_exists(wc_review_ratings_enabled()))) {
                			$markup['aggregateRating'] = array(
                        			'@type'       => 'AggregateRating',
                        			'ratingValue' => $product->get_average_rating(),
                        			'reviewCount' => $product->get_review_count(),
                			);

                			// Markup 5 most recent rating/review.
                			$comments = get_comments(
                        			array(
                                			'number'      => 5,
                                			'post_id'     => $product->get_id(),
                                			'status'      => 'approve',
                                			'post_status' => 'publish',
                                			'post_type'   => 'product',
                                			'parent'      => 0,
                                			'meta_query'  => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
                                        			array(
                                                			'key'     => 'rating',
                                                			'type'    => 'NUMERIC',
                                                			'compare' => '>',
                                                			'value'   => 0,
                                        			),
                                			),
                        			)
                			);

                			if ( $comments ) {
                        			$markup['review'] = array();
                        			foreach ( $comments as $comment ) {
                                			$markup['review'][] = array(
                                        			'@type'         => 'Review',
                                        			'reviewRating'  => array(
                                                			'@type'       => 'Rating',
                                                			'ratingValue' => get_comment_meta( $comment->comment_ID, 'rating', true ),
                                        			),
                                        			'author'        => array(
                                                			'@type' => 'Person',
                                                			'name'  => get_comment_author( $comment ),
                                        			),
                                        			'reviewBody'    => get_comment_text( $comment ),
                                        			'datePublished' => get_comment_date( 'c', $comment ),
                                			);
                        			}
                			}
        			}
			}
		} else {
			// This is a simple product
		    	$markup = array(      
        			'@type'       => 'Product', 
             			'@id'         => $link . '#product', // Append '#product' to differentiate between this @id and the @id generated for the Breadcrumblist.
             	 		'name'        => $product->get_name(),
             			'url'         => $link,
            			'description' => wp_strip_all_tags( do_shortcode( $product->get_short_description() ? $product->get_short_description() : $product->get_description() ) ),
    	 		);


                   	$brand = get_post_meta( $product->get_id(), '_woosea_brand', true );

               		if ( $brand ) {
                       		$markup['brand'] = array (
					'@type'		=> 'Thing',
					'name'		=> $brand,
				);
                	}
				
			// Get product MPN
                    	$mpn = get_post_meta( $product->get_id(), '_woosea_mpn', true );

              		if ( $mpn ) {
                        	$markup['mpn'] = $mpn;
                	}

			// Get product GTIM
                    	$gtin = get_post_meta( $product->get_id(), '_woosea_gtin', true );

              		if ( $gtin ) {
				$gtin_length = strlen($gtin);

				if ( $gtin_length == 14){
                        		$markup['gtin14'] = $gtin;
				} elseif ( $gtin_length == 13){
                        		$markup['gtin13'] = $gtin;
				} elseif ( $gtin_length == 12){
                        		$markup['gtin12'] = $gtin;
				} elseif ( $gtin_length == 8){
                        		$markup['gtin8'] = $gtin;
				} else {
					// do not add GTIN to markup
				}
                	}
	
    			$image     = wp_get_attachment_url( $product->get_image_id() );
	     		if ( $image ) {
        			$markup['image'] = $image;
     	 		}

      			// Declare SKU or fallback to ID.
    	  		if ( $product->get_sku() ) {
        			$markup['sku'] = $product->get_sku();
      			} else {
           			$markup['sku'] = $product->get_id();
      			}

                	// Get the offers structured data schema markup
               		$markup['offers'][0] = woosea_product_delete_meta_price($product);

//			if(!class_exists('WPSEO_WooCommerce_Schema')){
                                if ( ($product->get_rating_count()) OR (function_exists(wc_review_ratings_enabled()))) {

        		        	$markup['aggregateRating'] = array(
                		        	'@type'       => 'AggregateRating',
                        			'ratingValue' => $product->get_average_rating(),
               	         			'reviewCount' => $product->get_review_count(),
                			);

		 	               // Markup 5 most recent rating/review.
                			$comments = get_comments(
                        			array(
                                			'number'      => 5,
                                			'post_id'     => $product->get_id(),
                         	       			'status'      => 'approve',
                                			'post_status' => 'publish',
                             		   		'post_type'   => 'product',
                                			'parent'      => 0,
                                			'meta_query'  => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
                                        			array(
                                                			'key'     => 'rating',
                                             		   		'type'    => 'NUMERIC',
                                                			'compare' => '>',
                                                			'value'   => 0,
                                      		  		),
                                			),
                        			)
                			);

         			       if ( $comments ) {
                        			$markup['review'] = array();
                        			foreach ( $comments as $comment ) {
                                			$markup['review'][] = array(
                                        			'@type'         => 'Review',
                                        			'reviewRating'  => array(
                                    			            	'@type'       => 'Rating',
                                                			'ratingValue' => get_comment_meta( $comment->comment_ID, 'rating', true ),
                                        			),
                                        			'author'        => array(
                                                			'@type' => 'Person',
                                                			'name'  => get_comment_author( $comment ),
                                        			),
                                        			'reviewBody'    => get_comment_text( $comment ),
                                        			'datePublished' => get_comment_date( 'c', $comment ),
                                			);
						}
                        		}
                		}
  //      		}
		}
	} else {
		// Structured data fix is not enabled
	    	$markup = array(      
        		'@type'       => 'Product', 
             		'@id'         => $link . '#product', // Append '#product' to differentiate between this @id and the @id generated for the Breadcrumblist.
              		'name'        => $product->get_name(),
             		'url'         => $link,
            		'description' => wp_strip_all_tags( do_shortcode( $product->get_short_description() ? $product->get_short_description() : $product->get_description() ) ),
     		);

    		$image     = wp_get_attachment_url( $product->get_image_id() );
	     	if ( $image ) {
        		$markup['image'] = $image;
      		}

      		// Declare SKU or fallback to ID.
      		if ( $product->get_sku() ) {
        		$markup['sku'] = $product->get_sku();
      		} else {
           		$markup['sku'] = $product->get_id();
      		}

		// Get the offers structured data schema markup
		$markup['offers'][0] = woosea_product_delete_meta_price($product);

		// Check if Yoast SEO WooCommerce plugin is enabled
               	// if(!class_exists('WPSEO_WooCommerce_Schema')){

                     	if ( ($product->get_rating_count() > 0) OR (function_exists(wc_review_ratings_enabled()))) {
				$markup['aggregateRating'] = array(
                			'@type'       => 'AggregateRating',
                   			'ratingValue' => $product->get_average_rating(),
                    			'reviewCount' => $product->get_review_count(),
            			);

            			// Markup 5 most recent rating/review.
             			$comments = get_comments(
                			array(
                   		     		'number'      => 5,
                     		     	   	'post_id'     => $product->get_id(),
                              			'status'      => 'approve',
                       		      		'post_status' => 'publish',
                            			'post_type'   => 'product',
                              			'parent'      => 0,
                             			'meta_query'  => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
                               				array(
                                        			'key'     => 'rating',
                                 	           		'type'    => 'NUMERIC',
                                             			'compare' => '>',
                                            			'value'   => 0,
                                			),
                            			),
                   			)
            			);

 		          	if ( $comments ) {
        		        	$markup['review'] = array();
                		    	foreach ( $comments as $comment ) {
                       				$markup['review'][] = array(
                                			'@type'         => 'Review',
                                    			'reviewRating'  => array(
                                        			'@type'       => 'Rating',
                                   	         		'ratingValue' => get_comment_meta( $comment->comment_ID, 'rating', true ),
                                    			),
                        	             		'author'        => array(
                                	          		'@type' => 'Person',
                                        	    		'name'  => get_comment_author( $comment ),
                           	          		),
                                	    		'reviewBody'    => get_comment_text( $comment ),
                                      			'datePublished' => get_comment_date( 'c', $comment ),
                       				);
					}
                        	}
                	}
		//}
	}
	return $markup;
}

// Only execute this filter when the structured data fix feature is enabled
$structured_data_fix = get_option ('structured_data_fix');
if($structured_data_fix == "yes"){
	add_filter( 'woocommerce_structured_data_product', 'woosea_product_fix_structured_data', 10, 2 );
}

/**
 * Get the shipping zone countries and ID's
 */
function woosea_shipping_zones(){
	$shipping_options = "";
	$shipping_zones = WC_Shipping_Zones::get_zones();

	$shipping_options = "<option value=\"all_zones\">All zones</option>";

	foreach ( $shipping_zones as $zone){
		$shipping_options .= "<option value=\"$zone[zone_id]\">$zone[zone_name]</option>";		
	}

	$data = array (
		'dropdown' => $shipping_options,
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_shipping_zones', 'woosea_shipping_zones' );

/**
 * Determine if any of the feeds is updating
 */
function woosea_check_processing(){
	$processing = "false";

        $feed_config = get_option( 'cron_projects' );
        $found = false;

        foreach ( $feed_config as $key => $val ) {
		if(array_key_exists('running', $val)){

			if(($val['running'] == "true") OR ($val['running'] == "stopped")){
				$processing = "true";
			}
		}
	}

	$data = array (
		'processing' => $processing,
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_check_processing', 'woosea_check_processing' );

/**
 * Get the dynamic attributes
 */ 
function woosea_special_attributes(){
	$attributes_obj = new WooSEA_Attributes;
	$special_attributes = $attributes_obj->get_special_attributes_dropdown();
	$special_attributes_clean = $attributes_obj->get_special_attributes_clean();

	$data = array (
		'dropdown' => $special_attributes,
		'clean' => $special_attributes_clean,
	); 

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_special_attributes', 'woosea_special_attributes' );

/**
 * Get the available channels for a specific country
 */
function woosea_channel() {
	$country = sanitize_text_field($_POST['country']);
	$channel_obj = new WooSEA_Attributes;
	$data = $channel_obj->get_channels($country);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_channel', 'woosea_channel' );

/**
 * Delete a project from cron
 */
function woosea_project_delete(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
        $feed_config = get_option( 'cron_projects' );
	$found = false;

        foreach ( $feed_config as $key => $val ) {
                if ($val['project_hash'] == $project_hash){
			$found = true;
			$found_key = $key;

                	$upload_dir = wp_upload_dir();
                	$base = $upload_dir['basedir'];
                	$path = $base . "/woo-product-feed-pro/" . $val['fileformat'];
                	$file = $path . "/" . sanitize_file_name($val['filename']) . "." . $val['fileformat'];
		}
	}

	if ($found == "true"){
		# Remove project from project array		
		unset($feed_config[$found_key]);
		
		# Update cron
		update_option('cron_projects', $feed_config);

		# Remove project file
		@unlink($file);
	}

}
add_action( 'wp_ajax_woosea_project_delete', 'woosea_project_delete' );

/**
 * Stop processing of a project
 */
function woosea_project_cancel(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
        $feed_config = get_option( 'cron_projects' );

        foreach ( $feed_config as $key => $val ) {
                if ($val['project_hash'] == $project_hash){

        		$batch_project = "batch_project_".$project_hash;
                    	delete_option( $batch_project );
			
			$feed_config[$key]['nr_products_processed'] = 0;

                     	// Set processing status on ready
                      	$feed_config[$key]['running'] = "stopped";
                      	$feed_config[$key]['last_updated'] = date("d M Y H:i");

                   	// In 1 minute from now check the amount of products in the feed and update the history count
			wp_schedule_single_event( time() + 60, 'woosea_update_project_stats', array($val['project_hash']) );
		}
	}		
	update_option( 'cron_projects', $feed_config);	
}
add_action( 'wp_ajax_woosea_project_cancel', 'woosea_project_cancel' );

/**
 * Get the processing status of a project feed
 */
function woosea_project_processing_status(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
        $feed_config = get_option( 'cron_projects' );
	$proc_perc = 0;

        foreach ( $feed_config as $key => $val ) {
		if ($val['project_hash'] === $project_hash){
			$this_feed = $val;
		}
	}	

	if($this_feed['running'] == "ready"){
		$proc_perc = 100;
	} elseif($this_feed['running'] == "not run yet"){
		$proc_perc = 999;
	} else {
		$proc_perc = round(($this_feed['nr_products_processed']/$this_feed['nr_products'])*100);
	}

        $data = array (
		'project_hash' => $project_hash,
		'running' => $this_feed['running'],
                'proc_perc' => $proc_perc,
        );
        echo json_encode($data);
        wp_die();
	
}
add_action( 'wp_ajax_woosea_project_processing_status', 'woosea_project_processing_status' );

/**
 * Copy a project 
 */
function woosea_project_copy(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
        $feed_config = get_option( 'cron_projects' );

	$max_key = max(array_keys($feed_config));
	$add_project = array();
        $upload_dir = wp_upload_dir();
 	$external_base = $upload_dir['baseurl'];

        foreach ( $feed_config as $key => $val ) {
                if ($val['project_hash'] == $project_hash){
			$val['projectname'] = "Copy ". $val['projectname'];

                    	// New code to create the project hash so dependency on openSSL is removed      
                     	$keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    	$pieces = [];
                      	$length = 32;
                      	$max = mb_strlen($keyspace, '8bit') - 1;
                      	for ($i = 0; $i < $length; ++$i) {
                        	$pieces []= $keyspace[random_int(0, $max)];
                     	}
                    	$val['project_hash'] = implode('', $pieces);
			//$val['project_hash'] =  bin2hex(openssl_random_pseudo_bytes(16));
			$val['filename'] = $val['project_hash'];
			$val['utm_campaign'] = "Copy ". $val['utm_campaign'];
			$val['last_updated'] = "";
			$val['running'] = "not run yet";

			// Construct product feed URL
        		$external_path = $external_base . "/woo-product-feed-pro/" . $val['fileformat'];
                        $val['external_file'] = $external_path . "/" . sanitize_file_name($val['filename']) . "." . $val['fileformat'];

			// To build the new project row on the manage feed page
			$projecthash = $val['project_hash'];
			$projectname = $val['projectname'];
			$channel = $val['name'];
			$fileformat = $val['fileformat'];
			$interval = $val['cron'];
			$external_file = $val['external_file'];

			// Save the copied project
			$new_key = $max_key+1;
                        $add_project[$new_key] = $val;
                        array_push($feed_config, $add_project[$new_key]);
			update_option( 'cron_projects', $feed_config, 'yes');
			
			// Do not start processing, user wants to make changes to the copied project
			$copy_status = "true";
		}
	}

        $data = array (
		'project_hash'	=> $projecthash,
		'channel'	=> $channel,
		'projectname' 	=> $projectname,
		'fileformat' 	=> $fileformat,
		'interval'	=> $interval,
		'external_file'	=> $external_file,
                'copy_status' 	=> $copy_status
        );

        echo json_encode($data);
        wp_die();
}
add_action( 'wp_ajax_woosea_project_copy', 'woosea_project_copy' );

/**
 * Refresh a project 
 */
function woosea_project_refresh(){
	$project_hash = sanitize_text_field($_POST['project_hash']);
        $feed_config = get_option( 'cron_projects' );

        foreach ( $feed_config as $key => $val ) {
                if ($val['project_hash'] == $project_hash){
        		$batch_project = "batch_project_".$project_hash;
			if (!get_option( $batch_project )){
        			update_option( $batch_project, $val);
        			$final_creation = woosea_continue_batch($project_hash);
			} else {
        			$final_creation = woosea_continue_batch($project_hash);
			}
		}
	}
}
add_action( 'wp_ajax_woosea_project_refresh', 'woosea_project_refresh' );

/**
 * Add or remove custom attributes to the feed configuration drop-downs
 */
function woosea_add_attributes() {
	$attribute_name = sanitize_text_field($_POST['attribute_name']);
	$attribute_value = sanitize_text_field($_POST['attribute_value']);
	$active = sanitize_text_field($_POST['active']);

       	if(!get_option( 'woosea_extra_attributes' )){
		if($active == "true"){
			$extra_attributes = array(
				$attribute_value => $attribute_name
			);
			update_option ( 'woosea_extra_attributes', $extra_attributes, 'yes');
		}
        } else {
		$extra_attributes = get_option( 'woosea_extra_attributes' );
		if(!in_array($attribute_name, $extra_attributes,TRUE)){
			if($active == "true"){
				$add_attribute = array (
					$attribute_value => $attribute_name
				);
				$extra_attributes = array_merge ($extra_attributes, $add_attribute);	
				update_option ( 'woosea_extra_attributes', $extra_attributes, 'yes');
			}
		} else {
			if($active == "false"){
				// remove from extra attributes array	
				$extra_attributes = array_diff($extra_attributes, array($attribute_value => $attribute_name));	
				update_option ( 'woosea_extra_attributes', $extra_attributes, 'yes');
			}
		}
	}	
	$extra_attributes = get_option( 'woosea_extra_attributes' );
}
add_action( 'wp_ajax_woosea_add_attributes', 'woosea_add_attributes' );

/**
 * Change status of a project from active to inactive or visa versa
 */
function woosea_project_status() {
	$project_hash = sanitize_text_field($_POST['project_hash']);
	$active = sanitize_text_field($_POST['active']);
	$feed_config = get_option( 'cron_projects' );

	$number_feeds = count($feed_config);

	if ($number_feeds > 0){

	        foreach ( $feed_config as $key => $val ) {
        	        if ($val['project_hash'] == $project_hash){
                	        $feed_config[$key]['active'] = $active;
               	 		$upload_dir = wp_upload_dir();
                		$base = $upload_dir['basedir'];
                		$path = $base . "/woo-product-feed-pro/" . $val['fileformat'];
                		$file = $path . "/" . sanitize_file_name($val['filename']) . "." . $val['fileformat'];
                	}
        	}
	}

	// When project is put on inactive, delete the product feed
	if($active == "false"){
		@unlink($file);
	}

	// Regenerate product feed
	if($active == "true"){
		$update_project = woosea_project_refresh($project_hash);
	}

	// Update cron with new project status
        update_option( 'cron_projects', $feed_config);
}
add_action( 'wp_ajax_woosea_project_status', 'woosea_project_status' );

/**
 * Register interaction with the review request notification
 * We do not want to keep bothering our users with the notification
 */
function woosea_review_notification() {
	// Update review notification status
        update_option( 'woosea_review_interaction', 'yes', 'yes');
}
add_action( 'wp_ajax_woosea_review_notification', 'woosea_review_notification' );

/**
 * This function enables the setting to fix the 
 * WooCommerce structured data bug
 */
function woosea_enable_structured_data (){
        $status = sanitize_text_field($_POST['status']);
	if ($status == "off"){
		update_option( 'structured_data_fix', 'no', 'yes');
	} else {
		update_option( 'structured_data_fix', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_enable_structured_data', 'woosea_enable_structured_data' );

/**
 * This function enables the setting to remove VAT from 
 * structured data prices
 */
function woosea_structured_vat (){
        $status = sanitize_text_field($_POST['status']);
	if ($status == "off"){
		update_option( 'structured_vat', 'no', 'yes');
	} else {
		update_option( 'structured_vat', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_structured_vat', 'woosea_structured_vat' );

/**
 * This function enables the setting to add 
 * Product data manipulation support 
 */
function woosea_add_manipulation (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_manipulation_support', 'no', 'yes');
	} else {
		update_option( 'add_manipulation_support', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_manipulation', 'woosea_add_manipulation' );

/**
 * This function enables the setting to add 
 * WPML support 
 */
function woosea_add_wpml (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_wpml_support', 'no', 'yes');
	} else {
		update_option( 'add_wpml_support', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_wpml', 'woosea_add_wpml' );

/**
 * This function enables the setting to add 
 * Aelia support 
 */
function woosea_add_aelia (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_aelia_support', 'no', 'yes');
	} else {
		update_option( 'add_aelia_support', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_aelia', 'woosea_add_aelia' );

/**
 * This function enables the setting to use
 * Mother main image for all product variations 
 */
function woosea_add_mother_image (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_mother_image', 'no', 'yes');
	} else {
		update_option( 'add_mother_image', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_mother_image', 'woosea_add_mother_image' );

/**
 * This function enables the setting to use
 * Shipping costs for all countries 
 */
function woosea_add_all_shipping (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_all_shipping', 'no', 'yes');
	} else {
		update_option( 'add_all_shipping', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_all_shipping', 'woosea_add_all_shipping' );

/**
 * This function enables the setting to respect
 * the free shipping class 
 */
function woosea_free_shipping (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'free_shipping', 'no', 'yes');
	} else {
		update_option( 'free_shipping', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_free_shipping', 'woosea_free_shipping' );

/**
 * This function enables the setting to remove
 * local pickup shipping zones 
 */
function woosea_local_pickup_shipping (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'local_pickup_shipping', 'no', 'yes');
	} else {
		update_option( 'local_pickup_shipping', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_local_pickup_shipping', 'woosea_local_pickup_shipping' );

/**
 * This function enables the setting to use
 * logging
 */
function woosea_add_woosea_logging (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_woosea_logging', 'no', 'yes');
	} else {
		update_option( 'add_woosea_logging', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_woosea_logging', 'woosea_add_woosea_logging' );

/**
 * This function enables the setting to add 
 * the Faceook pixel 
 */
function woosea_add_facebook_pixel_setting (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_facebook_pixel', 'no', 'yes');
	} else {
		update_option( 'add_facebook_pixel', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_facebook_pixel_setting', 'woosea_add_facebook_pixel_setting' );

/**
 * This function saves the value that needs to be used in the Facebook pixel content_ids parameter 
 */
function woosea_facebook_content_ids (){
        $content_ids = sanitize_text_field($_POST['content_ids']);

	if ($content_ids == "variable"){
		update_option( 'add_facebook_pixel_content_ids', 'variable', 'yes');
	} else {
		update_option( 'add_facebook_pixel_content_ids', 'variation', 'yes');
	}
}
add_action( 'wp_ajax_woosea_facebook_content_ids', 'woosea_facebook_content_ids' );

/**
 * This function enables the setting to add 
 * Google's Dynamic Remarketing 
 */
function woosea_add_remarketing (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_remarketing', 'no', 'yes');
	} else {
		update_option( 'add_remarketing', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_remarketing', 'woosea_add_remarketing' );

/**
 * This function enables the setting to add 
 * a new batch size 
 */
function woosea_add_batch (){
        $status = sanitize_text_field($_POST['status']);

	if ($status == "off"){
		update_option( 'add_batch', 'no', 'yes');
	} else {
		update_option( 'add_batch', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_batch', 'woosea_add_batch' );

/**
 * This function enables the setting to add 
 * identifiers GTIN, MPN, EAN, UPC, Brand and Condition
 */
function woosea_add_identifiers (){
        $status = sanitize_text_field($_POST['status']);
	if ($status == "off"){
		update_option( 'add_unique_identifiers', 'no', 'yes');
	} else {
		update_option( 'add_unique_identifiers', 'yes', 'yes');
	}
}
add_action( 'wp_ajax_woosea_add_identifiers', 'woosea_add_identifiers' );

/**
 * This function add the actual fields to the edit product page for single products 
 * identifiers GTIN, MPN, EAN, UPC, Brand and Condition
 */
function woosea_custom_general_fields() {
        global $woocommerce, $post;

	$extra_attributes = array();
        $extra_attributes = get_option( 'woosea_extra_attributes' );

	// Check if the option is enabled or not in the pluggin settings 
	if( (get_option('add_unique_identifiers') == "yes") AND (!empty($extra_attributes)) ){

	        echo '<div id="woosea_attr" class="options_group">';

	        // Brand field
		if(array_key_exists('custom_attributes__woosea_brand', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_brand', true )))){
			woocommerce_wp_text_input(
                		array(
                 	  		'id'          => '_woosea_brand',
             	        	   	'label'       => __( 'Brand', 'woosea' ),
               	        		'desc_tip'    => 'true',
                        		'value'           =>  get_post_meta( $post->ID, '_woosea_brand', true ),
                        		'description' => __( 'Enter the product Brand here.', 'woosea' )
                		)
        		);
		}

        	echo '</div>';
        	echo '<div id="woosea_attr" class="options_group show_if_simple show_if_external">';

        	// Global Trade Item Number (GTIN) Field
		if(array_key_exists('custom_attributes__woosea_gtin', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_gtin', true )))){
	        	woocommerce_wp_text_input(
        	        	array(
                	        	'id'          => '_woosea_gtin',
                        		'label'       => __( 'GTIN', 'woosea' ),
                      		  	'desc_tip'    => 'true',
                        		'description' => __( 'Enter the product Global Trade Item Number (GTIN) here.', 'woosea' ),
                		)
        		);
		}

        	// MPN Field
		if(array_key_exists('custom_attributes__woosea_mpn', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_mpn', true )))){
			woocommerce_wp_text_input(
                		array(
                       	 		'id'          => '_woosea_mpn',
                        		'label'       => __( 'MPN', 'woosea' ),
                        		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the manufacturer product number', 'woosea' ),
                		)
        		);
		}

        	// Universal Product Code (UPC) Field
		if(array_key_exists('custom_attributes__woosea_upc', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_upc', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_upc',
                        		'label'       => __( 'UPC', 'woosea' ),
                        		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the Universal Product Code (UPC) here.', 'woosea' ),
                		)
        		);
		}

        	// International Article Number (EAN) Field
		if(array_key_exists('custom_attributes__woosea_ean', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_ean', true )))){
	       		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_ean',
                        		'label'       => __( 'EAN', 'woosea' ),
                        		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the International Article Number (EAN) here.', 'woosea' ),
                		)
        		);
		}

        	// Optimized product custom title Field
		if(array_key_exists('custom_attributes__woosea_optimized_title', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_optimized_title', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_optimized_title',
                        		'label'       => __( 'Optimized title', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter a optimized product title.', 'woosea' ),
                		)
        		);
		}

		// Add product condition drop-down
		if(array_key_exists('custom_attributes__woosea_condition', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_condition', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_condition',
					'label'		=> __( 'Product condition', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the product condition.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'new'		=> __( 'new', 'woosea' ),
						'refurbished'	=> __( 'refurbished', 'woosea' ),
						'used'		=> __( 'used', 'woosea' ),
						'damaged'	=> __( 'damaged', 'woosea' ),
					)
				)
			);
		}

        	// Color Field
		if(array_key_exists('custom_attributes__woosea_color', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_color', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_color',
                        		'label'       => __( 'Color', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Insert a color.', 'woosea' ),
                		)
        		);
		}

        	// Size Field
		if(array_key_exists('custom_attributes__woosea_size', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_size', true )))){
        		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_size',
                        		'label'       => __( 'Size', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Insert a size.', 'woosea' ),
                		)
        		);
		}

		// Add gender drop-down
		if(array_key_exists('custom_attributes__woosea_gender', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_gender', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_gender',
					'label'		=> __( 'Gender', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select gender.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'female'	=> __( 'female', 'woosea' ),
						'male'		=> __( 'male', 'woosea' ),
						'unisex'	=> __( 'unisex', 'woosea' ),
					)
				)
			);
		}

        	// Material Field
		if(array_key_exists('custom_attributes__woosea_material', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_material', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_material',
                        		'label'       => __( 'Material', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter a material.', 'woosea' ),
                		)
        		);
		}

        	// Pattern Field
		if(array_key_exists('custom_attributes__woosea_pattern', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_pattern', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_pattern',
                        		'label'       => __( 'Pattern', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter a pattern.', 'woosea' ),
                		)
        		);
		}

		// Add product age_group drop-down
		if(array_key_exists('custom_attributes__woosea_age_group', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_age_group', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_age_group',
					'label'		=> __( 'Age group', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the product age group.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'newborn'	=> __( 'newborn', 'woosea' ),
						'infant'	=> __( 'infant', 'woosea' ),
						'toddler'	=> __( 'toddler', 'woosea' ),
						'kids'		=> __( 'kids', 'woosea' ),
						'adult'		=> __( 'adult', 'woosea' ),
					)
				)
			);
		}

        	// Unit pricing measure Field
		if(array_key_exists('custom_attributes__woosea_unit_pricing_measure', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_unit_pricing_measure', true )))){
			woocommerce_wp_text_input(
                		array(
                       	 		'id'          => '_woosea_unit_pricing_measure',
                        		'label'       => __( 'Unit pricing measure', 'woosea' ),
                       		 	'desc_tip'    => 'true',
                        		'description' => __( 'Enter an unit pricing measure.', 'woosea' ),
                		)
        		);
		}

        	// Unit pricing base measure Field
		if(array_key_exists('custom_attributes__woosea_unit_pricing_base_measure', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_unit_pricing_base_measure', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_unit_pricing_base_measure',
                    		    	'label'       => __( 'Unit pricing base measure', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter an unit pricing base measure.', 'woosea' ),
                		)
        		);
		}

        	// Installment months
		if(array_key_exists('custom_attributes__woosea_installment_months', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_installment_months', true )))){
			woocommerce_wp_text_input(
                		array(
                      		  	'id'          => '_woosea_installment_months',
                        		'label'       => __( 'Installment months', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the number of monthly installments the buyer has to pay.', 'woosea' ),
                		)
        		);
		}

        	// Installment amount
		if(array_key_exists('custom_attributes__woosea_installment_amount', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_installment_amount', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_installment_amount',
                        		'label'       => __( 'Installment amount', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the amount the bbuyer has to pay per month.', 'woosea' ),
                		)
        		);
		}

        	// Cost of goods sold
		if(array_key_exists('custom_attributes__woosea_cost_of_good_sold', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_cost_of_good_sold', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_cost_of_good_sold',
                        		'label'       => __( 'Cost of goods sold', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the cost of good you are selling.', 'woosea' ),
                		)
        		);
		}

        	// Multipack
		if(array_key_exists('custom_attributes__woosea_multipack', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_multipack', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_multipack',
                        		'label'       => __( 'Multipack', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter the multipack amount.', 'woosea' ),
                		)
        		);
		}

		// Is bundle
		if(array_key_exists('custom_attributes__woosea_is_bundle', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_is_bundle', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_is_bundle',
					'label'		=> __( 'Is bundle', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the is bundle value.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'yes'		=> __( 'yes', 'woosea' ),
						'no'		=> __( 'no', 'woosea' ),
					)
				)
			);
		}

		// Energy efficiency class
		if(array_key_exists('custom_attributes__woosea_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_energy_efficiency_class',
					'label'		=> __( 'Energy efficiency class', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the product energy efficiency class.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

		// Minimum energy efficiency class
		if(array_key_exists('custom_attributes__woosea_min_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_min_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_min_energy_efficiency_class',
					'label'		=> __( 'Minimum energy efficiency class', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the minimum product energy efficiency class.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

		// Maximum energy efficiency class
		if(array_key_exists('custom_attributes__woosea_max_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_max_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_max_energy_efficiency_class',
					'label'		=> __( 'Maximum energy efficiency class', 'woosea' ),
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the maximum product energy efficiency class.', 'woosea' ),
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

        	// Is promotion
		if(array_key_exists('custom_attributes__woosea_is_promotion', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_is_promotion', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_is_promotion',
                      		  	'label'       => __( 'Is promotion', 'woosea' ),
                       		 	'desc_tip'    => 'true',
                	       	 	'description' => __( 'Enter your promotion ID.', 'woosea' ),
                		)
        		);
		}

        	// Custom field 0
		if(array_key_exists('custom_attributes__woosea_custom_field_0', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_custom_field_0', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_custom_field_0',
                    		    	'label'       => __( 'Custom field 0', 'woosea' ),
                       		 	'desc_tip'    => 'true',
                        		'description' => __( 'Enter your custom field 0', 'woosea' ),
                		)
        		);
		}

	       	// Custom field 1
		if(array_key_exists('custom_attributes__woosea_custom_field_1', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_custom_field_1', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_custom_field_1',
                        		'label'       => __( 'Custom field 1', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter your custom field 1', 'woosea' ),
                		)
        		);
		}

	       	// Custom field 2
		if(array_key_exists('custom_attributes__woosea_custom_field_2', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_custom_field_2', true )))){
	 		woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_custom_field_2',
                        		'label'       => __( 'Custom field 2', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter your custom field 2', 'woosea' ),
                		)
        		);
		}

	       	// Custom field 3
		if(array_key_exists('custom_attributes__woosea_custom_field_3', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_custom_field_3', true )))){
	 		woocommerce_wp_text_input(
                		array(
                       		 	'id'          => '_woosea_custom_field_3',
                        		'label'       => __( 'Custom field 3', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter your custom field 3', 'woosea' ),
                		)
        		);
		}

	       	// Custom field 4
		if(array_key_exists('custom_attributes__woosea_custom_field_4', $extra_attributes) OR (!empty(get_post_meta( $post->ID, '_woosea_custom_field_4', true )))){
			woocommerce_wp_text_input(
                		array(
                        		'id'          => '_woosea_custom_field_4',
                        		'label'       => __( 'Custom field 4', 'woosea' ),
                       	 		'desc_tip'    => 'true',
                        		'description' => __( 'Enter your custom field 4', 'woosea' ),
                		)
        		);
		}

		// Exclude product from feed
		woocommerce_wp_checkbox(
			array(
				'id'		=> '_woosea_exclude_product',
				'label'		=> __( 'Exclude from feeds', 'woosea' ),
				'desc_tip'	=> 'true',
				'description'	=> __( 'Check this box if you want this product to be excluded from product feeds.', 'woosea' ),
			)
		);

        	echo '</div>';
	}
}
add_action( 'woocommerce_product_options_general_product_data', 'woosea_custom_general_fields' );

/**
 * This function saves the input from the extra fields on the single product edit page
 */
function woosea_save_custom_general_fields($post_id){
        $woocommerce_brand      			= empty($_POST['_woosea_brand']) ? '' : sanitize_text_field($_POST['_woosea_brand']);
        $woocommerce_gtin       			= empty($_POST['_woosea_gtin']) ? '' : sanitize_text_field($_POST['_woosea_gtin']);
        $woocommerce_upc        			= empty($_POST['_woosea_upc']) ? '' : sanitize_text_field($_POST['_woosea_upc']);
        $woocommerce_mpn        			= empty($_POST['_woosea_mpn']) ? '' : sanitize_text_field($_POST['_woosea_mpn']);
        $woocommerce_ean        			= empty($_POST['_woosea_ean']) ? '' : sanitize_text_field($_POST['_woosea_ean']);
        $woocommerce_title      			= empty($_POST['_woosea_optimized_title']) ? '' : sanitize_text_field($_POST['_woosea_optimized_title']);
        $woocommerce_color      			= empty($_POST['_woosea_color']) ? '' : sanitize_text_field($_POST['_woosea_color']);
        $woocommerce_size       			= empty($_POST['_woosea_size']) ? '' : sanitize_text_field($_POST['_woosea_size']);
        $woocommerce_gender        			= empty($_POST['_woosea_gender']) ? '' : sanitize_text_field($_POST['_woosea_gender']);
        $woocommerce_material        			= empty($_POST['_woosea_material']) ? '' : sanitize_text_field($_POST['_woosea_material']);
        $woocommerce_pattern        			= empty($_POST['_woosea_pattern']) ? '' : sanitize_text_field($_POST['_woosea_pattern']);
        $woocommerce_unit_pricing_measure 		= empty($_POST['_woosea_unit_pricing_measure']) ? '' : sanitize_text_field($_POST['_woosea_unit_pricing_measure']);
        $woocommerce_unit_pricing_base_measure 		= empty($_POST['_woosea_unit_pricing_base_measure']) ? '' : sanitize_text_field($_POST['_woosea_unit_pricing_base_measure']);
        $woocommerce_installment_months      		= empty($_POST['_woosea_installment_months']) ? '' : sanitize_text_field($_POST['_woosea_installment_months']);
        $woocommerce_installment_amount      		= empty($_POST['_woosea_installment_amount']) ? '' : sanitize_text_field($_POST['_woosea_installment_amount']);
        $woocommerce_condition      			= empty($_POST['_woosea_condition']) ? '' : sanitize_text_field($_POST['_woosea_condition']);
        $woocommerce_age_group    			= empty($_POST['_woosea_age_group']) ? '' : sanitize_text_field($_POST['_woosea_age_group']);
        $woocommerce_cost_of_good_sold    		= empty($_POST['_woosea_cost_of_good_sold']) ? '' : sanitize_text_field($_POST['_woosea_cost_of_good_sold']);
        $woocommerce_multipack    			= empty($_POST['_woosea_multipack']) ? '' : sanitize_text_field($_POST['_woosea_multipack']);
        $woocommerce_is_bundle    			= empty($_POST['_woosea_is_bundle']) ? '' : sanitize_text_field($_POST['_woosea_is_bundle']);
        $woocommerce_energy_efficiency_class    	= empty($_POST['_woosea_energy_efficiency_class']) ? '' : sanitize_text_field($_POST['_woosea_energy_efficiency_class']);
        $woocommerce_min_energy_efficiency_class    	= empty($_POST['_woosea_min_energy_efficiency_class']) ? '' : sanitize_text_field($_POST['_woosea_min_energy_efficiency_class']);
        $woocommerce_max_energy_efficiency_class    	= empty($_POST['_woosea_max_energy_efficiency_class']) ? '' : sanitize_text_field($_POST['_woosea_max_energy_efficiency_class']);
        $woocommerce_is_promotion    			= empty($_POST['_woosea_is_promotion']) ? '' : sanitize_text_field($_POST['_woosea_is_promotion']);
        $woocommerce_custom_field_0    			= empty($_POST['_woosea_custom_field_0']) ? '' : sanitize_text_field($_POST['_woosea_custom_field_0']);
        $woocommerce_custom_field_1 			= empty($_POST['_woosea_custom_field_1']) ? '' : sanitize_text_field($_POST['_woosea_custom_field_1']);
        $woocommerce_custom_field_2    			= empty($_POST['_woosea_custom_field_2']) ? '' : sanitize_text_field($_POST['_woosea_custom_field_2']);
        $woocommerce_custom_field_3    			= empty($_POST['_woosea_custom_field_3']) ? '' : sanitize_text_field($_POST['_woosea_custom_field_3']);
        $woocommerce_custom_field_4    			= empty($_POST['_woosea_custom_field_4']) ? '' : sanitize_text_field($_POST['_woosea_custom_field_4']);

	if(!empty($_POST['_woosea_exclude_product'])){
		$woocommerce_exclude_product 		= sanitize_text_field($_POST['_woosea_exclude_product']);
	} else {
		$woocommerce_exclude_product 		= "no";;
	}

        if(isset($woocommerce_brand))
                update_post_meta( $post_id, '_woosea_brand', $woocommerce_brand);

        if(isset($woocommerce_mpn))
                update_post_meta( $post_id, '_woosea_mpn', esc_attr($woocommerce_mpn));

        if(isset($woocommerce_upc))
                update_post_meta( $post_id, '_woosea_upc', esc_attr($woocommerce_upc));

        if(isset($woocommerce_ean))
                update_post_meta( $post_id, '_woosea_ean', esc_attr($woocommerce_ean));

        if(isset($woocommerce_gtin))
                update_post_meta( $post_id, '_woosea_gtin', esc_attr($woocommerce_gtin));

        if(isset($woocommerce_color))
                update_post_meta( $post_id, '_woosea_color', esc_attr($woocommerce_color));

        if(isset($woocommerce_size))
                update_post_meta( $post_id, '_woosea_size', esc_attr($woocommerce_size));

        if(isset($woocommerce_gender))
                update_post_meta( $post_id, '_woosea_gender', esc_attr($woocommerce_gender));

        if(isset($woocommerce_material))
                update_post_meta( $post_id, '_woosea_material', esc_attr($woocommerce_material));

        if(isset($woocommerce_pattern))
                update_post_meta( $post_id, '_woosea_pattern', esc_attr($woocommerce_pattern));

        if(isset($woocommerce_title))
                update_post_meta( $post_id, '_woosea_optimized_title', $woocommerce_title);

        if(isset($woocommerce_unit_pricing_measure))
                update_post_meta( $post_id, '_woosea_unit_pricing_measure', $woocommerce_unit_pricing_measure);
 
        if(isset($woocommerce_unit_pricing_base_measure))
                update_post_meta( $post_id, '_woosea_unit_pricing_base_measure', $woocommerce_unit_pricing_base_measure);
 
	if(isset($woocommerce_condition))
                update_post_meta( $post_id, '_woosea_condition', $woocommerce_condition);

	if(isset($woocommerce_age_group))
                update_post_meta( $post_id, '_woosea_age_group', $woocommerce_age_group);

	if(isset($woocommerce_installment_months))
                update_post_meta( $post_id, '_woosea_installment_months', esc_attr($woocommerce_installment_months));

	if(isset($woocommerce_installment_amount))
                update_post_meta( $post_id, '_woosea_installment_amount', esc_attr($woocommerce_installment_amount));

	if(isset($woocommerce_exclude_product))
                update_post_meta( $post_id, '_woosea_exclude_product', esc_attr($woocommerce_exclude_product));

	if(isset($woocommerce_cost_of_good_sold))
                update_post_meta( $post_id, '_woosea_cost_of_good_sold', esc_attr($woocommerce_cost_of_good_sold));
	
	if(isset($woocommerce_multipack))
                update_post_meta( $post_id, '_woosea_multipack', esc_attr($woocommerce_multipack));
	
	if(isset($woocommerce_is_bundle))
                update_post_meta( $post_id, '_woosea_is_bundle', esc_attr($woocommerce_is_bundle));
	
	if(isset($woocommerce_energy_efficiency_class))
                update_post_meta( $post_id, '_woosea_energy_efficiency_class', esc_attr($woocommerce_energy_efficiency_class));
	
	if(isset($woocommerce_min_energy_efficiency_class))
                update_post_meta( $post_id, '_woosea_min_energy_efficiency_class', esc_attr($woocommerce_min_energy_efficiency_class));
	
	if(isset($woocommerce_max_energy_efficiency_class))
                update_post_meta( $post_id, '_woosea_max_energy_efficiency_class', esc_attr($woocommerce_max_energy_efficiency_class));

	if(isset($woocommerce_is_promotion))
                update_post_meta( $post_id, '_woosea_is_promotion', $woocommerce_is_promotion);

	if(isset($woocommerce_custom_field_0))
                update_post_meta( $post_id, '_woosea_custom_field_0', $woocommerce_custom_field_0);

	if(isset($woocommerce_custom_field_1))
                update_post_meta( $post_id, '_woosea_custom_field_1', $woocommerce_custom_field_1);

	if(isset($woocommerce_custom_field_2))
                update_post_meta( $post_id, '_woosea_custom_field_2', $woocommerce_custom_field_2);

	if(isset($woocommerce_custom_field_3))
                update_post_meta( $post_id, '_woosea_custom_field_3', $woocommerce_custom_field_3);

	if(isset($woocommerce_custom_field_4))
                update_post_meta( $post_id, '_woosea_custom_field_4', $woocommerce_custom_field_4);
}
add_action( 'woocommerce_process_product_meta', 'woosea_save_custom_general_fields' );

/**
 * Create the unique identifier fields for variation products
 */
function woosea_custom_variable_fields( $loop, $variation_id, $variation ) {

        // Check if the option is enabled or not in the pluggin settings 
        if( get_option('add_unique_identifiers') == "yes" ){

                $extra_attributes = get_option( 'woosea_extra_attributes' );

                // Variation Brand field
              	if(array_key_exists('custom_attributes__woosea_brand', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_brand', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'       => '_woosea_variable_brand['.$loop.']',
                  	       		'label'       => __( '<br>Brand', 'woosea' ),
                                	'placeholder' => 'Brand',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Brand here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_brand', true),
                                	'wrapper_class' => 'form-row-full',
                        	)
                	);
		}

                // Variation GTIN field
            	if(array_key_exists('custom_attributes__woosea_gtin', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_gtin', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_gtin['.$loop.']',
                                	'label'       => __( '<br>GTIN', 'woosea' ),
                                	'placeholder' => 'GTIN',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product GTIN here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_gtin', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

                // Variation MPN field
            	if(array_key_exists('custom_attributes__woosea_mpn', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_mpn', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_mpn['.$loop.']',
                         	       	'label'       => __( '<br>MPN', 'woosea' ),
                         	       	'placeholder' => 'Manufacturer Product Number',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the MPN here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_mpn', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Variation UPC field
            	if(array_key_exists('custom_attributes__woosea_upc', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_upc', true )))){
                	woocommerce_wp_text_input(
                        	array(
                         	       	'id'          => '_woosea_variable_upc['.$loop.']',
                               		'label'       => __( '<br>UPC', 'woosea' ),
                                	'placeholder' => 'UPC',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product UPC here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_upc', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
               	 	);
		}

                // Variation EAN field
            	if(array_key_exists('custom_attributes__woosea_ean', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_ean', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_ean['.$loop.']',
                                	'label'       => __( '<br>EAN', 'woosea' ),
                                	'placeholder' => 'EAN',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product EAN here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_ean', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Color field
            	if(array_key_exists('custom_attributes__woosea_color', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_color', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_color['.$loop.']',
                                	'label'       => __( '<br>Color', 'woosea' ),
                                	'placeholder' => 'Color',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Color here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_color', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Size field
            	if(array_key_exists('custom_attributes__woosea_size', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_size', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_size['.$loop.']',
                                	'label'       => __( '<br>Size', 'woosea' ),
                                	'placeholder' => 'Size',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Size here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_size', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

		// Add Gender drop-down
            	if(array_key_exists('custom_attributes__woosea_gender', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_gender', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_gender['.$loop.']',
					'label'		=> __( 'Gender', 'woosea' ),
					'placeholder'	=> 'Gender',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the gender.', 'woosea' ),
                                	'value'       	=> get_post_meta($variation->ID, '_woosea_gender', true),
                                	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'female'	=> __( 'female', 'woosea' ),
						'male'		=> __( 'male', 'woosea' ),
						'unisex'	=> __( 'unisex', 'woosea' ),
					)
				)
			);
		}

                // Material field
            	if(array_key_exists('custom_attributes__woosea_material', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_material', true )))){
                	woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_material['.$loop.']',
                                	'label'       => __( '<br>Material', 'woosea' ),
                                	'placeholder' => 'Material',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Material here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_material', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

               	// Pattern field
            	if(array_key_exists('custom_attributes__woosea_pattern', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_pattern', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_pattern['.$loop.']',
                                	'label'       => __( '<br>Pattern', 'woosea' ),
                                	'placeholder' => 'Pattern',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Pattern here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_pattern', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Variation Unit pricing measure field
            	if(array_key_exists('custom_attributes__woosea_unit_pricing_measure', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_unit_pricing_measure', true )))){
                	woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_unit_pricing_measure['.$loop.']',
                                	'label'       => __( '<br>Unit pricing measure', 'woosea' ),
                                	'placeholder' => 'Unit pricing measure',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Unit pricing measure here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_unit_pricing_measure', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Variation Unit pricing base measure field
            	if(array_key_exists('custom_attributes__woosea_unit_pricing_base_measure', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_unit_pricing_base_measure', true )))){
                	woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_variable_unit_pricing_base_measure['.$loop.']',
                                	'label'       => __( '<br>Unit pricing base measure', 'woosea' ),
                                	'placeholder' => 'Unit pricing base measure',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the product Unit pricing base measure here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_unit_pricing_base_measure', true),
                                	'wrapper_class' => 'form-row-first',
                        	)
                	);
		}

                // Variation optimized title field
            	if(array_key_exists('custom_attributes__woosea_optimized_title', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_optimized_title', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_optimized_title['.$loop.']',
                                	'label'       => __( '<br>Optimized title', 'woosea' ),
                                	'placeholder' => 'Optimized title',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter a optimized product title here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_optimized_title', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

                // Installment month field
            	if(array_key_exists('custom_attributes__woosea_installment_months', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_installment_months', true )))){
                	woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_installment_months['.$loop.']',
                                	'label'       => __( '<br>Installment months', 'woosea' ),
                                	'placeholder' => 'Installment months',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the number of montly installments for the buyer here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_installment_months', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

                // Installment amount field
            	if(array_key_exists('custom_attributes__woosea_installment_amount', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_installment_amount', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_installment_amount['.$loop.']',
                                	'label'       => __( '<br>Installment amount', 'woosea' ),
                                	'placeholder' => 'Installment amount',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the installment amount here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_installment_amount', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

		// Add product condition drop-down
            	if(array_key_exists('custom_attributes__woosea_condition', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_condition', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_condition['.$loop.']',
					'label'		=> __( 'Product condition', 'woosea' ),
					'placeholder'	=> 'Product condition',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the product condition.', 'woosea' ),
                                	'value'       	=> get_post_meta($variation->ID, '_woosea_condition', true),
                                	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'new'		=> __( 'new', 'woosea' ),
						'refurbished'	=> __( 'refurbished', 'woosea' ),
						'used'		=> __( 'used', 'woosea' ),
						'damaged'	=> __( 'damaged', 'woosea' ),
					)
				)
			);
		}

		// Add product age_group drop-down
            	if(array_key_exists('custom_attributes__woosea_age_group', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_age_group', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_age_group['.$loop.']',
					'label'		=> __( 'Product age group', 'woosea' ),
					'placeholder'	=> 'Product age group',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the product age group.', 'woosea' ),
                                	'value'       	=> get_post_meta($variation->ID, '_woosea_age_group', true),
                                	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'newborn'	=> __( 'newborn', 'woosea' ),
						'infant'	=> __( 'infant', 'woosea' ),
						'toddler'	=> __( 'toddler', 'woosea' ),
						'kids'		=> __( 'kids', 'woosea' ),
						'adult'		=> __( 'adult', 'woosea' ),
					)
				)
			);
		}

                // Cost of good sold
            	if(array_key_exists('custom_attributes__woosea_cost_of_good_sold', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_cost_of_good_sold', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_cost_of_good_sold['.$loop.']',
                                	'label'       => __( '<br>Cost of good sold', 'woosea' ),
                                	'placeholder' => 'Cost of good sold',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the cost of good sold.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_cost_of_good_sold', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

                // Multipack
            	if(array_key_exists('custom_attributes__woosea_multipack', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_multipack', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_multipack['.$loop.']',
                                	'label'       => __( '<br>Multipack', 'woosea' ),
                                	'placeholder' => 'Multipack amount',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter the multipack amount here.', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_multipack', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

		// Is bundle
            	if(array_key_exists('custom_attributes__woosea_is_bundle', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_is_bundle', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_is_bundle['.$loop.']',
					'label'		=> __( 'Is bundle', 'woosea' ),
					'placeholder'	=> 'Is bundle',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the is bundle value.', 'woosea' ),
                                	'value'       	=> get_post_meta($variation->ID, '_woosea_is_bundle', true),
                           	     	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woocommerce' ),
						'yes'		=> __( 'yes', 'woocommerce' ),
						'no'		=> __( 'no', 'woocommerce' ),
					)
				)
			);
		}

		// Energy efficiency class
            	if(array_key_exists('custom_attributes__woosea_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_energy_efficiency_class['.$loop.']',
					'label'		=> __( 'Energy efficiency class', 'woosea' ),
					'placeholder'	=> 'Energy efficiency class',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the energy efficiency class.', 'woosea' ),
          	                	'value'       	=> get_post_meta($variation->ID, '_woosea_energy_efficiency_class', true),
                	                'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

		// Minimum energy efficiency class
            	if(array_key_exists('custom_attributes__woosea_min_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_min_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_min_energy_efficiency_class['.$loop.']',
					'label'		=> __( 'Minimum energy efficiency class', 'woosea' ),
					'placeholder'	=> 'Minimum energy efficiency class',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the minimum energy efficiency class.', 'woosea' ),
                      	          	'value'       	=> get_post_meta($variation->ID, '_woosea_min_energy_efficiency_class', true),
                                	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

		// Maximum energy efficiency class
            	if(array_key_exists('custom_attributes__woosea_max_energy_efficiency_class', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_max_energy_efficiency_class', true )))){
			woocommerce_wp_select(
				array(
					'id'		=> '_woosea_max_energy_efficiency_class['.$loop.']',
					'label'		=> __( 'Maximum energy efficiency class', 'woosea' ),
					'placeholder'	=> 'Maximum energy efficiency class',
					'desc_tip'	=> 'true',
					'description'	=> __( 'Select the maximum energy efficiency class.', 'woosea' ),
                                	'value'       	=> get_post_meta($variation->ID, '_woosea_max_energy_efficiency_class', true),
                                	'wrapper_class' => 'form-row form-row-full',
					'options'	=> array (
						''		=> __( '', 'woosea' ),
						'A+++'		=> __( 'A+++', 'woosea' ),
						'A++'		=> __( 'A++', 'woosea' ),
						'A+'		=> __( 'A+', 'woosea' ),
						'A'		=> __( 'A', 'woosea' ),
						'B'		=> __( 'B', 'woosea' ),
						'C'		=> __( 'C', 'woosea' ),
						'D'		=> __( 'D', 'woosea' ),
						'E'		=> __( 'E', 'woosea' ),
						'F'		=> __( 'F', 'woosea' ),
						'G'		=> __( 'G', 'woosea' ),
					)
				)
			);
		}

                // Is promotion
            	if(array_key_exists('custom_attributes__woosea_is_promotion', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_is_promotion', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_is_promotion['.$loop.']',
                                	'label'       => __( '<br>Is promotion', 'woosea' ),
                                	'placeholder' => 'Is promotion',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your promotion ID', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_is_promotion', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}

                // Custom field 0
            	if(array_key_exists('custom_attributes__woosea_custom_field_0', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_custom_field_0', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_custom_field_0['.$loop.']',
                                	'label'       => __( '<br>Custom field 0', 'woosea' ),
                                	'placeholder' => 'Custom field 0',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your custom field 0', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_custom_field_0', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}	

                // Custom field 1
            	if(array_key_exists('custom_attributes__woosea_custom_field_1', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_custom_field_1', true )))){
			woocommerce_wp_text_input(
        	                array(
                	                'id'          => '_woosea_custom_field_1['.$loop.']',
                        	        'label'       => __( '<br>Custom field 1', 'woosea' ),
                          	      	'placeholder' => 'Custom field 1',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your custom field 1', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_custom_field_1', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}
	
                // Custom field 2
            	if(array_key_exists('custom_attributes__woosea_custom_field_2', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_custom_field_2', true )))){
                	woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_custom_field_2['.$loop.']',
                                	'label'       => __( '<br>Custom field 2', 'woosea' ),
                                	'placeholder' => 'Custom field 2',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your custom field 2', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_custom_field_2', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}	

	      	// Custom field 3
            	if(array_key_exists('custom_attributes__woosea_custom_field_3', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_custom_field_3', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_custom_field_3['.$loop.']',
                                	'label'       => __( '<br>Custom field 3', 'woosea' ),
                                	'placeholder' => 'Custom field 3',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your custom field 3', 'woosea' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_custom_field_3', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}		

		// Custom field 4
            	if(array_key_exists('custom_attributes__woosea_custom_field_4', $extra_attributes) OR (!empty(get_post_meta( $variation->ID, '_woosea_custom_field_4', true )))){
			woocommerce_wp_text_input(
                        	array(
                                	'id'          => '_woosea_custom_field_4['.$loop.']',
                                	'label'       => __( '<br>Custom field 4', 'woocommerce' ),
                                	'placeholder' => 'Custom field 4',
                                	'desc_tip'    => 'true',
                                	'description' => __( 'Enter your custom field 4', 'woocommerce' ),
                                	'value'       => get_post_meta($variation->ID, '_woosea_custom_field_4', true),
                                	'wrapper_class' => 'form-row-last',
                        	)
                	);
		}	

		// Exclude product from feed
		woocommerce_wp_checkbox(
			array(
				'id'		=> '_woosea_exclude_product['.$loop.']',
				'label'		=> __( '&nbsp;Exclude from feeds', 'woocommerce' ),
				'placeholder'	=> 'Exclude from feeds',
				'desc_tip'	=> 'true',
				'description'	=> __( 'Check this box if you want this product to be excluded from product feeds.', 'woocommerce' ),
                                'value'       	=> get_post_meta($variation->ID, '_woosea_exclude_product', true),
			)
		);
	}
}
add_action( 'woocommerce_product_after_variable_attributes', 'woosea_custom_variable_fields', 10, 3 );

/**
 * Save the unique identifier fields for variation products
 */
function woosea_save_custom_variable_fields( $post_id ) {

        if (isset( $_POST['variable_sku'] ) ) {

                $variable_sku          = $_POST['variable_sku'];
                $variable_post_id      = $_POST['variable_post_id'];
                $max_loop = max( array_keys( $_POST['variable_post_id'] ) );

                for ( $i = 0; $i <= $max_loop; $i++ ) {

                if ( ! isset( $variable_post_id[ $i ] ) ) {
                  continue;
                }

                // Brand Field
		if(isset($_POST['_woosea_variable_brand'])){
                	$_brand = $_POST['_woosea_variable_brand'];
               		$variation_id = (int) $variable_post_id[$i];
                	if ( isset( $_brand[$i] ) ) {
                		 update_post_meta( $variation_id, '_woosea_brand', stripslashes( sanitize_text_field( $_brand[$i] )));
               		}
		}

                // MPN Field
		if(isset($_POST['_woosea_variable_mpn'])){
                	$_mpn = $_POST['_woosea_variable_mpn'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_mpn[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_mpn', stripslashes( sanitize_text_field( $_mpn[$i] )));
                        }
		}

                // UPC Field
		if(isset($_POST['_woosea_variable_upc'])){
                	$_upc = $_POST['_woosea_variable_upc'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_upc[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_upc', stripslashes( sanitize_text_field( $_upc[$i] )));
                        }
		}

                // EAN Field
		if(isset($_POST['_woosea_variable_ean'])){
                	$_ean = $_POST['_woosea_variable_ean'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_ean[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_ean', stripslashes( sanitize_text_field( $_ean[$i] )));
                        }
		}

                // GTIN Field
		if(isset($_POST['_woosea_variable_gtin'])){
                	$_gtin = $_POST['_woosea_variable_gtin'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_gtin[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_gtin', stripslashes( sanitize_text_field( $_gtin[$i] )));
                        }
		}

                // Color Field
		if(isset($_POST['_woosea_variable_color'])){
                	$_color = $_POST['_woosea_variable_color'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_color[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_color', stripslashes( sanitize_text_field( $_color[$i] )));
                        }
		}

                // Size Field
		if(isset($_POST['_woosea_variable_size'])){
                	$_size = $_POST['_woosea_variable_size'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_size[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_size', stripslashes( sanitize_text_field( $_size[$i] )));
                        }
		}

                // Gender Field
		if(isset($_POST['_woosea_variable_gender'])){
                	$_gender = $_POST['_woosea_variable_gender'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_gender[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_gender', stripslashes( sanitize_text_field( $_gender[$i] )));
                        }
		}

                // Material Field
		if(isset($_POST['_woosea_variable_material'])){
                	$_material = $_POST['_woosea_variable_material'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_material[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_material', stripslashes( sanitize_text_field( $_material[$i] )));
                        }
		}

                // Pattern Field
		if(isset($_POST['_woosea_variable_pattern'])){
                	$_pattern = $_POST['_woosea_variable_pattern'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_pattern[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_pattern', stripslashes( sanitize_text_field( $_pattern[$i] )));
                        }
		}

                // Unit pricing measure Field
		if(isset($_POST['_woosea_variable_unit_pricing_measure'])){
                	$_pricing_measure = $_POST['_woosea_variable_unit_pricing_measure'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_pricing_measure[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_unit_pricing_measure', stripslashes( sanitize_text_field( $_pricing_measure[$i] )));
                        }
		}

                // Unit pricing base measure Field
		if(isset($_POST['_woosea_variable_unit_pricing_base_measure'])){
                	$_pricing_base = $_POST['_woosea_variable_unit_pricing_base_measure'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_pricing_base[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_unit_pricing_base_measure', stripslashes( sanitize_text_field( $_pricing_base[$i] )));
                        }
		}

		// Optimized title Field
		if(isset($_POST['_woosea_optimized_title'])){
                	$_opttitle = $_POST['_woosea_optimized_title'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_opttitle[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_optimized_title', stripslashes( sanitize_text_field( $_opttitle[$i] )));
                        }
		}

		// Installment months Field
		if(isset($_POST['_woosea_installment_months'])){
                	$_installment_months = $_POST['_woosea_installment_months'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_installment_months[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_installment_months', stripslashes( sanitize_text_field( $_installment_months[$i] )));
                        }
		}

		// Installment amount Field
		if(isset($_POST['_woosea_installment_amount'])){
                	$_installment_amount = $_POST['_woosea_installment_amount'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_installment_amount[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_installment_amount', stripslashes( sanitize_text_field( $_installment_amount[$i] )));
                        }
		}

                // Product condition Field
		if(isset($_POST['_woosea_condition'])){
                	$_condition = $_POST['_woosea_condition'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_condition[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_condition', stripslashes( sanitize_text_field( $_condition[$i] )));
                        }
		}

                // Product age group
		if(isset($_POST['_woosea_age_group'])){
                	$_age_group = $_POST['_woosea_age_group'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_age_group[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_age_group', stripslashes( sanitize_text_field( $_age_group[$i] )));
                        }
		}


                // Cost of good sold
		if(isset($_POST['_woosea_cost_of_good_sold'])){
                	$_cost_of_good_sold = $_POST['_woosea_cost_of_good_sold'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_cost_of_good_sold[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_cost_of_good_sold', stripslashes( sanitize_text_field( $_cost_of_good_sold[$i] )));
                        }
		}

                // Multipack
		if(isset($_POST['_woosea_multipack'])){
                	$_multipack = $_POST['_woosea_multipack'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_multipack[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_multipack', stripslashes( sanitize_text_field( $_multipack[$i] )));
                        }
         	}
      
                // Is promotion
		if(isset($_POST['_woosea_is_promotion'])){
	                $_is_promotion = $_POST['_woosea_is_promotion'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_is_promotion[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_is_promotion', stripslashes( sanitize_text_field( $_is_promotion[$i] )));
                        }
		}

		 // Is bundle
		if(isset($_POST['_woosea_is_bundle'])){
                	$_is_bundle = $_POST['_woosea_is_bundle'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_is_bundle[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_is_bundle', stripslashes( sanitize_text_field( $_is_bundle[$i] )));
                        }
		}

                // Energy efficiency class
		if(isset($_POST['_woosea_energy_efficiency_class'])){
                	$_energy_efficiency_class = $_POST['_woosea_energy_efficiency_class'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_energy_efficiency_class[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_energy_efficiency_class', stripslashes( sanitize_text_field( $_energy_efficiency_class[$i] )));
                        }
		}

                // Minimum energy efficiency class
		if(isset($_POST['_woosea_min_energy_efficiency_class'])){
                	$_min_energy_efficiency_class = $_POST['_woosea_min_energy_efficiency_class'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_min_energy_efficiency_class[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_min_energy_efficiency_class', stripslashes( sanitize_text_field( $_min_energy_efficiency_class[$i] )));
                        }
		}

                // Maximum energy efficiency class
		if(isset($_POST['_woosea_max_energy_efficiency_class'])){
                	$_max_energy_efficiency_class = $_POST['_woosea_max_energy_efficiency_class'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_max_energy_efficiency_class[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_max_energy_efficiency_class', stripslashes( sanitize_text_field( $_max_energy_efficiency_class[$i] )));
                        }
		}

                // Custom field 0
		if(isset($_POST['_woosea_custom_field_0'])){
	         	$_custom_field_0 = $_POST['_woosea_custom_field_0'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_custom_field_0[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_custom_field_0', stripslashes( sanitize_text_field( $_custom_field_0[$i] )));
                        }
		}

                // Custom field 1
		if(isset($_POST['_woosea_custom_field_1'])){
                	$_custom_field_1 = $_POST['_woosea_custom_field_1'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_custom_field_1[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_custom_field_1', stripslashes( sanitize_text_field( $_custom_field_1[$i] )));
                        }
		}

                // Custom field 2
		if(isset($_POST['_woosea_custom_field_2'])){
                	$_custom_field_2 = $_POST['_woosea_custom_field_2'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_custom_field_2[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_custom_field_2', stripslashes( sanitize_text_field( $_custom_field_2[$i] )));
                        }
		}

                // Custom field 3
		if(isset($_POST['_woosea_custom_field_3'])){
                	$_custom_field_3 = $_POST['_woosea_custom_field_3'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_custom_field_3[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_custom_field_3', stripslashes( sanitize_text_field( $_custom_field_3[$i] )));
                        }
		}

                // Custom field 4
		if(isset($_POST['_woosea_custom_field_4'])){
 	               $_custom_field_4 = $_POST['_woosea_custom_field_4'];
                        $variation_id = (int) $variable_post_id[$i];
                        if ( isset( $_custom_field_4[$i] ) ) {
                                update_post_meta( $variation_id, '_woosea_custom_field_4', stripslashes( sanitize_text_field( $_custom_field_4[$i] )));
                        }
		}

                // Exclude product from feed
		if(empty($_POST['_woosea_exclude_product'])){
			$_excludeproduct[$i] = "no";
		} else {
			$_excludeproduct = $_POST['_woosea_exclude_product'];
        	} 
		   	$variation_id = (int) $variable_post_id[$i];
                	if ( isset( $_excludeproduct[$i] ) ) {
                     		update_post_meta( $variation_id, '_woosea_exclude_product', stripslashes( $_excludeproduct[$i]));
        		}
		}	
	}
}
add_action( 'woocommerce_save_product_variation', 'woosea_save_custom_variable_fields', 10, 1 );

/**
 * Set project history: amount of products in the feed
 **/
function woosea_update_project_history($project_hash){
        $feed_config = get_option( 'cron_projects' );
  	
	foreach ( $feed_config as $key => $project ) {
	       if ($project['project_hash'] == $project_hash){
			$nr_products = 0;
			$upload_dir = wp_upload_dir();
     			$base = $upload_dir['basedir'];
     			$path = $base . "/woo-product-feed-pro/" . $project['fileformat'];
      			$file = $path . "/" . sanitize_file_name($project['filename']) . "." . $project['fileformat'];

     			if (file_exists($file)) {
        			if(($project['fileformat'] == "csv") || ($project['fileformat'] == "txt")){
               				$fp = file($file);
                      			$raw_nr_products = count($fp);
                      			$nr_products = $raw_nr_products-1; // header row of csv
	     			} else {
                     			$xml = simplexml_load_file($file, 'SimpleXMLElement', LIBXML_NOCDATA);

					if($project['name'] == "Yandex"){
						if(isset($xml->offers->offer)){
                         				$nr_products = count($xml->offers->offer);
						}
					} else {
                      				if ($project['taxonomy'] == "none"){
                         				$nr_products = count($xml->product);
                       				} else {
                          				$nr_products = count($xml->channel->item);
                      				}
					}
            			}
  			}
        		$count_timestamp = date("d M Y H:i");
       			$number_run = array(
        			$count_timestamp => $nr_products,
      			);

 	    		$feed_config = get_option( 'cron_projects' );
     			foreach ( $feed_config as $key => $val ) {
      				if (($val['project_hash'] == $project['project_hash']) AND ($val['running'] == "ready")){
      					//unset($feed_config[$key]['history_products']);
             				if (array_key_exists('history_products', $feed_config[$key])){
             					$feed_config[$key]['history_products'][$count_timestamp] = $nr_products;
              				} else {
                				$feed_config[$key]['history_products'] = $number_run;
            				}
      				}
      			}
       			update_option( 'cron_projects', $feed_config);
		}
	}
}
add_action( 'woosea_update_project_stats', 'woosea_update_project_history',1,1 );

/**
 * Get the attribute mapping helptexts
 */
function woosea_fieldmapping_dialog_helptext(){
	$field = sanitize_text_field($_POST['field']);

	switch ($field) {
		case "g:id";
			$helptext = "(Required field) The g:id field is used to uniquely identify each product. The g:id needs to be unique and remain the same forever. Google advises to map the g:id field to a SKU value, however since this field is not always present nor always filled we suggest you map the 'Product Id' field to g:id.";
			break;
		case "g:title";
			$helptext = "(Required field) The g:title field should clearly identify the product you are selling. We suggest you map this field to your 'Product name'.";
			break;
		case "g:description";
			$helptext = "(Required field) The g:description field should tell users about your product. We suggest you map this field to your 'Product description' or 'Product short description'";
			break;
		case "g:link";
			$helptext = "(Required field) The g:link field should be filled with the landing page on your website. We suggest you map this field to your 'Link' attribute.";
			break;
		case "g:image_link";
			$helptext = "(Required field) Include the URL for your main product image with the g:image_link attribute. We suggest you map this field to your 'Main image' attribute.";
			break;
		case "g:definition";
			$helptext = "(Required field) Use the g:availability attribute to tell users and Google whether you have a product in stock. We suggest you map this field to your 'Availability' attribute.";
			break;
		case "g:price";
			$helptext = "(Required field) Use the g:price attribute to tell users how much you are charging for your product. We suggest you map this field to your 'Price' attribute. When a product is on sale the plugin will automatically get the sale price instead of the normal base price. Also, make sure you use a currency pre- or suffix as this is required by Google when you have not configured a currency in your Google Merchant center. The plugin automatically determines your relevant currency and puts this in the price prefix field.";
			break;
		case "g:google_product_category";
			$helptext = "(Required for some product categories) Use the g:google_product_category attribute to indicate the category of your item based on the Google product taxonomy. Map this field to your 'Category' attribute. In the next configuration step you will be able to map your categories to Google's category taxonomy. Categorizing your product helps ensure that your ad is shown with the right search results.";
			break;
		case "g:brand";
			$helptext = "Use the g:brand attribute to indicate the product's brand name. The brand is used to help identify your product and will be shown to users who view your ad. g:brand is required for each product with a clearly associated brand or manufacturer. If the product doesn't have a clearly associated brand (e.g. movies, books, music) or is a custom-made product (e.g. art, custom t-shirts, novelty products and handmade products), the attribute is optional. As WooCommerce does not have a brand attribute out of the box you will probably have to map the g:brand field to a custom/dynamic field or product attribute.";
			break;
		case "g:gtin";
			$helptext = "(Required for all products with a GTIN assigned by the manufacturer). This specific number helps Google to make your ad richer and easier for users to find. Products submitted without any unique product identifiers are difficult to classify and may not be able to take advantage of all Google Shopping features. Several different types of ID numbers are considered a GTIN, for example: EAN, UPC, JAN, ISBN, IFT-14. Most likely you have configured custom/dynamic or product attribute that you need to map to the g:gtin field.";
			break;
		case "g:mpn";
			$helptext = "(Required for all products without a manufacturer-assigned GTIN.) USe the mpn attribute to submit your product's Manufacturer Part Number (MPN). MPNs are used to uniquely identify a specific product among all products from the same manufacturer. Users might search Google Shopping specifically for an MPN, so providing the MPN can help ensure that your product is shown in relevant situations. When a product doesn't have a clearly associated mpn or is a custom-made product (e.g. art, custom t-shirts, novelty products and handmade products), the attribute is optional.";
			break;
		case "g:identifier_exists";
			$helptext = "(Required only for new products that don’t have <b>gtin and brand</b> or <b>mpn and brand</b>.) Use the g:identifier_exists attribute to indicate that unique product identifiers aren’t available for your product. Unique product identifiers include gtin, mpn, and brand. The plugin automatically determines if the value for a product is 'no' or 'yes' when you set the g:identifier_exists to 'Plugin calculation'.";
			break;
		case "g:condition";
			$helptext = "(Required) Tell users about the condition of the product you are selling. Supported values are: 'new', 'refurbished' and 'used'. We suggest you map this field to the 'Condition' attribute.";
			break;
		case "g:item_group_id";
			$helptext = "(Required for the following countries: Brazil, France, Germany, Japan, United Kingdom and the United States). The g:item_group_id is used to group product variants in your product data. We suggest you map the g:item_group_id to the 'Item group ID' attribute. The plugin automatically ads the correct value to this field and makes sure the 'mother' products is not in your product feed (as required by Google).";
			break;
		case "g:shipping";
			$helptext = "(Required when you need to override the shipping settings that you set up in Merchant Center) Google recommends that you set up shipping costs through your Merchant center. However, when you need to override these settings you can map the g:shipping field to the 'Shipping price' attribute.";
			break;
		case "Structured data fix";
			$helptext = "Because of a bug in WooCommerce variable products will get disapproved in Google's Merchant Center. WooCommerce adds the price of the cheapest variable product in the structured data for all variations of a product. Because of this there will be a mismatch between the product price you provide to Google in your Google Shopping product feed and the structured data price on the product landingpage. Google will therefor disapprove the product in its merchant center. You won't be able to advertise on that product in your Google Shopping campaign. Enable this option will fix the structured data on variable product pages by adding the correct variable product price in the JSON-LD structured data so Google will approve the variable products you submitted.";
			break;
		case "Unique identifiers";
			$helptext = "In order to optimise your product feed for Google Shopping and meet all Google's Merchant Center requirements you need to add extra fields / attributes to your products that are not part of WooCommerce by default. Enable this option to get Brand, GTIN, MPN, UPC, EAN, Product condition and optimised title fields";
			break;
		default:
			$helptext = "need information about this field? reach out to support@adtribes.io";
	}

	$data = array (
		'helptext' => $helptext,
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_fieldmapping_dialog_helptext', 'woosea_fieldmapping_dialog_helptext' );

/**
 * Get the dropdowns for the fieldmapping page
 */
function woosea_fieldmapping_dropdown(){
	$channel_hash = sanitize_text_field($_POST['channel_hash']);
	$rowCount = sanitize_text_field($_POST['rowCount']);
        $channel_data = WooSEA_Update_Project::get_channel_data($channel_hash);

        require plugin_dir_path(__FILE__) . '/classes/channels/class-'.$channel_data['fields'].'.php';
        $obj = "WooSEA_".$channel_data['fields'];
        $fields_obj = new $obj;
        $attributes = $fields_obj->get_channel_attributes();
	$field_options = "<option selected></option>";
 	
	foreach($attributes as $key => $value){
		$field_options .= "<option></option>";
		$field_options .= "<optgroup label='$key'><strong>$key</strong>";
		foreach($value as $k => $v){
               		$field_options .= "<option value='$v[feed_name]'>$k ($v[name])</option>";
		}
	}
 
        $attributes_obj = new WooSEA_Attributes;
        $attribute_dropdown = $attributes_obj->get_product_attributes();

	$attribute_options = "<option selected></option>";
   	foreach($attribute_dropdown as $drop_key => $drop_value){
        	$attribute_options .= "<option value='$drop_key'>$drop_value</option>";
	}

	$data = array (
		'field_options' => $field_options,
		'attribute_options' => $attribute_options,
	);

	echo json_encode($data);
	wp_die();
}
add_action( 'wp_ajax_woosea_fieldmapping_dropdown', 'woosea_fieldmapping_dropdown' );

/**
 * Get the attribute dropdowns for category mapping
 */
function woosea_autocomplete_dropdown() {
	$rowCount = sanitize_text_field($_POST['rowCount']);
	
	$mapping_obj = new WooSEA_Attributes;
	$mapping_dropdown = $mapping_obj->get_mapping_attributes_dropdown();

	$data = array (
		'rowCount' => $rowCount,
		'dropdown' => $mapping_dropdown
	);

	echo json_encode($data);
	wp_die();

}
add_action( 'wp_ajax_woosea_autocomplete_dropdown', 'woosea_autocomplete_dropdown' );

/**
 * Autosuggest categories or productnames for category mapping page
 */
function woosea_autocomplete_mapping() {
	$query = sanitize_text_field($_POST['query']);
	$searchin = sanitize_text_field($_POST['searchin']);
	$condition = sanitize_text_field($_POST['condition']);

	$data = array();	
	$data_raw = array();

	// search on exact productname
	if (($searchin == "title") AND ($condition == "=") OR ($condition == "contains")){
		$prods = new WP_Query(
                	array(
				's' => $query,
           			'posts_per_page' => -1,
                         	'post_type' => array('product'),
                              	'post_status' => 'publish',
                            	'fields' => 'ids',
                              	'no_found_rows' => true
                    	)
          	);

                while ($prods->have_posts()) : $prods->the_post();
               		global $product;
			$product_title = $product->get_title();

                     	if(!$product) {
                        	return -1;
                      	}

			if ($product->is_type( 'variable' )) {
				$attrv = $product->get_variation_attributes();
				foreach ($attrv as $ka => $va){
					foreach ($va as $k => $v){
						$data_raw[] = $product_title ." ". ucfirst($v);
					}
				}
			}
            	endwhile;
             	wp_reset_query();	
	// search on exact categoryname
	} elseif (($searchin == "categories") AND ($condition == "=")) {
		$hide_empty = false ;
		$cat_args = array(
			'search'	=> $query,
    			'hide_empty' 	=> $hide_empty,
		);
		$all_categories = get_terms( 'product_cat', $cat_args );
            	foreach($all_categories as $sub_category) {
                	$data_raw[] = $sub_category->name;
            	}   
	} else {
		$data_raw[] = "";
	}

	$data = array_unique($data_raw);
	$data = json_encode($data);
	echo $data;
	wp_die();
}
add_action( 'wp_ajax_woosea_autocomplete_mapping', 'woosea_autocomplete_mapping' );

/**
 * Function for serving different HTML templates while configuring the feed
 * Some cases are left blank for future steps and pages in the configurations process
 */
function woosea_generate_pages(){
	/**
 	* Since WP 4.99 form elements are no longer allowed tags for non-admin users
 	* With the function below we add the form elements again to the allowed tags
 	**/
	if(!function_exists('woosea_add_allowed_tags')) {
        	function woosea_add_allowed_tags($tags) {
                	// form
            	    $tags['form'] = array(
                	        'action' => true,
                        	'accept' => true,
                        	'accept-charset' => true,
                        	'enctype' => true,
                        	'method' => true,
                        	'name' => true,
                        	'target' => true,
                        	'id' => true,
                        	'class' => true,
                	);

                	// input
                	$tags['input'] = array(
                        	'class' => true,
                        	'id'    => true,
                        	'name'  => true,
                        	'value' => true,
                        	'type'  => true,
                	);
                	// select
                	$tags['select'] = array(
                        	'class'  => true,
                        	'id'     => true,
                        	'name'   => true,
                        	'value'  => true,
                        	'type'   => true,
                	);
                	// select options
               	 	$tags['option'] = array(
                        	'selected' => true,
                	);
               	 	return $tags;
        	}
        	add_filter('wp_kses_allowed_html', 'woosea_add_allowed_tags');
	}
	$allowed_tags = wp_kses_allowed_html( 'post' );

	if (!$_POST){
		$generate_step = 0;
	} else {
		$from_post = $_POST;
		$channel_hash = sanitize_text_field($_POST['channel_hash']);
		$step = sanitize_text_field($_POST['step']);	
		$generate_step = $step;
	}

	if (array_key_exists('step', $_GET)){
		if (array_key_exists('step', $_POST)){
			$generate_step = $step;
		} else {
			$generate_step = sanitize_text_field($_GET["step"]);
		}
	}

	if (isset($_GET['channel_hash'])){
		$channel_hash = sanitize_text_field($_GET['channel_hash']);
	}

        /**
         * Get channel information 
         */
	if ($generate_step){
        	$channel_data = WooSEA_Update_Project::get_channel_data($channel_hash);
	}

	/**
	 * Determing if we need to do field mapping or attribute picking after step 0
	 */
	if ($generate_step == 99){
		$generate_step = 7;
	} elseif ($generate_step == 100){
	        /**
       	 	 * Update existing feed configuration with new values from previous step
        	 */
        	$project = WooSEA_Update_Project::reconfigure_project($from_post);
	} elseif ($generate_step == 101){
		/**
         	 * Update project configuration 
         	 */
        	$project_data = WooSEA_Update_Project::update_project($from_post);

        	/**
         	 * Set some last project configs
         	 */
        	$project_data['active'] = true;
        	$project_data['last_updated'] = date("d M Y H:i");
        	$project_data['running'] = "processing";

		$count_variation = wp_count_posts('product_variation');
		$count_single = wp_count_posts('product');
		$published_single = $count_single->publish;
		$published_variation = $count_variation->publish;
		$published_products = $published_single+$published_variation;

        	$project_data['nr_products'] = $published_products;
        	$project_data['nr_products_processed'] = 0;

        	$add_to_cron = WooSEA_Update_Project::add_project_cron($project_data, "donotdo");
        	$batch_project = "batch_project_".$project_data['project_hash'];
        	
		if (!get_option( $batch_project )) {
			// Batch project hook expects a multidimentional array
        		update_option( $batch_project, $project_data);
        		$final_creation = woosea_continue_batch($project_data['project_hash']);
		} else {
        		$final_creation = woosea_continue_batch($project_data['project_hash']);
		}
	}

	/**
	 * Switch to determing what template to use during feed configuration
	 */
	switch($generate_step){
		case 0:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-0.php' );
			break;
		case 1:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-1.php' );
			break;
		case 2:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-2.php' );
			break;
		case 3:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-3.php' );
			break;
		case 4:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-4.php' );
			break;
		case 5:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-5.php' );
			break;
		case 6:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-6.php' );
			break;
		case 7:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-7.php' );
			break;
		case 8:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-statistics-feed.php' );
			break;
		case 9:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-generate-feed-step-9.php' );
			break;
		case 100:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-manage-feed.php' );
			break;
		case 101:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-manage-feed.php' );
			break;
		default:
			load_template( plugin_dir_path( __FILE__ ) . '/pages/admin/woosea-manage-feed.php' );
			break;
	}
}

/**
 * This function copies feed configurations from another domain
 * so users do not have to re-configure feeds for all their domains
 * Other domain need to explicitly allow this 
 */
function woosea_copy_configurations(){


	$domain = "oplader.org";

	$curl = curl_init();
	$url = "http://$domain/wp-content/uploads/woo-product-feed-pro/logs/debug.log";
	
	curl_setopt_array($curl, array(
     		CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_USERAGENT => 'AdTribes license cURL Request'
        ));
        $response = curl_exec( $curl );
        curl_close($curl);

	error_log("RESPONSE");
	error_log($respons);

       	$json_return = json_decode($response, true);
}

/**
 * Function used by event scheduling to create feeds 
 * Feed can automatically be generated every hour, twicedaiy or once a day
 */
function woosea_create_all_feeds(){
	$feed_config = array();
	$feed_config = get_option( 'cron_projects' );
	if(empty($feed_config)){
		$nr_projects = 0;
	} else {
		$nr_projects = count($feed_config);
	}
	$cron_start_date = date("d M Y H:i");	
	$cron_start_time = time();
	$hour = date('H');

	// Update project configurations with the latest amount of live products
        $count_products = wp_count_posts('product', 'product_variation');
        $nr_products = $count_products->publish;

	// Determine if changes where made to products or new orders where placed
 	// Only update the feed(s) when such a change occured
	$products_changes = get_option('woosea_allow_update');
	
	if(!empty($feed_config)){	
		foreach ( $feed_config as $key => $val ) {

			// Force garbage collection dump
			gc_enable();
			gc_collect_cycles();

			// Only process projects that are active
			if(($val['active'] == "true") AND (!empty($val)) AND (isset($val['cron']))){		

				if (($val['cron'] == "daily") AND ($hour == 07)){
					$batch_project = "batch_project_".$val['project_hash'];
                        		if (!get_option( $batch_project )){
                                		update_option( $batch_project, $val);
						$start_project = woosea_continue_batch($val['project_hash']);
					} else {
						$start_project = woosea_continue_batch($val['project_hash']);
					}
					unset($start_project);	
				} elseif (($val['cron'] == "twicedaily") AND ($hour == 19 || $hour == 07)){
					$batch_project = "batch_project_".$val['project_hash'];
                        		if (!get_option( $batch_project )){
                                		update_option( $batch_project, $val);
						$start_project = woosea_continue_batch($val['project_hash']);
					} else {
						$start_project = woosea_continue_batch($val['project_hash']);
					}
					unset($start_project);	
				} elseif (($val['cron'] == "twicedaily" || $val['cron'] == "daily") AND ($val['running'] == "processing")){
					// Re-start daily and twicedaily projects that are hanging
					$batch_project = "batch_project_".$val['project_hash'];
                        		if (!get_option( $batch_project )){
                                		update_option( $batch_project, $val);
						$start_project = woosea_continue_batch($val['project_hash']);
					} else {
						$start_project = woosea_continue_batch($val['project_hash']);
					}
					unset($start_project);
				} elseif (($val['cron'] == "no refresh") AND ($hour == 26)){
					// It is never hour 26, so this project will never refresh
				} elseif ($val['cron'] == "hourly") {
					$batch_project = "batch_project_".$val['project_hash'];
                        		if (!get_option( $batch_project )){
                                		update_option( $batch_project, $val);
						$start_project = woosea_continue_batch($val['project_hash']);
					} else {
						$start_project = woosea_continue_batch($val['project_hash']);
					}
					unset($start_project);	
				}
			}
		}
	}
}

/**
 * Update product amounts for project
 */
function woosea_nr_products($project_hash, $nr_products){
	$feed_config = get_option( 'cron_projects' );

	foreach ( $feed_config as $key => $val ) {
		if ($val['project_hash'] == $project_hash){
			$feed_config[$key]['nr_products'] = $nr_products;
		}
	}
	update_option( 'cron_projects', $feed_config);
}

/**
 * Update cron projects with last update timestamp
 */
function woosea_last_updated($project_hash){
	$feed_config = get_option( 'cron_projects' );

	$last_updated = date("d M Y H:i");

	foreach ( $feed_config as $key => $val ) {
		if ($val['project_hash'] == $project_hash){
        		$upload_dir = wp_upload_dir();
        		$base = $upload_dir['basedir'];
        		$path = $base . "/woo-product-feed-pro/" . $val['fileformat'];
        		$file = $path . "/" . sanitize_file_name($val['filename']) . "." . $val['fileformat'];

			$last_updated = date("d M Y H:i");

			if (file_exists($file)) {
				$last_updated = date("d M Y H:i", filemtime($file));
				$feed_config[$key]['last_updated'] = date("d M Y H:i", filemtime($file));
			} else {
				$feed_config[$key]['last_updated'] = date("d M Y H:i");
			}
		}
	}

	update_option( 'cron_projects', $feed_config);
	return $last_updated;
}

/**
 * Track user and channel conversions
 */
function woosea_track_conversion () {
	$save_conversion = "no";

	// First check if adTribesID cookie is active
	if(isset($_COOKIE['adTribesID'])) {
		$adTribesID = $_COOKIE['adTribesID'];
		$utm_source = ""; // we did not save the utm values in cookies
		$utm_campaign = "";
		$utm_medium = "";
		$utm_term = "";
		$save_conversion = "yes";
	// Or conversion is trackes in session
	} elseif(!empty($_POST['adTribesID'])) {
		$adTribesID = sanitize_text_field($_POST['adTribesID']);
		$utm_source = sanitize_text_field($_POST['utm_source']);
		$utm_campaign = sanitize_text_field($_POST['utm_campaign']);
		$utm_medium = sanitize_text_field($_POST['utm_medium']);
		$utm_term = sanitize_text_field($_POST['utm_term']);
		$save_conversion = "yes";
	}
	
	if($save_conversion == "yes"){
		list($project_hash, $plugin, $productId) = explode('|', $adTribesID);
		
		if((!empty($productId)) AND ($productId > 0)){
			$conversion_timestamp = date("j-n-Y G:i:s");

			// Insert the conversion data into the MySql conversion table
			global $wpdb;
       	 		$charset_collate = $wpdb->get_charset_collate();
        		$table_name = $wpdb->prefix . 'adtribes_my_conversions';

			// Get the last order ID
        		$orderId = get_option( 'last_order_id' );
			$inserted_id = 0;
			$success = "no";

			// Check if order was not inserted before inserting it.
			$orderId_check = $wpdb->get_results("SELECT * FROM $table_name WHERE orderId = '".$orderId."'");

			if($wpdb->num_rows == 0){
				$wpdb->insert($table_name, 
						array(
							'conversion_time' => current_time('mysql' , 1),
							'project_hash' => $project_hash,
							'utm_source' => $utm_source,
							'utm_campaign' => $utm_campaign,
							'utm_medium' => $utm_medium,
							'utm_term' => $utm_term,
							'productId' => $productId,
							'orderId' => $orderId		
						),
						array(
							'%s',
							'%s',
							'%s',
							'%s',
							'%s',
							'%s',
							'%d',
							'%d'
						)
				);

				$inserted_id = $wpdb->insert_id;
			}
	
			if($inserted_id > 0){
				$success = "yes";
			}

			$data = array (
				"conversion_saved" => $success,
			);

		        $data = json_encode($data);
		        echo $data;
		        wp_die();
		}
	}
}
add_action( 'wp_ajax_woosea_track_conversion','woosea_track_conversion');
add_action( 'wp_ajax_nopriv_woosea_track_conversion','woosea_track_conversion');

/**
 * Set tracking cookies
 */
function woosea_set_cookie () {

	if(!empty($_POST['adTribesID'])) {
		$adTribesID = sanitize_text_field($_POST['adTribesID']);

		// Conversion cookie will expire in 30 days from now. Make this configurable later.
		$number_of_days = 30;
		$date_of_expiry = time() + 60 * 60 *24 * $number_of_days;
		setcookie('adTribesID', $adTribesID, $date_of_expiry);

		$success = "yes";
		$data = array (
			"cookie_set" => $success,
		);

	        $data = json_encode($data);
	        echo $data;
	        wp_die();
	}
}
add_action( 'wp_ajax_woosea_set_cookie','woosea_set_cookie');
add_action( 'wp_ajax_nopriv_woosea_set_cookie','woosea_set_cookie');

/**
 * Process next batch for product feed
 */
function woosea_continue_batch($project_hash){
	$batch_project = "batch_project_".$project_hash;
	$val = get_option( $batch_project );
	
	if ((!empty($val)) AND (is_array($val))){
		$line = new WooSEA_Get_Products;
       		$final_creation = $line->woosea_get_products( $val );
        	$last_updated = woosea_last_updated( $val['project_hash'] );

		// Clean up the single event project configuration
		unset($line);
		unset($final_creation);
		unset($last_updated);
	}
}
add_action( 'woosea_create_batch_event','woosea_continue_batch', 1, 1);

/**
 * This function saves the status of a product before changes are made to it
 * We need this to determine if a product is updated and thus feeds need to refresh
 */
function woosea_before_product_save( $post_id ) {
	$post_type = get_post_type($post_id);
	if($post_type == "product"){
		$product = wc_get_product( $post_id );
		
		if(is_object($product)){
			$product_data = $product->get_data();

			$before = array(
				"product_id"		=> 	$post_id,
				"type"			=> 	$product->get_type(),
				"name"			=> 	$product->get_name(),
				"slug"			=> 	$product->get_slug(),
				"status"		=> 	$product->get_status(),
				"featured"		=> 	$product->get_featured(),
				"visibility"		=> 	$product->get_catalog_visibility(),
				"description"		=> 	$product->get_description(),
				"short_description"	=> 	$product->get_short_description(),			
				"sku"			=> 	$product->get_sku(),
				"price"			=> 	$product->get_price(),
				"regular_price"		=> 	$product->get_regular_price(),
				"sale_price"		=> 	$product->get_sale_price(),
				"total_sales"		=> 	$product->get_total_sales(),
				"tax_status"		=> 	$product->get_tax_status(),
				"tax_class"		=> 	$product->get_tax_class(),
				"manage_stock"		=> 	$product->get_manage_stock(),
				"stock_quantity"	=> 	$product->get_stock_quantity(),
				"stock_status"		=> 	$product->get_stock_status(),
				"backorders"		=> 	$product->get_backorders(),
				"weight"		=>	$product->get_weight(),
				"length"		=>	$product->get_length(),
				"width"			=>	$product->get_width(),
				"height"		=>	$product->get_height(),
				"parent_id"		=>	$product->get_parent_id(),
			);

			if(!get_option('product_changes')){
				update_option('product_changes',$before,'','yes');
			}	
		}
	}
}
add_action('pre_post_update','woosea_before_product_save');

/**
 * Detect changes made to products
 * When no changes are made feed(s) do not need to get updated
 */
function woosea_on_product_save( $product_id ) {
	$product = wc_get_product( $product_id );

	if(is_object($product)){
		$product_data = $product->get_data();
               
		$after = array(
        		"product_id"            =>      $product_id,
	               	"type"                  =>      $product->get_type(),
        	      	"name"                  =>      $product->get_name(),
	              	"slug"                  =>      $product->get_slug(),
        	      	"status"                =>      $product->get_status(),
         	     	"featured"              =>      $product->get_featured(),
             		"visibility"            =>      $product->get_catalog_visibility(),
	             	"description"           =>      $product->get_description(),
    	         	"short_description"     =>      $product->get_short_description(),
 	             	"sku"                   =>      $product->get_sku(),
	             	"price"                 =>      $product->get_price(),
 	             	"regular_price"         =>      $product->get_regular_price(),
 	          	"sale_price"            =>      $product->get_sale_price(),
	            	"total_sales"           =>      $product->get_total_sales(),
  	          	"tax_status"            =>      $product->get_tax_status(),
	             	"tax_class"             =>      $product->get_tax_class(),
 	            	"manage_stock"          =>      $product->get_manage_stock(),
 	           	"stock_quantity"        =>      $product->get_stock_quantity(),
 	            	"stock_status"          =>      $product->get_stock_status(),
  	            	"backorders"            =>      $product->get_backorders(),
  	            	"sold_individually"     =>      $product->get_sold_individually(),
 	             	"weight"                =>      $product->get_weight(),
 	            	"length"                =>      $product->get_length(),
   	         	"width"                 =>      $product->get_width(),
 	            	"height"                =>      $product->get_height(),
 	            	"parent_id"             =>      $product->get_parent_id(),
	   	);   

		if (is_array($product_data)){

			if(get_option('product_changes')){
				$before = get_option('product_changes');
				$diff = array_diff($after, $before);
				if(!$diff){
					$diff['product_id'] = $product_id;
				} else {
					// Enable the prodyct changed flag
			        	update_option('woosea_allow_update', 'yes');
				}
				delete_option('product_changes');
			} else {
				// Enable the prodyct changed flag
				update_option('woosea_allow_update', 'yes');
			}
		}
	}
}
add_action( 'woocommerce_update_product', 'woosea_on_product_save', 10, 1 );

/**
 * Function with initialisation of class for managing existing feeds
 */
function woosea_manage_feed(){
	$html = new Construct_Admin_Pages();
	$html->set_page("woosea-manage-feed");
	echo $html->get_page();
}

/**
 * Function with initialisation of class for managing plugin settings
 */
function woosea_manage_settings(){
	$html = new Construct_Admin_Pages();
	$html->set_page("woosea-manage-settings");
	echo $html->get_page();
}

/**
 * Function with initialisation of class for the upgrade to Elite page
 */
function woosea_upgrade_elite(){
	$html = new Construct_Admin_Pages();
	$html->set_page("woosea-key");
	echo $html->get_page();
}

/**
 * Function for emptying all projects in cron at once
 * Kill-switch for all configured projects, be carefull!
 */
function woosea_clear(){
	$html = new Construct_Admin_Pages();
	$html->set_page("woosea-clear");
	delete_option( 'cron_projects' );
	echo $html->get_page();
}

/**
 * Add plugin links to Wordpress menu
 */
add_action( 'admin_menu' , 'woosea_menu_addition' );

/**
 * Register all dashboard metaboxes
*/

function woosea_blog_widgets() {
	global $wp_meta_boxes;
	
	add_meta_box('woosea_rss_dashboard_widget', __('Latest Product Feed Pro Tutorials', 'rc_mdm'), 'woosea_my_rss_box','dashboard','side','high');
}
add_action('wp_dashboard_setup', 'woosea_blog_widgets');

/**
 * Creates the RSS metabox
 */
function woosea_my_rss_box() {
	
	// Get RSS Feed(s)
	include_once(ABSPATH . WPINC . '/feed.php');
        $domain = $_SERVER['HTTP_HOST'];
	
	// My feeds list (add your own RSS feeds urls)
	$my_feeds = array( 
		'https://www.adtribes.io/feed/' 
	);
	
	// Loop through Feeds
	foreach ( $my_feeds as $feed) :
		// Get a SimplePie feed object from the specified feed source.
		$rss = fetch_feed( $feed );
		
		$maxitems = 0;
		$rss_items = array();
		$rss_title = "";

		if (!is_wp_error( $rss ) ) : // Checks that the object is created correctly 
			// Figure out how many total items there are, and choose a limit 
		    	$maxitems = $rss->get_item_quantity( 5 ); 
		
		    	// Build an array of all the items, starting with element 0 (first element).
		    	$rss_items = $rss->get_items( 0, $maxitems ); 
	
		    	// Get RSS title
		    	$rss_title = '<a href="'.$rss->get_permalink().'" target="_blank">'.strtoupper( $rss->get_title() ).'</a>'; 
			//endif;
	
			// Display the container
			echo '<div class="rss-widget">';
			echo '<strong>'.$rss_title.'</strong>';
			echo '<hr style="border: 0; background-color: #DFDFDF; height: 1px;">';
		
			// Starts items listing within <ul> tag
			echo '<ul>';
		
			// Check items
			if ( $maxitems == 0 ) {
				echo '<li>'.__( 'No item', 'rc_mdm').'.</li>';
			} else {
				// Loop through each feed item and display each item as a hyperlink.
				foreach ( $rss_items as $item ) :
					// Uncomment line below to display non human date
					//$item_date = $item->get_date( get_option('date_format').' @ '.get_option('time_format') );
				
					// Get human date (comment if you want to use non human date)
					$item_date = human_time_diff( $item->get_date('U'), current_time('timestamp')).' '.__( 'ago', 'rc_mdm' );
				
					// Start displaying item content within a <li> tag
					echo '<li>';
					// create item link
					echo '<a href="'.esc_url( $item->get_permalink() ).'?utm_source='.$domain.'&utm_medium=plugin&utm_campaign=dashboard-rss" title="'.$item_date.'" target="_blank">';
					// Get item title
					echo esc_html( $item->get_title() );
					echo '</a>';
					// Display date
					echo ' <span class="rss-date">'.$item_date.'</span><br />';
					// Get item content
					$content = $item->get_content();
					// Shorten content
					$content = wp_html_excerpt($content, 120) . ' [...]';
					// Display content
					echo $content;
					// End <li> tag
					echo '</li>';
				endforeach;
			}
			// End <ul> tag
			echo '</ul>';
			echo '<hr style="border: 0; background-color: #DFDFDF; height: 1px;">';
			echo '<a href="https://adtribes.io/tutorials/?utm_source='.$domain.'&utm_medium=plugin&utm_campaign=dashboard-rss" target="_blank">More tutorials on our website</a>';
			echo '</div>';
		endif;
	endforeach; // End foreach feed
}
?>
