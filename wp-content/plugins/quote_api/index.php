<?php
/**
* Plugin Name: Quoute API
* Plugin URI: https://www.your-site.com/
* Description: It will display 5 quotes on a page
* Version: 0.1
* Author: Sohaib Jalil
* Author URI: https://www.your-site.com/
**/
//add_action( 'init', 'show_quotes', 0 );

function show_quotes() {
	for ($i=1; $i < 6; $i++) { 
		$response = wp_remote_get( 'https://api.kanye.rest/' );
		$body     = wp_remote_retrieve_body( $response );
		$json = json_decode($body, true);
		$Quote = $json['quote'];
		echo "Quote $i: ".$Quote."<br><br>";
	}
}

