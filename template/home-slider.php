<?php
	$ac_options = get_option('ac_general_settings');
	$main_slide = $ac_options['ac_central_image'];
    $homepage_options = get_option('ac_homepage_settings');
    $call_image_url = $homepage_options['cta_button_image_one'];
    $call_image_id = ac_get_image_id($call_image_url);
    $call_alt = get_post_meta($call_image_id, '_wp_attachment_image_alt', true);
    $chat_image_url = $homepage_options['cta_button_image_two'];
    $chat_image_id = ac_get_image_id($chat_image_url);
    $chat_alt = get_post_meta($chat_image_id, '_wp_attachment_image_alt', true);
    $slide1_image_url = $homepage_options['ac_main_image'];
    $slide2_image_url = $homepage_options['ac_main_image_two'];
    $slide3_image_url = $homepage_options['ac_main_image_three']; 
    $ac_images = array($slide1_image_url, $slide2_image_url, $slide3_image_url);
?>
<!-- START TEMP 5 SINGULAR SLIDER-->
<div class="container home-slider">
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo $main_slide;?>" class="img-responsive" />
		</div>
	</div>
</div>
<!-- END TEMP 5 SINGULAR SLIDER-->

<!-- CALL TO ACTION -->
<div class="cta-tagline home-tag">
	<div class="container">
		<div class="cta-tagline content">
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
			<div class="row">
				<div class="col-md-12 text-center">
				<?php echo  htmlspecialchars_decode($homepage_options['middle_cta']);?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CALL TO ACTION -->

<!-- CLOSE CONTAINER STARTED IN HEADER.PHP-->
<div class="form-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( !function_exists('dynamic_sidebar')
	            || !dynamic_sidebar("Form Container") ) : ?>  
	            <?php endif; ?> 
			</div>
		</div>
	</div>
</div>