<?php 
	//Header 	
	get_header();
	//Slider
	get_template_part( 'template/home', 'slider' ); 
	// Features Section
	get_template_part( 'template/home', 'features' );
	//variables for current template
	$homepage_options = get_option('ac_homepage_settings');
	$contact_cta = $homepage_options['contact_page_cta_text'];
global $post;
$title = $post->post_title;
$page_options = get_option('ac_page_settings');
$sidebar_side = $page_options['sidebar_position'];	
?> 

<!-- OPEN NEW CONTAINER -->
<div class="container">
	<!-- OVAL ENDS -->
    <div class="row">
        <div class="box">
            <?php if($sidebar_side === "left" ): ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
            <div class="col-md-9 ac-content">
                <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                    <?php echo '<h1>' . $title . '</h1>'; ?>                                   	
                    <?php the_content(); ?>
                    <?php endwhile; else: ?>
                    <p><?php _e('No pages were found. Sorry!'); ?></p>
                <?php endif; ?> 
            </div>
            <?php if($sidebar_side === "right" ): ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>               
        </div>
    </div>
</div>



<!-- bottom CTA -->

<div class="container">
	<div class="row">
		<div class="bottom-cta">
			<div class="col-md-12 text-center">
				<?php echo  htmlspecialchars_decode($homepage_options['bottom_cta']);?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>