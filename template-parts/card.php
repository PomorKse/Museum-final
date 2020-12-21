	<a href="<?php echo get_the_permalink(); ?>">
		<?php 
			get_template_part( 'template-parts/post-image' );
		?>
		<span><?php the_field('date'); ?></span>
		<h4><?php the_title(); ?></h4>
	</a>
