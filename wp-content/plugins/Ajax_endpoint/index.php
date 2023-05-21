<?php
/**
* Plugin Name: Ajax Endpoint
* Plugin URI: https://www.your-site.com/
* Description: It will return Ajax endpoint API result in json 
* Version: 0.1
* Author: Sohaib Jalil
* Author URI: https://www.your-site.com/
**/
//(?P<id>\d+)
add_action( 'rest_api_init', function () {
  register_rest_route( 'api/v1', '/projects/', array(
    'methods' => 'GET',
    'callback' => 'get_projects',
  ) );
} );
function get_projects( $data ) {
	$data=array();
  	$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if($conn->connect_error)
	{
	  	die("Connection failed: " . $conn->connect_error);
	}
	else
	{
		$limit = 3;
		if ( is_user_logged_in() )
		{
			$limit = 6;
		}
		$sql = "SELECT ID as id, post_title as title,guid as link FROM `wp_posts` left join wp_term_relationships on wp_term_relationships.object_id = wp_posts.id WHERE post_status='publish' and wp_term_relationships.term_taxonomy_id = 3 limit ".$limit;
		//echo $sql;
		$result = $conn -> query($sql);
	    if($result)
	    {
	        while($row = mysqli_fetch_assoc($result)) {
			   array_push($data, $row);
			}
		}
	}
	$object = new stdClass();
	$object->success = true;
	$object->data=  $data	;
	wp_send_json($object,200);
}
