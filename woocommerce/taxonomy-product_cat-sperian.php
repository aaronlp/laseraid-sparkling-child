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
            'terms' => 'sperian'
        )
    ),
    'post_type' => 'product',
    'orderby'    => 'ID',
    'order' => 'ASC',
);
$products = new WP_Query( $args );

// get product category
$catObj = get_terms('product_cat', [
    'orderby'    => 'ID',
    'order'      => 'ASC',
    'slug' => 'sperian',
    'hide_empty' => false
])[0];

$cat_thumb_id = get_woocommerce_term_meta( $catObj->term_id, 'thumbnail_id', true );
if ($cat_thumb_id) {
    $cat['thumbnail'] = wp_get_attachment_image_src( $cat_thumb_id, 'large' )[0];
}
$cat['description'] = $catObj->description;


// echo "<ul>";
$productPosts = [];
if ($products->have_posts()) {
    while ($products->have_posts()) {
        $products->the_post();
        $id = get_the_id();
        $productPosts[$id]['product'] = wc_get_product($id);
        $productPosts[$id]['slug'] = get_post()->post_name;
        $productPosts[$id]['title'] = get_the_title();
        if (has_post_thumbnail()) {
            $productPosts[$id]['thumbnail'] = get_the_post_thumbnail($id, 'original', ['alt' => $productPost[$id]['title']]);
        }
        $productPosts[$id]['content'] = get_the_content();
        $productPosts[$id]['attributes'] = get_post_meta( $id , '_product_attributes' )[0];
    }
    wp_reset_postdata();
}
?>
<?php /* we need to end the current bootstrap so we can go full width */ ?>
</div>
</div>
</div>

<!-- top category section //-->
<div class="pageBody clearfix">
    <div class="pageTop clearfix">
        <?php if (isset($cat['thumbnail'])) { ?>
        <figure class="topImg margin-top-41-neg">
            <img src="<?php echo $cat['thumbnail']; ?>" alt="Sperian" class="on-top-of-bootstrap"/>
        </figure>
        <?php } ?>

        <aside class="pageTexts clearfix margin-top-41-neg">
            <div class="txts">
                <?php echo $cat['description']; ?>
            </div>
        </aside>
    </div>
</div>

<!-- products loop //-->

<?php /* reactivate the main content area divs */ ?>
<div class="full-width grey-bg">
<div class="container main-content-area">
<div class="row full-width">
<div class="main-content-inner col-sm-12 col-md-9">
    <section class="priceList sperianList">
    <div class="features">
        <div class="wrapper">
            <h1>
                <span>Our selection of Sperian glasses</span>
            </h1>
            <table>
                <tr>
                    <th>&nbsp;</th>
                    <th><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-lens.png'; ?>" alt="Lens Type"><p>Lens Type</p></th>
                    <th><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-wavelength.png'; ?>" alt="Wavelength"><p>Wavelength</p></th>
                    <th><img src="<?php echo get_stylesheet_directory_uri() . '/images/icon-colour.png'; ?>" alt="Colour"><p>Colour</p></th>
                </tr>
                <?php foreach ($productPosts as $id => $productPost) { ?>
                <tr>
                    <td class="img">
                        <h3 class="margin-all-zero"><?php echo $productPost['title']; ?></h3>
                        <?php if (isset($productPost['thumbnail'])) {
                            echo $productPost['thumbnail'];
                        } ?>
                    </td>
                    <td>
                        <span>Lens Type</span>
                        <?php echo $productPost['attributes']['lens-type']['value']; ?>
                    </td>
                    <td>
                        <span>Wavelength</span>
                        <?php echo $productPost['attributes']['wavelength']['value']; ?>
                    </td>
                    <td>
                        <span>Colour</span>
                        <?php echo $productPost['attributes']['colour']['value']; ?>
                    </td>
                    <td>
                        <a href="#" class="ecp-trigger" data-modal="modal" id="onload">Enquire Now</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    </section>
</div>
</div>
</div>
</div>

<div class="container main-content-area" style="margin: 0; height: 0;">
<div class="row full-width">
<div class="main-content-inner col-sm-12 col-md-9 grey-bg" style="margin: -1px; height: 0;">
<?php get_footer(); ?>

