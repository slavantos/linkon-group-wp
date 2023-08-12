<?php function theme_name_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        array(
            'product_grid'          => array( // параметры вывода товаров на страницах архивов 
                'default_rows'      => 3,
                'min_rows'          => 1,
                'default_columns'   => 4,
                'min_columns'       => 1,
                'max_columns'       => 6,
            ),
        )
    );
    add_theme_support( 'wc-product-gallery-zoom' );     # Увеличение изображений 
    add_theme_support( 'wc-product-gallery-lightbox' ); # Модальные окна 
    add_theme_support( 'wc-product-gallery-slider' );   # Слайдер изображений 
}
add_action( 'after_setup_theme', 'theme_name_woocommerce_setup' ); ?>