<?php
$product_ids= array();
foreach( WC()->cart->get_cart() as $cart_item ){
    $product_ids[] = $cart_item['product_id'];
}
$default = array(
    'post_type' => 'product',
    'post__not_in' => $product_ids,       
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'posts_per_page'    => -1
);


$posts = get_posts($default);

	


?>

<section id="jdp-slider-section" class="jd_regular jd_slider">
    <?php 
	foreach($posts as $post){
		$product = wc_get_product( $post->ID );
		
		
	?>
	<div>
		  <div class="wpjd-product">
			<div class="slickp-jdp-product-image-area">
			  <a href="<?php echo get_permalink( $product->get_id() );?>" class="jdp-product-image" tabindex="-1">
				<?php echo $product->get_image();?>
			  </a>
			  <div class="slickp-jdp-product-details">
				<div class="slickp-jdp-product-details-inner">
				  <div class="wpjd-product-title">
					<a href="<?php echo get_permalink( $product->get_id() );?>" tabindex="-1"><?php echo $product->get_name(); ?></a>
				  </div>
				  <div class="wpjd-product-price">
					<span class="woocommerce-Price-amount amount">
					  <span class="woocommerce-Price-currencySymbol">$</span><?php echo $product->get_price();?></span>
				  </div>
				  <div class="wpjd-cart-button">
					<p class="product woocommerce add_to_cart_inline ">
					  <a href="?add-to-cart=<?php echo $product->get_id();?>" data-quantity="1" class=" add_to_cart_button" data-product_id="<?php echo $product->get_id();?>" data-product_sku="1234568999-1" aria-label="Add “<?php echo $product->get_name(); ?>” to your cart" rel="nofollow" tabindex="-1">Add to cart</a>
					</p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
	</div>
 <?php }?>
  </section>