<?php
/**
 * Template Name: My Cart
 *
 * @package laseraid-shop
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="cart-page">
            <header class="page-header">
                <div class="page-title">
                    <div class="wrapper">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
                <div class="state-icons">
                    <div class="wrapper">
                        <aside class="myCart active">
                            <i class="fa fa-cart-plus"></i>
                            <h2>My Cart</h2>
                        </aside>
                        <aside class="checkout">
                            <i class="fa fa-file-text"></i>
                            <h2>Details</h2>
                        </aside>
                        <aside class="order">
                            <i class="fa fa-check-circle"></i>
                            <h2>Complete</h2>
                        </aside>
                        <div class="clear"></div>
                    </div>
                </div>

            </header><!-- .entry-header -->
            <div class="table">
                <div class="wrapper">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->
                    <?php endwhile; // End of the loop. ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
