<?php
/**
 * Plugin Name:       		product slider with popup
 * Description:       		product slider with popup.
 * Version:           		1.0.0
 * Author:            		jd
 * Author URI:        		https://www.upwork.com/freelancers/~01fcc08b3b735f01b6
 * License:           		GPL-2.0+
 * License URI:       		http://www.gnu.org/licenses/gpl-2.0.txt
 * WC requires at least:	3.8
 * WC tested up to:			6.9.3
 * Text Domain: 			product-slider
 * Domain Path: 			/languages/
 */
function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style1', $plugin_url . 'style.css' );  
    wp_enqueue_style( 'slick_css', $plugin_url . 'slick/slick.css' );  
    wp_enqueue_style( 'slick_theme_css', $plugin_url . 'slick/slick-theme.css' );  
	wp_enqueue_script( 'custom_js', $plugin_url . 'custom.js' );	
	wp_enqueue_script( 'custom_js1','https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );	
	wp_enqueue_script( 'slick_js', $plugin_url . 'slick/slick.js' );	
}
add_action( 'wp_enqueue_scripts', 'wpse_load_plugin_css' );  
add_action( 'wp_footer', 'signup_bar');

add_shortcode('jd_slick_product_slider', 'jd_slick_product_slider');
function jd_slick_product_slider(){
	include('slider.php');
}
function signup_bar(){
	?>
	
	<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  -webkit-animation-name: fadeIn; /* Fade in the background */
  -webkit-animation-duration: 0.4s;
  animation-name: fadeIn;
  animation-duration: 0.4s
}

/* Modal Content */
.modal-content {
  bottom: 0;
    background-color: #fefefe;
    width: 45%;
    -webkit-animation-name: slideIn;
    -webkit-animation-duration: 0.4s;
    animation-name: slideIn;
    animation-duration: 0.4s;
    margin: auto;
	top: 90px;
}

/* The Close Button */
.close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  
  color: white;
}

.modal-body {    
	padding: 30px 16px;
    text-align: center;
}


/* Add Animation */
@-webkit-keyframes slideIn {
  from {bottom: -300px; opacity: 0} 
  to {bottom: 0; opacity: 1}
}

@keyframes slideIn {
  from {bottom: -300px; opacity: 0}
  to {bottom: 0; opacity: 1}
}

@-webkit-keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}

@keyframes fadeIn {
  from {opacity: 0} 
  to {opacity: 1}
}
.wp-container-7 #wps-slider-section{
    width: 100%;
    max-width: 100%;
}
</style>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      
    </div>
    <div class="modal-body">
	<?php 
	$offercost=500;
	 global $woocommerce;
	 $amount2=0;
	 $amount2 = floatval( preg_replace( '#[^\d.]#', '', $woocommerce->cart->get_cart_total() ) );
		$show_value = $offercost-$amount2;
	?>
      <h2>You are $<?php echo $show_value;?> away from FREE SHIPPING!</h2>
	  <p>Please look through the catalog in the shop to get these items to you without any shipping costs!</p>
	  <?php echo do_shortcode('[jd_slick_product_slider]'); ?>
    </div>
   
  </div>

</div>
	<script>
	jQuery(document).ready(function(){
  if (jQuery('body').hasClass('woocommerce-checkout')) {
	  jQuery(".modal").css("display", "block")
  }
});
// Get the modal
var modal = document.getElementById("myModal");



// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];



// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	
	<?php
}
