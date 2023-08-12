<?php 

add_theme_support( 'post-thumbnails' );

if (function_exists('add_theme_support'))
    add_theme_support('post-thumbnails');

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

function theme_name_scripts() {
	wp_enqueue_style( 'jquery.fancybox.min', get_template_directory_uri() . '/css/jquery.fancybox.min.css' );
	wp_enqueue_style( 'swiper-bundle.min', get_template_directory_uri() . '/css/swiper-bundle.min.css' );
	wp_enqueue_style( 'mmenu.min', get_template_directory_uri() . '/css/mmenu.min.css' );
	wp_enqueue_style( 'main.min', get_template_directory_uri() . '/css/main.min.css' );
	wp_deregister_script('jquery');
 	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
 	wp_enqueue_script( 'jquery.fancybox.min', get_template_directory_uri() . '/js/jquery.fancybox.min.js', array(), null, true );
	wp_enqueue_script( 'swiper-bundle.min', get_template_directory_uri() . '/js/swiper-bundle.min.js', array(), null, true );
	wp_enqueue_script( 'mmenu.min', get_template_directory_uri() . '/js/mmenu.min.js', array(), null, true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), null, true );
	wp_enqueue_script( 'form', get_template_directory_uri() . '/js/form.js', array(), null, true );
	wp_enqueue_script( 'subscribe', get_template_directory_uri() . '/js/subscribe.js', array(), null, true );
}

//menu

function home_menu() {

	$locations = array(
		'main-menu' => __( 'Main menu', '' ),
		'catalog-menu' => __( 'Catalog menu', '' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'home_menu' );

//хлебные крошки

function wpcourses_breadcrumb( $sep = ' > ' ) {
	global $post;
	$out = '';
	$out .= '<div class="wpcourses-breadcrumbs">';
	$out .= '<a href="' . home_url( '/' ) . '">Главная</a>';
	$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
	if ( is_single() ) {
		$terms = get_the_terms( $post, 'category' );
		if ( is_array( $terms ) && $terms !== array() ) {
			$out .= '<a href="' . get_term_link( $terms[0] ) . '">' . $terms[0]->name . '</a>';
			$out .= '<span class="wpcourses-breadcrumbs-sep">' . $sep . '</span>';
		}
	}
	if ( is_singular() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">' . get_the_title() . '</span>';
	}
	if ( is_search() ) {
		$out .= get_search_query();
	}
	if ( is_404() ) {
		$out .= '<span class="wpcourses-breadcrumbs-last">404</span>';
	}
	$out .= '</div><!--.wpcourses-breadcrumbs-->';
	return $out;
}


//добавление svg в загрузку файлов

add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
	$mimes['svg']  = 'image/svg';

	return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}

//подключение customizer
require_once get_template_directory() . '/inc/customizer.php';

//woocommerce -------------------------------------

add_theme_support( 'woocommerce' );

//обязательно (структура шаблонов)

if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/functions/woocommerce.php';
}

//артикул

/* CREATE the new function, with SKU added */
function woocommerce_template_loop_product_title_with_sku() {
		global $product;
		echo '<h2 class="loop-title">' . get_the_title() . '</h2>';
		if ($product->get_sku()) {
			echo '<span class="loop-title-sku">Артикул: ' . $product->get_sku() . '</span>';
		}
}

/*REMOVE old loop-title action             */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

/* ADD new loop-title-with sku action      */
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title_with_sku', 10 );

//checkbox хит для товаров
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_field' );

add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 // Checkbox
 woocommerce_wp_checkbox( 
array( 
'id'            => '_checkbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('Хит', 'woocommerce' ), 
'description'   => __( 'Включить', 'woocommerce' )
)
);

echo '</div>';

}

function woo_add_custom_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_checkbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_checkbox', $woocommerce_checkbox );
}

add_action('custom_hot_product','custom_hot_product');
function custom_hot_product(){
  global $product;
  $is_hot = get_post_meta( $product->id, '_checkbox', true );
  if ( 'yes' == $is_hot ) {
    echo '<span class="hot-product">Хит</span>';
  }
}

//checkbox топ для товаров
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_top_general_field' );

add_action( 'woocommerce_process_product_meta', 'woo_add_custom_top_general_fields_save' );

function woo_add_custom_top_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 woocommerce_wp_checkbox( 
array( 
'id'            => '_top_checkbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('Топ', 'woocommerce' ), 
'description'   => __( 'Включить', 'woocommerce' )
)
);

echo '</div>';

}

function woo_add_custom_top_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_top_checkbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_top_checkbox', $woocommerce_checkbox );
}

add_action('custom_top_product','custom_top_product');
function custom_top_product(){
  global $product;
  $is_top = get_post_meta( $product->id, '_top_checkbox', true );
  if ( 'yes' == $is_top ) {
    echo '<span class="top-product">Топ</span>';
  }
}

