<?php
/*
Template Name: Page Price
*/
get_header(); 


?>
<div class="pageBody">
<div class="pageTop">
<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				?>
                 <figure class="topImg">
                <?php the_post_thumbnail(); ?>
                </figure>
                <aside class="pageTexts clearfix">
                <div class="txts">
				<?php the_content(); ?>
                </div>
                </aside>
               
                 <?php   
				endwhile;
			?>
 </div>
 </div>


<div class="priceList">
<section class="features row-full">
	<div class="container">
		<?php echo the_field('equipment'); ?>
      	</div>
</section>
<div class="pricesDetails">


<?PHP
$prod_categories = get_terms( 'product_cat', array(
        'orderby'    => 'ID',
        'order'      => 'ASC',
        'hide_empty' => true
    ));
foreach( $prod_categories as $prod_cat ) :
        $cat_thumb_id = get_woocommerce_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
        $shop_catalog_img = wp_get_attachment_image_src( $cat_thumb_id, 'shop_catalog' );
        $term_link = get_term_link( $prod_cat, 'product_cat' );
		?>
			






    <?php endforeach; wp_reset_query();
	?>
</div>
</div>





<div class="priceList">
<div class="pricesDetails">

<?PHP

$args = array(
    'orderby'    => 'ID',
    'hide_empty' => $hide_empty,
    'include'    => $ids
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
if ( $count > 0 ){
	
	        
    foreach ( $product_categories as $product_category ) {
		
        //echo '<h4><a href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a></h4>';
        $args = array(
            'posts_per_page' => -1,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    // 'terms' => 'white-wines'
                    'terms' => $product_category->slug
                )
            ),
            'post_type' => 'product',
            'orderby'    => 'ID'            
            
        );
        $products = new WP_Query( $args );
		
    	
       // echo "<ul>";
        while ( $products->have_posts() ) {
			$products->the_post();
			$term_link = get_term_link( $product_category );
            ?>
                   
<div class="prices clearfix">
                <aside class="first">
                    <h2><?php the_title(); ?></h2>
                    <div class="det">
                       <?php echo the_post_thumbnail(); ?>
                        <a href="<?php echo $term_link; ?>">Learn More</a>
                    </div>
                </aside>
 <div><?php echo the_excerpt(); ?></div>
            </div>


            <?php
        }
        //echo "</ul>";
    }
}
 ?>
</div>
</div>





<?php get_footer(); ?>