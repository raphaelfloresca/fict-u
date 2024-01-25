<?php 

    get_header();

    // Loop through the posts
    while ( have_posts() ) {
        // Return the post
        the_post(); ?>
        <!-- Have the title link to the single page -->
        <h2><?php the_title(); ?></h2>
        <!-- Return the content -->
        <?php the_content(); ?>
    <?php }

    get_footer();

?>