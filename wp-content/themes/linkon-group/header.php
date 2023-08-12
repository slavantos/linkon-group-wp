<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if(get_field('keywords',$id_page)) {?>
        <meta name="keywords" content="<?php the_field('keywords',$id_page); ?>" />
    <?php } ?>
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page">
		<nav id="mob-menu">
			<ul>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'items_wrap' => '%3$s',
						'container' => false,
					));
				?>
				<li><span>Каталог</span>
					<?php
						wp_nav_menu(array(
							'theme_location' => 'catalog-menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'menu_class' => 'catalog__menu',
							// 'menu_id' => '',
							// 'depth' => 2
							'walker' => new Mob_Walker_Nav_Menu()
						));
					?>
				</li>
				<li class="mob-menu__stocks">
					<a href="/product-category/sale">Акции</a>
				</li>
			</ul>
		</nav>
		<header>
			<div class="top__header">
				<div class="container">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'items_wrap' => '<ul class="header-menu">%3$s</ul>',
						'container' => 'nav',
						'container_class' => 'header-menu__nav',
					));
					?>
				</div>
			</div>
			<div class="mid__header">
				<div class="container">
					<a href="<?php echo home_url(); ?>" class="logo">
						<img src="<?php echo get_theme_mod('logo'); ?>" alt="logo">
					</a>
					<div class="contacts">
						<a href="tel:<?php echo get_theme_mod('tel-1'); ?>"><?php echo get_theme_mod('tel-1'); ?></a>
						<a href="tel:<?php echo get_theme_mod('tel-2'); ?>"><?php echo get_theme_mod('tel-2'); ?></a>
						<div class="hint">
							Звонок бесплатный 05:00 – 22:00
						</div>
					</div>
					<a href="mailto:<?php echo get_theme_mod('email'); ?>" class="email">
						<?php echo get_theme_mod('email'); ?>
					</a>
					<div class="soc">
						<a href="<?php echo get_theme_mod('link-instagram'); ?>" target="_blank"><img src="<?php echo get_theme_mod('instagram'); ?>" alt="instagram"></a>
					</div>
					<div class="panel">
						<a href="/my-account/edit-account" class="login">
							<svg version="1.1" id="Capa_1" fill="#247eb2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.002 490.002" style="enable-background:new 0 0 490.002 490.002;" xml:space="preserve">
								<g id="bold_copy_9_">
									<path d="M117.08,133.036c0,73.469,59.566,133.035,133.035,133.035c73.469,0,133.035-59.566,133.035-133.035
								c0-73.469-59.581-133.035-133.05-133.035C176.631,0.001,117.08,59.567,117.08,133.036z M352.51,133.036
								c0,56.473-45.938,102.41-102.41,102.41c-56.472,0-102.41-45.937-102.41-102.41c0-56.472,45.953-102.41,102.41-102.41
								C306.557,30.626,352.51,76.564,352.51,133.036z" />
									<path d="M245.001,490.001h245c0,0,1.7-137.812-134.413-178.651l-110.587,83.377l-110.587-83.361
								C-1.699,352.189,0.001,490.001,0.001,490.001H245.001L245.001,490.001z M128.963,345.604l97.602,73.577l18.436,13.888
								l18.436-13.904l97.602-73.577c65.292,25.618,87.251,79.625,94.616,113.772H245.001H34.454
								C41.942,425.244,63.992,371.161,128.963,345.604z" />
								</g>
							</svg>
							<?php
							global $current_user;
							if (is_user_logged_in()) {
								echo $current_user->user_firstname;
							} else {
								echo 'Войти';
							}
							?>
						</a>
					</div>
				</div>
			</div>

		</header>
		<div class="bot__header">
			<div class="container">
				<a class="mob-menu__btn" href="#mob-menu">
					<span></span>
					<span></span>
					<span></span>
				</a>
				<div class="catalog-menu">
					<a href="/product-category/catalog" class="catalog-btn">
						<svg version="1.1" id="Layer_1" fill="#fff" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 210 210" style="enable-background:new 0 0 210 210;" xml:space="preserve">
							<g id="XMLID_12_">
								<path id="XMLID_13_" d="M195,0h-20c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V15
								C210,6.716,203.284,0,195,0z" />
								<path id="XMLID_14_" d="M115,0H95c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V15
								C130,6.716,123.284,0,115,0z" />
								<path id="XMLID_15_" d="M35,0H15C6.716,0,0,6.716,0,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V15
								C50,6.716,43.284,0,35,0z" />
								<path id="XMLID_16_" d="M195,160h-20c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15v-20
								C210,166.716,203.284,160,195,160z" />
								<path id="XMLID_17_" d="M115,160H95c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15v-20
								C130,166.716,123.284,160,115,160z" />
								<path id="XMLID_18_" d="M35,160H15c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15v-20
								C50,166.716,43.284,160,35,160z" />
								<path id="XMLID_19_" d="M195,80h-20c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V95
								C210,86.716,203.284,80,195,80z" />
								<path id="XMLID_20_" d="M115,80H95c-8.284,0-15,6.716-15,15v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V95
								C130,86.716,123.284,80,115,80z" />
								<path id="XMLID_21_" d="M35,80H15C6.716,80,0,86.716,0,95v20c0,8.284,6.716,15,15,15h20c8.284,0,15-6.716,15-15V95
								C50,86.716,43.284,80,35,80z" />
							</g>
						</svg>
						Каталог товаров
					</a>
					<div class="catalog">

						<?php
						wp_nav_menu(array(
							'theme_location' => 'catalog-menu',
							'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							'menu_class' => 'catalog__menu',
							// 'menu_id' => '',
							// 'depth' => 2
							'walker' => new Mob_Walker_Nav_Menu()
						));
						?>
					</div>
				</div>
				<a href="/product-category/sale" class="stocks">
					<svg viewBox="0 0 24 24" fill="#247eb2" xmlns="http://www.w3.org/2000/svg">
						<g data-name="Layer 2">
							<g data-name="percent">
								<rect opacity="0" />
								<path d="M8 11a3.5 3.5 0 1 0-3.5-3.5A3.5 3.5 0 0 0 8 11zm0-5a1.5 1.5 0 1 1-1.5 1.5A1.5 1.5 0 0 1 8 6z" />
								<path d="M16 14a3.5 3.5 0 1 0 3.5 3.5A3.5 3.5 0 0 0 16 14zm0 5a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 16 19z" />
								<path d="M19.74 4.26a.89.89 0 0 0-1.26 0L4.26 18.48a.91.91 0 0 0-.26.63.89.89 0 0 0 1.52.63L19.74 5.52a.89.89 0 0 0 0-1.26z" />
							</g>
						</g>
					</svg>
					Акции
				</a>
				<div class="search">
					<div class="mob__btn">
						<svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
					</div>
					<?php echo do_shortcode('[aws_search_form]') ?>
				</div>
				<a href="#popup" class="btn-phone btn-popup">
					<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 53.942 53.942" style="enable-background:new 0 0 53.942 53.942;" xml:space="preserve">
						<path d="M53.364,40.908c-2.008-3.796-8.981-7.912-9.288-8.092c-0.896-0.51-1.831-0.78-2.706-0.78c-1.301,0-2.366,0.596-3.011,1.68
						c-1.02,1.22-2.285,2.646-2.592,2.867c-2.376,1.612-4.236,1.429-6.294-0.629L17.987,24.467c-2.045-2.045-2.233-3.928-0.632-6.291
						c0.224-0.309,1.65-1.575,2.87-2.596c0.778-0.463,1.312-1.151,1.546-1.995c0.311-1.123,0.082-2.444-0.652-3.731
						c-0.173-0.296-4.291-7.27-8.085-9.277c-0.708-0.375-1.506-0.573-2.306-0.573c-1.318,0-2.558,0.514-3.49,1.445L4.7,3.986
						c-4.014,4.013-5.467,8.562-4.321,13.52c0.956,4.132,3.742,8.529,8.282,13.068l14.705,14.705c5.746,5.746,11.224,8.66,16.282,8.66
						c0,0,0,0,0.001,0c3.72,0,7.188-1.581,10.305-4.698l2.537-2.537C54.033,45.163,54.383,42.833,53.364,40.908z" />
					</svg>
					Заказать звонок
				</a>
				<a href="/favorites" class="wishlist">
					<i class="yith-wcwl-icon fa fa-heart-o"></i>
					Избранное
					<span class="count">
						<?php $wishlist_count = YITH_WCWL()->count_products();
						echo $wishlist_count; ?>
					</span>
				</a>
				<a href="/cart" class="cart">
					<svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
						<polygon fill="#247eb2" points="160 96.039 160 128.039 464 128.039 464 191.384 428.5 304.039 149.932 304.039 109.932 16 16 16 16 48 82.068 48 122.068 336.039 451.968 336.039 496 196.306 496 96.039 160 96.039" class="ci-primary" />
						<path fill="#247eb2" d="M176.984,368.344a64.073,64.073,0,0,0-64,64h0a64,64,0,0,0,128,0h0A64.072,64.072,0,0,0,176.984,368.344Zm0,96a32,32,0,1,1,32-32A32.038,32.038,0,0,1,176.984,464.344Z" class="ci-primary" />
						<path fill="#247eb2" d="M400.984,368.344a64.073,64.073,0,0,0-64,64h0a64,64,0,0,0,128,0h0A64.072,64.072,0,0,0,400.984,368.344Zm0,96a32,32,0,1,1,32-32A32.038,32.038,0,0,1,400.984,464.344Z" class="ci-primary" />
					</svg>
					Корзина
					<span class="count">
						<?php echo WC()->cart->get_cart_contents_count(); ?>
					</span>
				</a>
			</div>
		</div>