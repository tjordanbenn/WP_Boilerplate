<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            







<?php endwhile; endif; ?>

<?php if (function_exists('bones_page_navi')) { ?>
     <?php bones_page_navi(); ?>
<?php } ?>



<?php get_footer(); ?>
