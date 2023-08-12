<?php /**
 * Template Name: О компании
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="page-about-company min-height">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
		<div class="body">
			<div class="section" id="requisites">
				<h3>
					<?php the_field('requisites_title'); ?>
				</h3>
				<?php the_field('requisites_description'); ?>
			</div>
			<div class="section" id="about-us">
				<h3>
					<?php the_field('about-us_title'); ?>
				</h3>
				<?php the_field('about-us_description'); ?>
			</div>
		</div>
	</div>
</section>

 <?php get_footer(); ?>