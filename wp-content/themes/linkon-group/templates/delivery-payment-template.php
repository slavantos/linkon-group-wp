<?php /**
 * Template Name: Доставка и оплата
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="page-delivery-payment min-height">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
		<div class="body">
			<div class="section" id="courier">
				<h3>
					<?php the_field('courier_title'); ?>
				</h3>
				<?php the_field('courier_description'); ?>
			</div>
			<div class="section" id="delivery-transport-company">
				<h3>
					<?php the_field('transport-company_title'); ?>
				</h3>
				<?php the_field('transport-company_description'); ?>
			</div>
			<div class="section" id="pickup">
				<h3>
					<?php the_field('pickup_title'); ?>
				</h3>
				<?php the_field('pickup_description'); ?>
			</div>
			<div class="section" id="payment-methods">
				<h3>
					<?php the_field('payment-methods_title'); ?>
				</h3>
				<?php the_field('payment-methods_description'); ?>
			</div>
		</div>
	</div>
</section>

 <?php get_footer(); ?>