//checkbox про для товаров
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_pro_general_field' );

add_action( 'woocommerce_process_product_meta', 'woo_add_custom_pro_general_fields_save' );

function woo_add_custom_pro_general_field() {

 global $woocommerce, $post;

 echo '<div class="options_group">';

 woocommerce_wp_checkbox( 
array( 
'id'            => '_pro_checkbox', 
'wrapper_class' => 'show_if_simple', 
'label'         => __('Про', 'woocommerce' ), 
'description'   => __( 'Включить', 'woocommerce' )
)
);

echo '</div>';

}

function woo_add_custom_pro_general_fields_save( $post_id ){

  $woocommerce_checkbox = isset( $_POST['_pro_checkbox'] ) ? 'yes' : 'no';
  update_post_meta( $post_id, '_pro_checkbox', $woocommerce_checkbox );
}

add_action('custom_pro_product','custom_pro_product');
function custom_pro_product(){
  global $product;
  $is_pro = get_post_meta( $product->id, '_pro_checkbox', true );
  if ( 'yes' == $is_pro ) {
    echo '<span class="pro-product">Про</span>';
  }
}

//удалить ссылки my-account

add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){
 
    //unset( $menu_links['edit-address'] ); // Addresses
    unset( $menu_links['dashboard'] ); // Dashboard
    //unset( $menu_links['payment-methods'] ); // Payment Methods
    //unset( $menu_links['orders'] ); // Orders
    unset( $menu_links['downloads'] ); // Downloads
    //unset( $menu_links['edit-account'] ); // Account details
    //unset( $menu_links['customer-logout'] ); // Logout
 
    return $menu_links;
}

//изменить порядок и переименовать my-account

/* Change endpoint order */
function my_account_menu_order() {
    $menuOrder = array(
        'edit-account'       => __( 'Личные данные', 'woocommerce' ),
        'orders'             => __( 'История покупок', 'woocommerce' ),
        'edit-address'       => __( 'Адрес доставки', 'woocommerce' ),
        'customer-logout'    => __( 'Выйти', 'woocommerce' ),
        
    );
    return $menuOrder;
 }
add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );

//cart quantity

add_action( 'woocommerce_after_quantity_input_field', 'truemisha_quantity_minus', 25 );

  
function truemisha_quantity_minus() {
	echo '<button type="button" class="minus">-</button>';
}

add_action( 'woocommerce_before_quantity_input_field', 'truemisha_quantity_plus', 25 );

function truemisha_quantity_plus() {
	echo '<button type="button" class="plus">+</button>';
}

//замена подытог на стоимость

add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');
 
function translate_text($translated) {
$translated = str_ireplace('Подытог', 'Стоимость', $translated);
$translated = str_ireplace('Product added to cart successfully', 'Товар успешно добавлен в корзину', $translated);
return $translated;
}

//walker menu

class Mob_Walker_Nav_Menu extends Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = NULL ) {
	  /*
	   * $depth – уровень вложенности, например 2,3 и т д
	   */ 
	  $output .= '<div class="sub-menu-content">';
	  $output .= '<ul class="sub-menu">';
	}

	function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
	  global $wp_query;           

	  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
   
	  /*
	   * Генерируем строку с CSS-классами элемента меню
	   */
	  $class_names = $value = '';
	  $classes = empty( $item->classes ) ? array() : (array) $item->classes;
	  $classes[] = 'menu-item-' . $item->ID;
   
	  // функция join превращает массив в строку
	  $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
	  $class_names = ' class="' . esc_attr( $class_names ) . '"';
   
	  /*
	   * Генерируем ID элемента
	   */
	  $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
	  $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
   
	  /*
	   * Генерируем элемент меню
	   */
	  $output .= $indent . '<li' . $id . $value . $class_names .'>';
   
	  // атрибуты элемента, title="", rel="", target="" и href=""
	  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
	  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
	  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
	  $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
   
	  // ссылка и околоссылочный текст
	  $item_output = $args->before;
	  $item_output .= '<a'. $attributes .'>';
	  if(get_field('cat_photo', $item->ID)) {
		$item_output .= '<div class="icon-menu"><img src="'.get_field('cat_photo', $item->ID).'" alt="icon"/></div>';
	  }
	  $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
	  $item_output .= '</a>';
	  $item_output .= $args->after;
   
	   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
  }

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

//tabs single

add_filter( 'woocommerce_product_tabs', 'wootabs_rename', 98 );

function wootabs_rename( $tabs ) {
    $tabs['additional_information']['title'] = __( 'Характеристики' );
	$tabs['description']['title'] = __( 'Описание' );
    return $tabs;
}

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 

    // unset( $tabs['additional_information'] );   // Remove the additional information tab
	unset( $tabs['reviews'] );   // Remove the additional information tab
 
    return $tabs;
}

