<!-- Dropdown to select one post from content type -- (ex.sidebar) -->

    <?php if( get_field('sidebar_block_2') ): ?><?php
    $post_object = get_field('sidebar_block_2');
    if( $post_object ): 
        // override $post
        $post = $post_object;
        setup_postdata( $post ); 
    ?>

          <!-- **content here** -->


    <?php wp_reset_postdata(); ?>
    <?php endif; ?>
    <?php endif; ?>


<!-- Site Url  - -->         <?php echo home_url(); ?>
<!-- Site Root - -->         <?php echo get_template_directory_uri(); ?>
<!-- Title -  -->            <?php the_title() ?>
<!-- Excerpt w/ Limit -  --> <?php echo get_exerpt(100) ?>
<!-- Permalink -  -->        <?php the_permalink() ?>
<!-- Header -  -->           <?php get_header(); ?>
<!-- Footer -  -->           <?php get_footer(); ?>
                             <?php the_field(''); ?>
<!-- Name a Template - -->   <?php /* Template Name: Internal No Sidebar */ ?>

<!-- The Loop -- -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- **Content Here** -->
<?php endwhile; endif; ?>

<!-- Get Navigation --  -->
<?php wp_nav_menu(array(
     'container' => false,                                  
     'menu' => __( 'Main Menu', 'bonestheme' ),  
     'menu_class' => 'mainNavigation',               
     'theme_location' => 'main-nav', 
)); ?>

<?php if( have_rows('repeater_field_name') ): ?>

<?php while ( have_rows('repeater_field_name') ) : the_row(); ?>

    <?php the_sub_field('sub_field_name'); ?>

<?php endwhile; endif; ?>


