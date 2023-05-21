<?php
/**
* Plugin Name: Custom Post type projects
* Plugin URI: https://www.your-site.com/
* Description: Registering Taxonomy.
* Version: 0.1
* Author: your-name
* Author URI: https://www.your-site.com/
**/
function projects_init() { 
$args = array( 
'label' => 'Projects', 
'public' => true,
'has_archive' => true, 
'show_ui' => true, 
'capability_type' => 'post', 
'hierarchical' => false, 
'rewrite' => array('slug' => 'projects'), 
'query_var' => true, 
'menu_icon' => 'dashicons-admin-post', 
'supports' => array( 
'title', 
'editor', 
'excerpt', 
'trackbacks', 
'custom-fields', 
'comments', 
'revisions', 
'thumbnail', 
'author', 
'page-attributes',) 
); 
register_post_type( 'projects', $args ); 
} 
add_action( 'init', 'projects_init' );

add_action( 'init', 'project_type_taxonomy', 0 );
function project_type_taxonomy() {
 $labels = array(
   'name' =>_x( 'Projects Type', 'taxonomy general name' ),
   'singular_name' =>_x( 'Project Type', 'taxonomy singular name' ),
   'search_items' =>__( 'Search Project Types' ),
   'all_items' =>__( 'All Project Types' ),
   'parent_item' =>__( 'Parent Project Type' ),
   'parent_item_colon' =>__( 'Parent Project Type:' ),
   'edit_item' =>__( 'Edit Project Type' ),
   'update_item' =>__( 'Update Project Type' ),
   'add_new_item' =>__( 'Add New Project Type' ),
   'new_item_name' =>__( 'New Project Type Name' ),
   'menu_name' =>__( 'Project Type' ),
 );  
// Now register the taxonomy
 register_taxonomy('project_types',array('projects'), array(
   'hierarchical' =>true,
   'labels' =>$labels,
   'show_ui' =>true,
   'show_admin_column' =>true,
   'query_var' =>true,
   'rewrite' =>array( 'slug' => 'project_types' ),
 ));
}
?>