<?php
/**
 * Template Name: Track Order
 *
 * @package laseraid-shop
 */

get_header();
woocommerce_breadcrumb(); ?>
<section class="main-content my-account">
    <div class="wrapper">
        <?php if($current_user->ID > 0){ get_sidebar('myaccount'); } ?>
        <div id="primary" class="content-area <?php if($current_user->ID <= 0){ echo 'full-width sign-up'; } ?>">
            <main id="main" class="site-main" role="main">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if($current_user->ID <= 0){ echo '<h1 class="entry-title">Sign Up</h1>'; }else{ the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
                        </header><!-- .entry-header -->
                        <div class="divider"></div>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-## -->
                <?php endwhile; // End of the loop. ?>
            </main><!-- #main -->
        </div><!-- #primary -->
        <div class="clear"></div>
    </div>
</section>
<?php get_footer(); ?>
