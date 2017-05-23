<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * StudioMatrix WooCommerce Override
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

get_header();
?>

<?php
$args = array(
    'posts_per_page' => -1,
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => 'athlegen'
        )
    ),
    'post_type' => 'product',
    'orderby'    => 'ID',
    'order' => 'ASC',
);
$products = new WP_Query( $args );


// echo "<ul>";
$productPosts = [];
if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();
        $id = get_the_id();
        $productPosts[$id]['slug'] = get_post()->post_name;
        $productPosts[$id]['title'] = get_the_title();
        if (has_post_thumbnail()) {
            $productPosts[$id]['thumbnail'] = get_the_post_thumbnail($id, 'large', ['alt' => $productPost[$id]['title']]);
        }
        $productPosts[$id]['content'] = get_the_content();
    }
    wp_reset_postdata();
}
?>
<div class="equipmentList wrapper clearfix" xmlns="http://www.w3.org/1999/html">
    <!-- Item list -->
    <!-- Leading items -->
    <div class="equipmentDetail">
        <div class="detail ath">
            <div class="tabs">
                <ul class="tabLinks clearfix">
                    <?php $x = 0; ?>
                    <?php foreach ($productPosts as $id => $productPost) { ?>
                        <li>
                            <a class="productCatTabToggle" href="#<?php echo $productPost['slug']; ?>">
                                <?php echo $productPost['title']; ?>
                            </a>
                        </li>
                        <?php $x++; ?>
                    <?php } ?>
                </ul>
                <div class="tabOuter clearfix">
                    <?php foreach ($productPosts as $id => $productPost) { ?>
                    <div id="<?php echo $productPost['slug']; ?>-tab" class="productCatTab">
                        <?php if (isset($productPost['thumbnail'])) { ?>
                            <figure class="mainimg" style="max-height:530px;">
                                <?php echo $productPost['thumbnail']; ?>
                            </figure>
                        <?php } ?>
                        <aside class="tabDetails productCatDetail">
                            <div class="tabdetail detailTab clearfix">
                                <h1><?php echo $productPost['title']; ?></h1>
                                <?php echo $productPost['content']; ?>
                            </div>
                            <!--            detailtab-->
                        </aside>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

