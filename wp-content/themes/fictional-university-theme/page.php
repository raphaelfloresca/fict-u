<?php 

    get_header();

    // Loop through the posts
    while ( have_posts() ) {
        // Return the post
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                <p>TODO: Replace with custom field</p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            <?php 
                // Get the ID of the parent page
                $theParentID = wp_get_post_parent_id(get_the_ID());

                // Only render the breadcrumb box if a parent page existss
                if ($theParentID) { ?>
                    <div class="metabox metabox--position-up metabox--with-home-link">
                        <p>
                            <a class="metabox__blog-home-link" href="<?php echo get_permalink( $theParentID ); ?>">
                                <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title( $theParentID ); ?>
                            </a>
                            <span class="metabox__main"><?php the_title(); ?></span>
                        </p>
                    </div>
                <?php }
            ?>

            <?php 
                // Return an array of child pages given a parent page. If array is empty, then there are no children
                $testArray = get_pages(array(
                    'child_of' => get_the_ID()
                ));

                // Check if on a child or parent page
                if ($theParentID or $testArray) {
            ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_permalink($theParentID); ?>"><?php echo get_the_title($theParentID); ?></a></h2>
                <ul class="min-list">
                    <!-- Render the relevant parent and child pages as a sidebar -->
                    <?php 
                        if ( $theParentID ) {
                            $parentPage = $theParentID;
                        } else {
                            $parentPage = get_the_ID();
                        }
                        wp_list_pages(
                            array(
                                'title_li' => NULL,
                                'child_of' => $parentPage
                            )
                        );
                    ?>
                </ul>
            </div>

            <?php } ?>

            <div class="generic-content">
                <?php the_content(); ?>
            </div>

        </div>

    <?php }

    get_footer();

?>