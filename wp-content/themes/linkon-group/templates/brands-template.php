<?php /**
 * Template Name: Бренды
 */ get_header();?>

 <div class="breads">
 	<div class="container">
 		<?php echo wpcourses_breadcrumb( ' / ' ); ?>
 	</div>
 </div>

<section class="page-brands min-height">
	<div class="container">
		<h2>
			<?php the_title(); ?>
		</h2>
		<div class="body">
            <?php
                if( isset($_GET['showall']) ):
                    $args = array( 'hide_empty' => 0 );
                else:
                    $page = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
                    $per_page = 18;
                    $offset = ( $page-1 ) * $per_page;
                    $args = array('parent' => 19, 'number' => $per_page, 'offset' => $offset, 'hide_empty' => 0 );
                endif;

                $taxonomy = 'product_cat';
                $tax_terms = get_terms( $taxonomy, $args );

                foreach ($tax_terms as $tax_term) { ?>
                    <a href="<?php echo esc_url( get_term_link( $tax_term ) ); ?>?name_brand=<?php echo $tax_term->slug; ?>" class="item">
                        <?php woocommerce_subcategory_thumbnail( $tax_term ); ?>
                    </a>
                <?php } ?>
		</div>
        <div class="pagination">
        <?php 
            if( !isset($_GET['showall']) ):
            $total_terms = wp_count_terms( $taxonomy, $args );
            $pages = ceil($total_terms/$per_page);
            if( $pages > 1 ):
                $big = 999999999;
                echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => $page,
                    'prev_text' => is_rtl() ? '&rarr;' : '&larr;',
				    'next_text' => is_rtl() ? '&larr;' : '&rarr;',
                    'total' => ceil($total_terms / $per_page),
                    'end_size'  => 1,
				    'mid_size'  => 1,
                ));
            endif;      
        endif; ?>
        </div>
	</div>
</section>

 <?php get_footer(); ?>