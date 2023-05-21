<?php
/**
* Plugin Name: Random Coffee Cup
* Plugin URI: https://www.your-site.com/
* Description: It will display random coffee cup image
* Version: 0.1
* Author: Sohaib Jalil
* Author URI: https://www.your-site.com/
**/
//add_action( 'init', 'hs_give_me_coffee', 0 );

function hs_give_me_coffee() {
	$response = wp_remote_get( 'https://coffee.alexflipnote.dev/random.json' );
	$body     = wp_remote_retrieve_body( $response );
	$json = json_decode($body, true);
	$coffeeCup = $json['file'];
	return $coffeeCup;
}
?>