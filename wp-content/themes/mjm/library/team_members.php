<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
    flush_rewrite_rules();
}


// let's create the function for the custom type
function team_members() { 
    // creating (registering) the custom type 
    register_post_type( 'team_members', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Team Members', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'Team Member', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Team Members', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New Team Member', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit Team Member', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New Team Member', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View Team Member', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Team Members', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'description' => __( 'Team Member', 'bonestheme' ), /* Custom Type Description */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
            //'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'team-members', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'team-members', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
        ) /* end of options */
    ); /* end of register post type */

    register_taxonomy_for_object_type( 'team_members_cat', 'team_members' );
    
}

    // adding the function to the Wordpress init
    add_action( 'init', 'team_members');

    // now let's add custom categories (these act like categories)
    register_taxonomy( 'team_members_cat', 
        array('team_members'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */
            'labels' => array(
                'name' => __( 'Team Member Categories', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Team Member Category', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Team Member Categories', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Team Member Categories', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Team Member Category', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Team Member Category:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Team Member Category', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Team Member Category', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Team Member Category', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Team Member Category Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'team-member' ),
        )
    );

?>
