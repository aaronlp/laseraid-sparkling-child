<?php global $i;?>
<div class="part <?php if ($i==3) echo ' third'?>">
	<?php $url = get_the_post_thumbnail_url( null, 'medium' ) ?>
	<?php $url_big = get_the_post_thumbnail_url( null, 'large' ) ?>
	<img src="<?php echo $url ? $url : 'https://placehold.it/300x300' ?>" alt="" class="small-img">
	<div class="popup-enquire-big" style="display: none">
		<div class="close-pop">
			<i class="fa fa-times"></i>
		</div>
		<div class="content"><img src="<?php echo $url_big ? $url_big : 'https://placehold.it/600x600' ?>" alt="" class="hover-img"></div>
	</div>
	<div class="overlay-enquire-big" style="display: none"></div>

	<div class="text">
	<h2><?php the_title(); ?></h2>
	<h3><?php array_walk( get_the_terms( get_the_ID(), 'brand' ), function ( WP_Term $brand ) {
			echo $brand->name, " ";
		} ); ?></h3>
<!--	<h4>Item number : --><?php //the_field( 'item_number' ); ?><!--</h4>-->
	<a href="#" data-item_number="<?php the_field( 'item_number' ); ?>" data-title="<?php echo get_the_title() ?>"
	   data-part_type="<?php the_field( 'part_type' ) ?>"
	   data-part_brand="<?php array_walk( get_the_terms( get_the_ID(), 'brand' ), function ( WP_Term $brand ) {
		   echo $brand->name, " ";
	   } ); ?>"
		class="enquire-now-btn">Enquire Now</a>
	</div>
</div>
<?php if   ($i==3) :?>
	<div class="clear"></div>
<?php endif ?>
