	<footer>
		<div class="container">
			<div class="footer__top">
				<div class="subscribe">
					<div class="title">
						Подписаться на обновления
					</div>
					<div class="description">
						Будьте в курсе последних выпусков продуктов и новостей. Узнайте больше о наших брендах и получите специальные промокоды.
					</div>
					<form action="#" class="subscribe-form" id="subscribe-form">
						<div class="success">
							Спасибо за подписку
						</div>
						<div class="input">
							<input type="email" id="subscribe-email" placeholder="Введите ваш email" required>
						</div>
						<div class="submit">
							<input type="submit" class="btn" value="Подписаться">
						</div>
					</form>
				</div>
				<div class="menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'items_wrap' => '<ul class="footer-menu">%3$s</ul>',
						'container_class' => 'footer-menu__nav',
					));
					?>
				</div>
				<div class="footer__col">
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
					<div class="work-time">
						<?php echo get_theme_mod('work-time'); ?>
					</div>
				</div>
			</div>
			<div class="footer__bot">
				<div class="info">
					ОДО "ЭКОНОМСТРОЙ" Юр.адрес: 224011, г. Брест, ул. Чичерина, д. 26<br>УНП: 290429086, регистрация:№ 05554, выдано 06 сентября 2005 г.<br>Зарегистрировал Брестский областной исполнительный комитет 31 августа 2005 г.<br>Регистрация интернет-магазина:
					в Торговом реестре Республики Беларусь № 155976 от 02.10.2013 г.
				</div>
				<div class="copyright">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
						<path d="M8.08 8.86C8.13 8.53 8.24 8.24 8.38 7.99C8.52 7.74 8.72 7.53 8.97 7.37C9.21 7.22 9.51 7.15 9.88 7.14C10.11 7.15 10.32 7.19 10.51 7.27C10.71 7.36 10.89 7.48 11.03 7.63C11.17 7.78 11.28 7.96 11.37 8.16C11.46 8.36 11.5 8.58 11.51 8.8H13.3C13.28 8.33 13.19 7.9 13.02 7.51C12.85 7.12 12.62 6.78 12.32 6.5C12.02 6.22 11.66 6 11.24 5.84C10.82 5.68 10.36 5.61 9.85 5.61C9.2 5.61 8.63 5.72 8.15 5.95C7.67 6.18 7.27 6.48 6.95 6.87C6.63 7.26 6.39 7.71 6.24 8.23C6.09 8.75 6 9.29 6 9.87V10.14C6 10.72 6.08 11.26 6.23 11.78C6.38 12.3 6.62 12.75 6.94 13.13C7.26 13.51 7.66 13.82 8.14 14.04C8.62 14.26 9.19 14.38 9.84 14.38C10.31 14.38 10.75 14.3 11.16 14.15C11.57 14 11.93 13.79 12.24 13.52C12.55 13.25 12.8 12.94 12.98 12.58C13.16 12.22 13.27 11.84 13.28 11.43H11.49C11.48 11.64 11.43 11.83 11.34 12.01C11.25 12.19 11.13 12.34 10.98 12.47C10.83 12.6 10.66 12.7 10.46 12.77C10.27 12.84 10.07 12.86 9.86 12.87C9.5 12.86 9.2 12.79 8.97 12.64C8.72 12.48 8.52 12.27 8.38 12.02C8.24 11.77 8.13 11.47 8.08 11.14C8.03 10.81 8 10.47 8 10.14V9.87C8 9.52 8.03 9.19 8.08 8.86ZM10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM10 18C5.59 18 2 14.41 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 14.41 14.41 18 10 18Z" fill="#434447" />
					</svg>
					2022 Линкон Групп
				</div>
			</div>
		</div>
	</footer>

</div>
<div class="popup">
		<div class="popup__body">
			<div class="popup__close"></div>
			<form action="#" class="popup__form">
				<div class="popup__form-title">
					Заказать звонок
				</div>
				<div class="popup__form-input">
					<input type="text" class="form-name" placeholder="Имя" required>
				</div>
				<div class="popup__form-input">
					<input type="tel" class="form-phone" placeholder="Телефон" required>
				</div>
				<div class="popup__form-checkbox">
					<label class="checkbox">
						<input type="checkbox" checked required>
						<span>Я согласен с условиями <a href="/privacy-policy" target="_blank">Политики конфиденциальности</a></span>
					</label>
				</div>
				<input type="hidden" class="form-myEmail" value="<?php echo get_theme_mod('email-send'); ?>">
				<div class="popup__form-submit">
					<input type="submit" class="btn" value="Отправить заявку">
				</div>
			</form>
		</div>
	</div>

	<div class="popup-thanks">
		<div class="popup-thanks__body">
			<div class="popup-thanks__close"></div>
			<div class="popup-thanks__title">
				Спасибо! <br>
				Ваша заявка принята.
			</div>
			<div class="popup-thanks__text">
				Мы свяжемся с вами в ближайшее время.
			</div>
			<div class="popup-thanks__btn btn">
				Готово
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
	<script>
		document.addEventListener(
			"DOMContentLoaded", () => {
				const menu = new Mmenu("#mob-menu", {
					slidingSubmenus: true
				}, {
					classNames: {
						selected: "active"
					},
					offCanvas: {
						page: {
							selector: "#page"
						}
					}
				});
			}
		);
	</script>
	</body>

	</html>