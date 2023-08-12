<?php /**
 * Template Name: Контакты
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="page-contacts min-height">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
		<div class="body">
			<div class="info">
				<div class="title">
					Сделать заказ или уточнить наличие по телефону горячей линии
				</div>
				<a href="tel:<?php echo get_theme_mod('tel-1'); ?>"><?php echo get_theme_mod('tel-1'); ?></a>
				<a href="tel:<?php echo get_theme_mod('tel-2'); ?>"><?php echo get_theme_mod('tel-2'); ?></a>
				<div class="title">
					Наша почта
				</div>
				<a href="emailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a>
				<div class="title">
					Прием звонков
				</div>
				<div class="work-time">
					<?php echo get_theme_mod('work-time'); ?>
				</div>
				<div class="map">
					<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A6cec513d99adad28cedd1b1eba7874d682057d4b59f56e94ddda2a0c5f43cf97&amp;source=constructor" frameborder="0"></iframe>
				</div>
			</div>
			<div class="requisites">
				<div class="title">
					Наши реквизиты
				</div>
				<div class="requisites-info">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
</section>

 <?php get_footer(); ?>