<?php get_header(); ?>


<section class="title-section">
    <div class="desktop-spacer"></div>
    <div class="title-container">
        <h1>Hard Hat Blog</h1>
    </div>
    <div class="mobile-title-bg"></div>
    <?php if( get_field('subheadline') ): ?>
    <div class="sub-title-container">
        <div class="sub-title-wrapper">
            <p><?php the_field('subheadline'); ?></p>
        </div>
    </div>
    <?php endif; ?>
</section>

<section class="main-content-section">
<div class="main-content-wrapper">

<h1>Posts By <?php single_cat_title( __( '', '' ) ); ?></h1>
<?php 
$queried_object = get_queried_object();
$term_slug = $queried_object->slug; ?>

<?php
$args = array(
     'posts_per_page' => 1,
     'post_type' => 'team_members',
     'blog_author' => $term_slug
);
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
    <p>
        <a href="<?php the_permalink(); ?>">View <?php the_field('nickname');?>'s Profile</a>
    </p>
<?php endforeach; 
wp_reset_postdata();?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php if ( 'blog' == get_post_type( get_the_ID() ) ) : ?>

    <div class="blog-box">
        <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <p><span>
            <?php the_date(); ?> |  
            <?php echo get_the_term_list( get_the_ID(), 'blog_cat', '', ', ' ); ?></span></p>

        <p><?php the_excerpt(); ?></p>
    </div>

    <?php endif; ?>
<?php endwhile; endif; ?>

    <?php if (function_exists('bones_page_navi')) { ?>
         <?php bones_page_navi(); ?>
    <?php } ?>

    <a href="<?php echo home_url(); ?>/hardhatblog/" class="button">Back to All Blog posts</a>
</div>
<div class="sidebar-wrapper">
    <div class="sidebar-block">
        <h2>AUTHORS</h2>
        <?php
            $args = array( 'hide_empty=0' );
 
            $terms = get_terms( 'blog_author', $args );
            if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                $count = count( $terms );
                $i = 0;
                $term_list = '<ul>';
                foreach ( $terms as $term ) {
                    $i++;
                    $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( '' ), $term->name ) ) . '">' . $term->name . '</a></li>';
                    if ( $count != $i ) {
                       
                    }
                    else {
                        $term_list .= '</ul>';
                    }
                }
                echo $term_list;
            }
        ?>
        <!-- </ul> -->
    </div>

<div class="sidebar-block">
        <h2>CATEGORIES</h2>
        <?php
            $args = array( 'hide_empty=0' );
 
$terms = get_terms( 'blog_cat', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<ul>';
    foreach ( $terms as $term ) {
        $i++;
        $term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( '' ), $term->name ) ) . '">' . $term->name . '</a></li>';
        if ( $count != $i ) {
           
        }
        else {
            $term_list .= '</ul>';
        }
    }
    echo $term_list;
}
        ?>

    </div>

    <div class="sidebar-block">
        <h2>SIGN UP FOR UPDATES</h2>
        <div class="my_gform">
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]') ?>
        </div>
    </div>

</section>

<section class="contact-us-bar">
<a href="<?php echo home_url(); ?>/contact-us/">
    <div class="contact-us-content">
        <div class="contact-bar-div">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mark.svg" alt="">
        </div>
        <div class="contact-bar-text">
            <h2>Contact Us</h2>
        </div>
    </div>
</a>
</section>


<?php get_footer(); ?>
