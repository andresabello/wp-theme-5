<?php 
$ac_options = get_option('ac_general_settings');
$footer_options = get_option('ac_footer_settings');

$footer_columns = $footer_options['footer_columns'];
$insurance_logo = $ac_options['insurance_logos'];
$insurance_logo_id = ac_get_image_id($insurance_logo);
$insurance_logo_alt = get_post_meta($insurance_logo_id, '_wp_attachment_image_alt', true);
?>              
            <div class="container">
                <div class="row">
                    <div class="box">
                        <div class="col-md-12">
                            <?php //echo '<img style="margin-top: 40px;" class="img-responsive" src="' . $insurance_logo . '" alt=" '. ( !empty($insurance_logo_alt) ? $insurance_logo_alt : 'We accept insurance. Aeta, Cigna, Humana, BlueCross Blueshild, Hartford Healthcare, United HealthCare and more' )  .'">' ; ?>                    
                        </div>                          
                    </div>
              
                </div>
                <!-- Columns for Insurance Companies -->
            </div>   
        </div>
        <!-- FOOTER STARTS -->    
        <footer id="footer">
        <div id="upper-footer">
            <div class="container">
                <!-- Upper footer -->
                <div class="row">
                    <?php if($footer_columns > 3 ): ?>
                        <div class="col-md-2">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Left") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-3">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Left Center") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-2">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Right Center") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-3">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Right") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-2">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Right") ) : ?>  
                            <?php endif; ?>                   
                        </div>                        
                     <?php else: ?>
                        <div class="col-md-4">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Left") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-4">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Left Center") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                        <div class="col-md-4">
                            <?php if ( !function_exists('dynamic_sidebar')
                                    || !dynamic_sidebar("Footer Right Center") ) : ?>  
                            <?php endif; ?>                   
                        </div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
            <div id="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <ul class="lower-footer-links">
                                <li><a href="<?php echo home_url()?>/privacy-policy">Privacy Policy</a></li>
                                <li><a href="<?php echo home_url()?>/terms-and-conditions">Terms and Conditions</a></li>
                                <li><a href="<?php echo home_url()?>/site-map">Site Map</a></li>
                            </ul>
                            <p class="copyright-text">Copyright © 2015 <?php bloginfo('name');?>.</p>  
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER ENDS -->
        <?php wp_footer(); ?>
    </body>
</html>