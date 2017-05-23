<?php
/**
 * Template Name: Checkout
 *
 * @package laseraid-shop
 */

get_header(); ?>
<?php woocommerce_breadcrumb(); ?>
<section class="main-content checkout">

        <div id="primary" class="full-width content-area <?php if($current_user->ID <= 0){ echo 'full-width sign-up'; } ?>">
            <main id="main" class="site-main" role="main">
                <header class="page-header">
                    <div class="page-title">
                        <div class="wrapper">
                            <h1><?php the_title(); ?></h1>
                        </div>
                    </div>
                    <div class="state-icons">
                        <div class="wrapper">
                            <aside class="myCart ">
                                <i class="fa fa-cart-plus"></i>
                                <h2>My Cart</h2>
                            </aside>
                            <aside class="checkout active">
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
                <div class="wrapper">
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php if($current_user->ID <= 0){ echo '<h1 class="entry-title">'. get_the_title() .'</h1>'; }else{ the_title( '<h1 class="entry-title">', '</h1>' ); } ?>
                        </header><!-- .entry-header -->
                        <div class="divider"></div>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                        <p class="note">If your payment is declined, please check that your payment information is correct and try again. If our system is for any reason unable to process your payment, please contact Laseraid on (02) 9011 5509 to talk with one of our friendly customer service representatives.</p>
                    </article><!-- #post-## -->
                <?php endwhile; // End of the loop. ?>
                </div>
            </main><!-- #main -->
        </div><!-- #primary -->

    </div>
</section>
<?php get_footer(); ?>
