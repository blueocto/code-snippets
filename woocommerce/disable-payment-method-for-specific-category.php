<?php
/**
* @snippet       Disable Payment Method for Specific Category
* @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
* @sourcecode    https://businessbloomer.com/?p=19892
* @author        Rodolfo Melogli
* @testedwith    WooCommerce 3.3.4
*/

add_filter( 'woocommerce_available_payment_gateways', 'bbloomer_unset_gateway_by_category' );

function bbloomer_unset_gateway_by_category( $available_gateways ) {
	global $woocommerce; 
	$unset = false; 
	$category_ids = array( 61, 62 ); 
	foreach ( $woocommerce->cart->cart_contents as $key => $values ) { 
		$terms = get_the_terms( $values['product_id'], 'product_cat' ); 
		foreach ( $terms as $term ) { 
			if ( in_array( $term->term_id, $category_ids ) ) { 
				$unset = true; 
				break;
			}
		}
	}
	if ( $unset == false ) unset( $available_gateways['gocardless'] ); 
	return $available_gateways;
	
}
