﻿<?php get_header(); ?>

    <div class="wrap">
        <?php if ( is_home() && ! is_front_page() ) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
        <?php else : ?>
            <header class="page-header">
                <h2 class="page-title"><?php _e( 'Posts', 'twentyseventeen' ); ?></h2>
            </header>
        <?php endif; ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                if ( have_posts() ) :

                    /* Start the Loop */


                else :

                    get_template_part( 'template-parts/post/content', 'none' );

                endif;
                ?>

            </main><!-- #main -->
        </div><!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
