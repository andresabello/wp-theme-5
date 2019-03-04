<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- SEO Specific Metas -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
    <link rel="pingback" type="text/css" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
    <?php
    /*Get theme options*/
    $ac_options = get_option('ac_general_settings');
    ?>
    <div>
        <!-- HEADER STARTS -->
            <header class="container">
                <div class="row">
                    <div class="col-md-4">
                        <a  href="<?php echo home_url();?>">
                            <?php if( "" != $ac_options['ac_logo']) : ?>
                                <img class="logo  pull-left img-responsive" src="<?php echo esc_url($ac_options['ac_logo']); ?>" alt="<?php bloginfo('name'); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="pull-right">
                            <?php echo  htmlspecialchars_decode($ac_options['upper_cta']);?>
                        </div>            
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav id="main-nav" class="navbar navbar-default" role="navigation">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>

                                <?php
                                    wp_nav_menu( array(
                                        'menu'              => 'primary',
                                        'theme_location'    => 'primary',
                                        'depth'             => 2,
                                        'container'         => 'div',
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'bs-example-navbar-collapse-1',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new wp_bootstrap_navwalker())
                                    );
                                ?>
                            </div>
                        </nav>                    
                    </div>                            
                </div> 
            </header>
