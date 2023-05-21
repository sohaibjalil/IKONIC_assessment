<?php
/**
* Plugin Name: Custom Redirect
* Plugin URI: https://www.your-site.com/
* Description: Redirect certain IP range.
* Version: 0.1
* Author: Sohaib Jalil
* Author URI: https://www.your-site.com/
**/
add_action( 'init', 'redirect_certain_ips', 0 );

function redirect_certain_ips() {
	$userIp = $_SERVER['REMOTE_ADDR']; //"77.29.5.6";
	$ip_ban = ["77\.29\.\d\.\d"];
	foreach($ip_ban as $ban) 
	{
	    if(\preg_match("/$ban/", $userIp)) 
	    {
	        wp_redirect("http://www.google.com/");
	        exit;
	    }
	}
    return 0;
}