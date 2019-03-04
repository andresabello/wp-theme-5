<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="box">
			<?php if($sidebar_side === "left" ): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			<div class="col-md-8">
				<div class="ac-content">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="ac-blog">
						<div class="row">
							<div class="col-md-4">
								<?php if ( has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>
									" title="
									<?php the_title_attribute(); ?>
									" class="pull-left">
									<?php the_post_thumbnail('thumbnail', array( 'class'   =>"img-responsive feature-image")); ?></a>
								<?php endif; ?>
							</div>
							<div class="col-md-8">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php
								$content = get_the_content();                    
								echo substr($content, 0, 350) . '<br> <span class="ac-more"><a href="' . get_the_permalink() . '">... Read More →</a></span>';
								?>
								<hr>
								<div class="byline">
									<p>by <?php the_author_posts_link(); ?> on <span class="date"><?php the_time('l F d, Y'); ?></span><br/>Posted in: <?php the_category(', '); ?> | <?php the_tags('Tagged with: ',' • ','<br />'); ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; else: ?>
				<p><?php _e('No posts were found. Sorry!'); ?></p>
				<?php endif; ?>
				</div>
			</div>
			<?php if($sidebar_side === "right" ): ?>
				<?php get_sidebar(); ?>
			<?php endif; ?> 			
		</div>

	</div>	
</div>
<?php get_footer(); ?>