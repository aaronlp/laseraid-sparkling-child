<?php
/**
 * Template Name: Full-width (no sidebar or margin)
 *
 * This is the template that displays full width page without sidebar and gets rid of top margins.
 *
 * @package sparkling
 */

get_header(); ?>
</div>
<div class="main-content-inner col-sm-12">
<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', 'page' ); ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( get_theme_mod( 'sparkling_page_comments', 1 ) == 1 ) :
                if ( comments_open() || '0' != get_comments_number() ) :
                    comments_template();
                endif;
            endif;
            ?>

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->

</div><!-- #primary -->
<script style="text/javascript">
    var breadcrumb = document.getElementsByClassName("breadcrumb")[0];
    var entryContent = document.getElementsByClassName("entry-content")[0];
    var mainContentArea = document.getElementsByClassName("main-content-area")[0];
    breadcrumb.style.marginBottom = '-1px';
    entryContent.style.margin = '0';
    mainContentArea.style.marginTop = '-1px';
</script>
<?php get_footer(); ?>
