<?php
/**
* Plugin Name: Restrict Content Pro - Currency Rupiah
* Plugin URI: https://github.com/superpikar/rcp-currency-rupiah
* Description: Add "Rupiah" currency to Restrict Content Pro 
cpns.
* Version: 1.0
* Author: Dzulfikar Adi Putra
* Author URI: http://pikarlabs.com
**/

/**
 * @see 
https://www.dreamhost.com/blog/how-to-create-your-first-wordpress-plugin/juhhnnyhhujijoliliikkpolikrfdfredwsdgh
 */

/**
 * add additional currency code in content restric pro
 * @see 
https://docs.restrictcontentpro.com/article/1698-registering-currency-codes
 */
function pw_rcp_custom_currency( $currencies ) {
	$currencies['IDR'] = 'Indonesian Rupiah (Rp.)';
	return $currencies;
}

function ag_rcp_idr_currency_filter_before( $formatted_price, 
$currency_code, $price ) {
  return 'Rp.'. ' '.$price;
}
function ag_rcp_idr_currency_filter_after( $formatted_price, 
$currency_code, $price ) {
  return $price.' '.'IDR';
}

add_filter( 'rcp_currencies', 'pw_rcp_custom_currency' );
add_filter( 'rcp_idr_currency_filter_after', 
'ag_rcp_idr_currency_filter_after', 10, 3 );
add_filter( 'rcp_idr_currency_filter_before', 
'ag_rcp_idr_currency_filter_before', 10, 3 );
