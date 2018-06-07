<?php
// Flush rewrite rules for custom post types
// add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );
// Flush your rewrite rules
// function bones_flush_rewrite_rules() {
//     flush_rewrite_rules();
// }
// let's create the function for the custom type
function blog() { 
    // creating (registering) the custom type 
    register_post_type( 'blog', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
        // let's now add all the options for this post type
        array( 'labels' => array(
            'name' => __( 'Blogs', 'bonestheme' ), /* This is the Title of the Group */
            'singular_name' => __( 'blog', 'bonestheme' ), /* This is the individual type */
            'all_items' => __( 'All Blogs', 'bonestheme' ), /* the all items menu item */
            'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
            'add_new_item' => __( 'Add New blog', 'bonestheme' ), /* Add New Display Title */
            'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
            'edit_item' => __( 'Edit blog', 'bonestheme' ), /* Edit Display Title */
            'new_item' => __( 'New blog', 'bonestheme' ), /* New Display Title */
            'view_item' => __( 'View blog', 'bonestheme' ), /* View Display Title */
            'search_items' => __( 'Search Blogs', 'bonestheme' ), /* Search Custom Type Title */ 
            'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */ 
            'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
            ), /* end of arrays */
            'description' => __( 'blog', 'bonestheme' ), /* Custom Type Description */
            'public' => true,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'show_ui' => true,
            'query_var' => true,
            'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */ 
            //'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
            'rewrite'   => array( 'slug' => 'blogs', 'with_front' => false ), /* you can specify its url slug */
            'has_archive' => 'blogs', /* you can rename the slug here */
            'capability_type' => 'post',
            'hierarchical' => false,
            /* the next one is important, it tells what's enabled in the post editor */
            'supports' => array( 'title', 'editor', 'author', 'sticky')
        ) /* end of options */
    ); /* end of register post type */

    register_taxonomy_for_object_type( 'blog_cat', 'blog' );
    register_taxonomy_for_object_type( 'blog_author', 'blog' );
    register_taxonomy_for_object_type( 'blog_author', 'team_members' );
    
}
    // adding the function to the Wordpress init
    add_action( 'init', 'blog');

    // now let's add custom categories (these act like categories)
    register_taxonomy( 'blog_cat', 
        array('blog'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */
            'labels' => array(
                'name' => __( 'Blog Categories', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Blog Category', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Blog Categories', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Blog Categories', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Blog Category', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Blog Category:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Blog Category', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Blog Category', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Blog Category', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Blog Category Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'category' ),
        )
    );
    
    // now let's add custom categories (these act like categories)
    register_taxonomy( 'blog_author', 
        array('blog'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
        array('hierarchical' => true,     /* if this is true, it acts like categories */
            'labels' => array(
                'name' => __( 'Blog Authors', 'bonestheme' ), /* name of the custom taxonomy */
                'singular_name' => __( 'Blog Category', 'bonestheme' ), /* single taxonomy name */
                'search_items' =>  __( 'Search Blog Authors', 'bonestheme' ), /* search title for taxomony */
                'all_items' => __( 'All Blog Authors', 'bonestheme' ), /* all title for taxonomies */
                'parent_item' => __( 'Parent Blog Author', 'bonestheme' ), /* parent title for taxonomy */
                'parent_item_colon' => __( 'Parent Blog Author:', 'bonestheme' ), /* parent taxonomy title */
                'edit_item' => __( 'Edit Blog Author', 'bonestheme' ), /* edit custom taxonomy title */
                'update_item' => __( 'Update Blog Author', 'bonestheme' ), /* update title for taxonomy */
                'add_new_item' => __( 'Add New Blog Author', 'bonestheme' ), /* add new title for taxonomy */
                'new_item_name' => __( 'New Blog Author Name', 'bonestheme' ) /* name title for taxonomy */
            ),
            'show_admin_column' => true, 
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'blog_author' ),
        )
    );
?>