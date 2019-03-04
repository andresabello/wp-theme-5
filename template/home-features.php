<?php 
$homepage_options = get_option('ac_homepage_settings');
$feature_one_img_url = $homepage_options['feature_image_one'];
$feature_one_img_id = ac_get_image_id($feature_one_img_url);
$feature_one_img_alt = get_post_meta($feature_one_img_id, '_wp_attachment_image_alt', true);
$feature_two_img_url = $homepage_options['feature_image_two'];
$feature_two_img_id = ac_get_image_id($feature_two_img_url);
$feature_two_img_alt = get_post_meta($feature_two_img_id, '_wp_attachment_image_alt', true);
$feature_three_img_url = $homepage_options['feature_image_three'];
$feature_three_img_id = ac_get_image_id($feature_three_img_url);
$feature_three_img_alt = get_post_meta($feature_three_img_id, '_wp_attachment_image_alt', true);
?>
<div class="double-cta home-double">
	<div class="container">
		<div class="row">
	        <div class="features">
	            <div class="col-md-6">
	                <div class="box-modular text-center">
	                	<?php  echo '<a href="'. $homepage_options['feature_link_one'] .'"><img class="img-responsive img-grow" src="' . $feature_one_img_url .'" alt="' . ( !empty($feature_one_img_alt) ? $feature_one_img_alt : get_bloginfo('name') ) . '"></a>' ;?>
	                    <?php echo '<a href="'. $homepage_options['feature_link_one'] .'"><h3>' . $homepage_options['feature_title_one'] . '</h3></a>' ;?>
	                </div>
	            </div>

	            <div class="col-md-6">
	                <div class="box-modular text-center">

	                    <?php   
	                    echo '<a href="'. $homepage_options['feature_link_two'] .'"><img class="img-responsive img-grow" src="' . $feature_two_img_url . '" alt="' . ( !empty($feature_two_img_alt) ? $feature_two_img_alt : get_bloginfo('name') ) . '"></a>' ;
	                        echo '<a href="'. $homepage_options['feature_link_two'] .'"><h3>' . $homepage_options['feature_title_two'] . '</h3></a>' ;
	                    ?>
	                </div>
	            </div>           
	        </div>      
		</div>
	</div>
</div>