//просмотренные товары
add_action( 'template_redirect', 'recently_viewed_product_cookie', 20 );
 
function recently_viewed_product_cookie() {
 
    // если находимся не на странице товара, ничего не делаем
    if ( ! is_product() ) {
        return;
    }
 
    if ( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }
 
    // добавляем в массив текущий товар
    if ( ! in_array( get_the_ID(), $viewed_products ) ) {
        $viewed_products[] = get_the_ID();
    }
 
    // нет смысла хранить там бесконечное количество товаров
    if ( sizeof( $viewed_products ) > 12 ) {
        array_shift( $viewed_products ); // выкидываем первый элемент
    }
 
    // устанавливаем в куки
    wc_setcookie( 'woocommerce_recently_viewed_2', join( '|', $viewed_products ) );
 
}

add_shortcode( 'recently_viewed_products', 'recently_viewed_products' );
 
function recently_viewed_products() {
 
    if( empty( $_COOKIE[ 'woocommerce_recently_viewed_2' ] ) ) {
        $viewed_products = array();
    } else {
        $viewed_products = (array) explode( '|', $_COOKIE[ 'woocommerce_recently_viewed_2' ] );
    }
 
    if ( empty( $viewed_products ) ) {
        return;
    }
    if (count($viewed_products)>0) {
    echo '<section class="have-viewed"><h2>Вы просматривали</h2>';
    // надо ведь сначала отображать последние просмотренные
    $viewed_products = array_reverse( array_map( 'absint', $viewed_products ) );

 
    // $product_ids = join( ", ", $viewed_products );
    
        // return do_shortcode( "[products ids='$product_ids' per_page='".count($viewed_products)."' columns='".count($viewed_products)."']" );
		?>
		<div class="swiper woocommerce have-viewed-swiper">
            <div class="products swiper-wrapper">
				<?php
				$args = array( 'post_type' => 'product',
				'post__in' => $viewed_products);
				$loop = new WP_Query( $args );
				while( $loop->have_posts() ) :
				$loop->the_post(); ?>
					<div class="item swiper-slide">
						<?php wc_get_template_part( 'content', 'product' ); ?>
					</div>
				<?php endwhile; wp_reset_postdata();  ?>
			</div>
		</div>
		<div class="navigation">
			<div class="have-viewed-prev prev"></div>
			<div class="have-viewed-next next"></div>
		</div>
    <?php 
    echo '</section>';
    }
 
}

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);

//у товара цена 0

add_filter( 'woocommerce_get_price_html', 'product_price_free_zero_empty', 100, 2 );

function product_price_free_zero_empty( $price, $product ){
if ( '' === $product->get_price() || 0 == $product->get_price() ) {
    $price = '<span class="none-price__text">Цену уточняйте</span>';
}
return $price;
}

//woocommerce end

//виджет

function register_my_widgets(){
	register_sidebar( array(
		'name' => 'Боковая панель на главной странице',
		'id' => 'homepage-sidebar',
		'description' => 'Выводиться как боковая панель только на главной странице сайта.',
		'before_widget' => '<li class="homepage-widget-block">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_my_widgets' );

//post_type

register_post_type('main-slider', $args = array(
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'menu_icon' => 'dashicons-thumbs-up',
	'menu_position' => 7,
	'taxonomies' => array(),
	'supports' => array('title','editor','thumbnail'),
	'labels' => array(
		'name' => 'Слайдер',
		'singular_name' => 'Слайд',
		'add_new' => 'Создать Слайд',
		'add_new_item' => 'Слайд',
		'edit_item' => 'Слайд', 
		'new_item' => 'Слайд',
		'view_item' => 'Слайд',
		'search_items' => 'Слайд', 
		'not_found' => 'Слайда', 
		'not_found_in_trash' => 'Слайда', 
		'parent_item_colon' => '',
		'menu_name' => 'Слайдер', 
	)
));

register_post_type('subscribe', $args = array(
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'has_archive' => true,
	'hierarchical' => false,
	'menu_icon' => 'dashicons-email',
	'menu_position' => 7,
	'taxonomies' => array(),
	'supports' => array('title','editor','thumbnail'),
	'labels' => array(
		'name' => 'Подписка',
		'singular_name' => 'Подписка',
		'add_new' => 'Создать Подписку',
		'add_new_item' => 'Подписка',
		'edit_item' => 'Подписка', 
		'new_item' => 'Подписка',
		'view_item' => 'Подписка',
		'search_items' => 'Подписку', 
		'not_found' => 'Подписка', 
		'not_found_in_trash' => 'Подписка', 
		'parent_item_colon' => '',
		'menu_name' => 'Подписка', 
	)
));

?>