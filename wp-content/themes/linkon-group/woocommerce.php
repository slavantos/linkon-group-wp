<?php
if (is_single() || is_page()) { # Товар 

    get_template_part('single-product');

} elseif (is_tax()) {

    if (is_tax('product_cat')) { # Категория / Подкатегория 

        get_template_part('category-product');

    } elseif (is_tax('product_tag')) { # Метка 

        get_template_part('category-product');

    } else { # Другие таксономии 

        woocommerce_content();
    }

} else { # Каталог товаров 

    get_template_part('category-product');
}
