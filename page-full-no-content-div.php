<?php
/**
 * Template Name: Full Page With No Content Div
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>

</div>
</div>
</div>

<!-- top category section //-->
<div class="pageBody clearfix">
    <div class="pageTop clearfix">
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
    </div>
</div>

<script style="text/javascript">
    var breadcrumb = document.getElementsByClassName("breadcrumb")[0];
    var entryContent = document.getElementsByClassName("entry-content")[0];
    var mainContentArea = document.getElementsByClassName("main-content-area")[0];
    breadcrumb.style.marginBottom = '-1px';
    entryContent.style.margin = '0';
    mainContentArea.style.display = 'none';
</script>
<div class="container main-content-area" style="margin: 0; height: 0;">
    <div class="row full-width">
        <div class="main-content-inner col-sm-12 col-md-9" style="margin: -1px; height: 0;">
<?php get_footer(); ?>

