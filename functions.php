<?php
/*
 *  Add support for WP 3.0 features, thumbnails etc
 */
add_theme_support( 'post-thumbnails' );
add_theme_support('nav-menus');
add_theme_support('custom-background');
/*
 *  Required files for theme
 */
require_once('includes/wp_bootstrap_navwalker.php');
require_once('includes/theme-options.php');
require_once('includes/update.php');
require_once('includes/form.php');
require_once('includes/contact-widget.php');
require_once('includes/footer-widget.php'); 
/*
*   Define Javascript Files
*/
function ac_scripts()
{   
    //Get Options
    $ac_options = get_option('ac_general_settings');
    $home_options = get_option('ac_homepage_settings');
    $page_options = get_option('ac_page_settings');
    $form_options = get_option('ac_form_settings');
    $footer_options = get_option('ac_footer_settings');

    $font = $ac_options['ac_font_family'];
    // Add jquery library
    wp_enqueue_script('jquery');    
    // Include script file
    wp_enqueue_script( 'ac-script', get_template_directory_uri() . '/assets/js/ac-script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ac-mordenizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ac_forms_js', get_template_directory_uri() . '/assets/js/form-script.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
    // Localize script file
    wp_localize_script( 'ac_forms_js', 'acajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('ac_form_nonce') ) );
    // Include normalize styles and bottstrap cdn
    wp_register_style( 'ac-normalize', get_template_directory_uri() . '/assets/css/normalize.min.css', false, '1.0.0' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2', 'all' );
    wp_register_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
    wp_register_style( 'ac-custom', get_template_directory_uri() . '/assets/css/custom.css', array('ac-normalize', 'bootstrap-css', 'font-awesome') );
    wp_enqueue_style( 'ac-custom');

    if( $font === 'Droid Sans'){
        wp_enqueue_style( 'droid-sans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700' );
    }elseif( $font === 'Open Sans'){
        wp_enqueue_style( 'open-sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700' );
    }elseif( $font === 'Lato'){
        wp_enqueue_style( 'lato', 'http://fonts.googleapis.com/css?family=Lato:400,700' );
    }elseif( $font === 'Bitter'){
        wp_enqueue_style( 'Bitter', 'http://fonts.googleapis.com/css?family=Bitter:400,700' );
    }
    // , array(), '4.3.0', 'all'

    //Custom Styles Dynamic
    $main_color = $ac_options['ac_main_color_picker']; 
    $second_color = $ac_options['ac_second_color_picker']; 
    $main_cta = $ac_options['ac_main_image_bg']; 
    $form_bg = $ac_options['ac_form_image'];
    $form_section_color = $form_options['ac_form_background'];
    $placeholder_color = $form_options['placeholder_color'];
    $body_color = $ac_options['ac_font_color'];
    $contact_page = $home_options['contact_page_cta'];
    $menu_bg = $ac_options['ac_menu_picker'];
    $middle_cta_font = $home_options['middle_cta_font_color'];
    $footer_bg = $footer_options['footer_background'];
    $footer_copyright_bg = $footer_options['footer_copyright_background'];
    $footer_color = $footer_options['footer_color'];
    $title_bg = $page_options['title_background']; 
    $contact_bg = $page_options['contact_ribbon'];
    $bottom_cta_background_image = $home_options['bottom_cta_background_image'];

    $custom_css = "
        body{
            color: {$body_color};
            font-family: '{$font}', sans-serif;
        }
        h2{
            color: {$main_color};
        }
        a{ color: {$main_color} ;}
        a:hover{ color: {$second_color} ;}
        a, .header-action{
            color: {$main_color};
        }
        .main-color{
            color: {$main_color};
        }
        .ac-content h1, .second-color, .header-action a{
            color: {$second_color};
        }
        .main-cta{
            background: {$body_color};
        }
        .bottom-cta{
		  background-image: url($bottom_cta_background_image) !important;
		  background-size: contain;
		  background-repeat: no-repeat;        	
        }
        .background-image {
            //background: url('{$main_cta}');
            background-repeat: no-repeat;
            background-size: 100% auto;
            background-position: center top;
        }
        .navbar-default .navbar-nav>li>a{
        	color: #FFF !important;
    }
        #main-nav{
            background: {$menu_bg};
		    position:relative;
		    -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		       -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
		            box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
            border-color: transparent;
        }
		#main-nav:before, #main-nav:after
		{
		    content:'';
		    position:absolute;
		    z-index:-1;
		    -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
		    -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
		    box-shadow:0 0 20px rgba(0,0,0,0.8);
		    top:50%;
		    bottom:0;
		    left:10px;
		    right:10px;
		    -moz-border-radius:100px / 10px;
		    border-radius:100px / 10px;
		}
		#main-nav:after
		{
		    right:10px;
		    left:auto;
		    -webkit-transform:skew(8deg) rotate(3deg);
		       -moz-transform:skew(8deg) rotate(3deg);
		        -ms-transform:skew(8deg) rotate(3deg);
		         -o-transform:skew(8deg) rotate(3deg);
		            transform:skew(8deg) rotate(3deg);
		}        
        .oval{
            background: url({$contact_page});
            background-repeat:no-repeat;
            background-size: cover;
            background-position:center top;
        }
        .page-contact-cta{
            background: url({$contact_bg});
            background-repeat:no-repeat;
            background-size: cover;
            background-position:center top;
            background-color: $second_color;
        }
        .contact-cta-small{
            background: {$second_color};
        }
        .ac-caption, .footer-icon, #menu-toggle{
            background: {$main_color};            
        }
        .features h3{
            background: {$second_color};  
        }
        .features a{
            color: {$second_color};
        }
        .phone-number, .main-color{
            color: {$main_color};
        }
        .page-title{
            background-image: url({$title_bg});
            color: {$second_color};
        }
        #sidebar h2{ color: {$main_color}; }
        #main-navigation ul li:hover{
            color: {$main_color};
        }
        #menu-toggle:focus{
            background-color: {$body_color};
        }
        #menu-drug li a:hover{
            background: {$main_color};
        }
        .navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:focus, .navbar-default .navbar-nav>.active>a:hover{
            background-color: {$footer_copyright_bg} !important;
        }
        #ac-form form, #ac-form form p{
        	color: {$body_color} !important;
    	}
    	#ac-form form .info a{
    		color: {$main_color} !important;
    	}
        #ac-form form select, #ac-form form input[type='text'], #ac-form form input[type='email'], #ac-form form select option{
        	color: {$placeholder_color} !important;
    	}
    	#ac-form form input::-webkit-input-placeholder{ 
		    color: {$placeholder_color} !important;
		    opacity: 1;   
		}
		#ac-form form input:-moz-placeholder{
		    color: {$placeholder_color} !important;
		    opacity: 1;    
		}
		#ac-form form input::-moz-placeholder{
		    color: {$placeholder_color} !important;
		    opacity: 1;       
		}
		#ac-form form input:-ms-input-placeholder{
		    color: {$placeholder_color} !important;
		    opacity: 1;   
		}
        .form-container{
        	background-color: {$form_section_color} !important;
        }
        #ac-form form{
            background-color: {$form_section_color} !important;
        }
        #ac-form form #ac-submit{
            background: {$second_color};
        }
        #main-navigation-mobile ul > li:hover {
            color: #fff !important;
            background-color: {$main_color};
        }
        .main-title{
            color: {$main_color};
        }
        .cta-tagline .content{
        	background-color: {$main_color};
        }
        a{
            color: {$main_color};
        }
        #footer{
            background: {$footer_bg};
            color: {$footer_color};
            border-top:1px solid {$footer_copyright_bg};
        }
        #copyright{
        	background: {$footer_copyright_bg};
    	}
    	#copyright .lower-footer-links a{
    		color: #FFF;
    		text-transform: uppercase;
   		}
        #footer h3{
            color: {$footer_color};
        }
        #footer h2{
            color: {$footer_color};
        }
        #footer ul li a{
            color: {$footer_color};
        }
        #footer .copyright .copyright-text{
            color: {$body_color} !important;
        }
		.home-tag .cta-tagline:before {
		  border-color: {$menu_bg} transparent transparent {$menu_bg};
		}
		.home-tag .cta-tagline:after {
		  border-color: {$menu_bg} {$menu_bg} transparent transparent;
		}
		.cta-tagline .content p{
			color: {$middle_cta_font} !important;
		}
		.home-tag .cta-tagline .ribbon-edge-topleft{
		  border-color: transparent {$second_color} transparent transparent;
		}
		.home-tag .ribbon-edge-topright{
		  border-color: transparent transparent transparent {$second_color};
		}		        
        ";
    wp_add_inline_style( 'ac-custom', $custom_css );
}
add_action('wp_enqueue_scripts' , 'ac_scripts');
/*
*   Define Javascript Files for admin panel or Dashboard
*/
function ac_admin_assets() 
{
    //Only work if the user is admin
    if( is_admin() ) {                
        // Include Styles for admin options
        wp_enqueue_style( 'ac_admin_css', get_template_directory_uri() . '/assets/css/admin-styles.css', false, '1.0.0' );
    }
}
add_action( 'admin_enqueue_scripts', 'ac_admin_assets' );
/*
 *  Register Sidebar. If Sidebar is not registered use default in sidebar.php
 */
