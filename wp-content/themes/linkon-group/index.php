<?php get_header(); ?>

<section class="main-slider">
    <div class="container">
        <div class="content">
            <div class="empty"></div>
            <div class="main-swiper swiper">
                <div class="swiper-wrapper">
                    <?php	
                    $args = array( 'post_type' => 'main-slider',
                        'order' => 'ASC' );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts() ) :
                        $loop->the_post(); ?>
                        <div class="swiper-slide item">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="navigation">
                    <div class="main-prev"></div>
                    <div class="main-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="slider-products">
    <div class="container">
        <div class="header">
            <h2>
                Товары месяца
            </h2>
            <a href="/product-category/tovary-mesyacza" class="link">
                Смотреть все
            </a>
        </div>
        <div class="body">
            <div class="swiper woocommerce tovary-mesyacza-swiper">
                <div class="products swiper-wrapper">
                    <?php	
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'product_cat' => 'tovary-mesyacza',
                        'order' => 'ASC' );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts() ) :
                    $loop->the_post(); ?>
                        <div class="item swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="navigation">
                <div class="tovary-mesyacza-prev prev"></div>
                <div class="tovary-mesyacza-next next"></div>
            </div>
        </div>
    </div>
</section>
<section class="slider-products">
    <div class="container">
        <div class="header">
            <h2>
                Вам это понравится
            </h2>
            <a href="/product-category/you-will-like" class="link">
                Смотреть все
            </a>
        </div>
        <div class="body">
            <div class="swiper woocommerce you-will-like-swiper">
                <div class="products swiper-wrapper">
                    <?php	
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'product_cat' => 'you-will-like',
                        'order' => 'ASC' );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts() ) :
                    $loop->the_post(); ?>
                        <div class="item swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="navigation">
                <div class="you-will-like-prev prev"></div>
                <div class="you-will-like-next next"></div>
            </div>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">
        <h2>
            О нас
        </h2>
        <div class="body">
            <div class="title">
                <?php the_field('about_title', get_the_ID()); ?>
            </div>
            <div class="description">
                <?php the_field('about_description', get_the_ID()); ?>
            </div>
            <div class="list">
                <?php 
			    for ($i=1; $i < 5 ; $i++) { 
				$advantage = get_field('about_advantage-' . $i, get_the_ID());	
				if( $advantage): ?>
                <div class="item">
                    <div class="percent">
                        <div class="pie animate no-round" style="--p:<?php echo $advantage['percent']; ?>;">
                            <?php echo $advantage['percent']; ?>
                        </div>
                    </div>
                    <div class="name">
                        <?php echo $advantage['name']; ?>
                    </div>
                </div>
                <?php 
				    endif; 
			    } ?>
            </div>
        </div>
    </div>
</section>
<section class="slider-products slider-products__category">
    <div class="container">
        <div class="header">
            <h2>
                Популярные категории
            </h2>
            <!-- <a href="/tovary-mesyacza" class="link">
                Смотреть все
            </a> -->
        </div>
        <div class="body">
            <div class="swiper woocommerce popular-category popular-category-swiper">
                <div class="products swiper-wrapper">
                <?php 
                    $parentid = 39;
            
                    $args = array(
                        'child_of' => $parentid,
                        // 'number' => 12,
                    );
                    
                    $terms = get_terms( 'product_cat', $args );
                    
                    if ( $terms ) {
                        foreach ( $terms as $term ) {
                            $populars_cat = get_field('popular_category','product_cat_'.$term -> term_id);
                            if ($populars_cat) {
                                foreach ($populars_cat as $popular_cat) { ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="item">
                                            <div class="img">
                                                <?php woocommerce_subcategory_thumbnail( $term ); ?>
                                            </div>
                                            <div class="name">
                                                <?php echo $term->name; ?>
                                            </div>
                                            <div class="count__products">
                                                Товаров: 
                                                <?php $category = get_term( $term -> term_id, 'product_cat' );
                                                echo $category->count; ?>
                                            </div>
                                        </a>
                                    </div>
                                <?php }  
                            }
                    } ?>
                <?php }?>
                </div>
            </div>
            <div class="navigation">
                <div class="popular-category-prev prev"></div>
                <div class="popular-category-next next"></div>
            </div>
        </div>
    </div>
</section>
<section class="banner">
    <div class="container">
        <div class="body">
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-1', get_the_ID()); ?>" alt="banner"></a>
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-2', get_the_ID()); ?>" alt="banner"></a>
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-3', get_the_ID()); ?>" alt="banner"></a>
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-4', get_the_ID()); ?>" alt="banner"></a>
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-5', get_the_ID()); ?>" alt="banner"></a>
            <a href="/banner" class="item"><img src="<?php the_field('banner_img-6', get_the_ID()); ?>" alt="banner"></a>
        </div>
    </div>
</section>
<section class="slider-products">
    <div class="container">
        <div class="header">
            <h2>
                Хиты продаж
            </h2>
            <a href="/product-category/sales-hits" class="link">
                Смотреть все
            </a>
        </div>
        <div class="body">
            <div class="swiper woocommerce sales-hits-swiper">
                <div class="products swiper-wrapper">
                    <?php	
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'product_cat' => 'sales-hits',
                        'order' => 'ASC' );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts() ) :
                    $loop->the_post(); ?>
                        <div class="item swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="navigation">
                <div class="sales-hits-prev prev"></div>
                <div class="sales-hits-next next"></div>
            </div>
        </div>
    </div>
</section>
<section class="slider-products">
    <div class="container">
        <div class="header">
            <h2>
                Новинки
            </h2>
            <a href="/product-category/new-products" class="link">
                Смотреть все
            </a>
        </div>
        <div class="body">
            <div class="swiper woocommerce new-products-swiper">
                <div class="products swiper-wrapper">
                    <?php	
                    $args = array( 'post_type' => 'product', 'posts_per_page' => 12, 'product_cat' => 'new-products',
                        'order' => 'ASC' );
                    $loop = new WP_Query( $args );
                    while( $loop->have_posts() ) :
                    $loop->the_post(); ?>
                        <div class="item swiper-slide">
                            <?php wc_get_template_part( 'content', 'product' ); ?>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <div class="navigation">
                <div class="new-products-prev prev"></div>
                <div class="new-products-next next"></div>
            </div>
        </div>
    </div>
</section>
<section class="brands">
    <div class="container">
        <div class="head">
            <h2>
                Популярные бренды
            </h2>
            <a href="/brands" class="link">Все производители</a>
        </div>
        <div class="body">
            <?php 
                $parentid = 19;
         
                $args = array(
                    'parent' => $parentid,
                    // 'number' => 12,
                );
                $i = 1;
                $terms = get_terms( 'product_cat', $args );
                 
                if ( $terms ) {
                    foreach ( $terms as $term ) {
                        $populars = get_field('popular-brand','product_cat_'.$term -> term_id);
                        if ($populars && $i <= 12) {
                            foreach ($populars as $popular) { 
                                $i++; ?>
                                <a href="<?php echo esc_url( get_term_link( $term ) ); ?>" class="item">
                                    <?php woocommerce_subcategory_thumbnail( $term ); ?>
                                </a>
                            <?php }  
                        }
                    } ?>
            <?php } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>