function ac_widgets_init() 
{
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'acframework' ),
        'id'            => 'sidebar',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'acframework' ),
        'before_widget' => '<div class="widget" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __('Form Container', 'acframework'),
        'id'            => 'ac-form-container',
        'description'   => __('Homepage form widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ) );
    register_sidebar(array(
        'name'          => __('Footer Left', 'acframework'),
        'id'            => 'ac-footer-left',
        'description'   => __('Left footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Left Center', 'acframework'),
        'id'            => 'ac-footer-center-left',
        'description'   => __('Center-left footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Right Center', 'acframework'),
        'id'            => 'ac-footer-center-right',
        'description'   => __('Center-Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name'          => __('Footer Right Center 2', 'acframework'),
        'id'            => 'ac-footer-center2-right',
        'description'   => __('Center-Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ));    
    register_sidebar( array(
        'name'          => __('Footer Right', 'acframework'),
        'id'            => 'ac-footer-right',
        'description'   => __('Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ) );
    register_sidebar( array(
        'name'          => __('Footer Right2', 'acframework'),
        'id'            => 'ac-footer-right2',
        'description'   => __('Right footer widget position.', 'acframework'),
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="main-color">',
        'after_title'   => '</h2>'
    ) );         
}
add_action( 'widgets_init', 'ac_widgets_init' );
/*
 *  Register navigation menus
 */
function register_ac_menu() 
{
  register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'register_ac_menu' );
/*
 *  Remove Comments
 */
function ac_remove_comment_fields($fields) 
{
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','ac_remove_comment_fields');
/**
*   Get Image ID using URL
*/
function ac_get_image_id($image_url) {
    
    global $wpdb;
    
    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
    
    return $attachment[0]; 
}


 
function display_custom_css() {
    $css_setting = get_option( 'ac_css_settings' );
    $custom_css = $css_setting['css_value'];

    if ( ! empty( $custom_css ) ) { ?>
        <style type="text/css">
            <?php
            echo '/* Custom CSS */' . "\n";
            echo $custom_css . "\n";
            ?>
        </style>
        <?php
    }
}
add_action( 'wp_head', 'display_custom_css' );