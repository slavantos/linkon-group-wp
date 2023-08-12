$(document).ready(function(){ 
var swiper = new Swiper(".tovary-mesyacza-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".tovary-mesyacza-next",
		prevEl: ".tovary-mesyacza-prev",
	},
});

var swiper2 = new Swiper(".sales-hits-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".sales-hits-next",
		prevEl: ".sales-hits-prev",
	},
});

var swiper3 = new Swiper(".new-products-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".new-products-next",
		prevEl: ".new-products-prev",
	},
});

var swiper4 = new Swiper(".you-will-like-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".you-will-like-next",
		prevEl: ".you-will-like-prev",
	},
});

var swiper5 = new Swiper(".popular-category", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".popular-category-next",
		prevEl: ".popular-category-prev",
	},
});

var swiper6 = new Swiper(".have-viewed-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".have-viewed-next",
		prevEl: ".have-viewed-prev",
	},
});

var swiper7 = new Swiper(".cross-sells-swiper", {
	slidesPerView: 'auto',
	spaceBetween: 26,
	watchSlidesProgress: true,
	navigation: {
		nextEl: ".cross-sells-next",
		prevEl: ".cross-sells-prev",
	},
});

var swiper8 = new Swiper(".main-swiper", {
	slidesPerView: 1,
	loop: true,
	autoplay: {
		delay: 2500,
		disableOnInteraction: false,
	},
	navigation: {
		nextEl: ".main-next",
		prevEl: ".main-prev",
	},
});

// single gallery
const sliderThumbs = new Swiper('.single-product-gallery__thumbs .swiper-container', {
	slidesPerView: 'auto',
	spaceBetween: 20, 
	navigation: { 
		nextEl: '.single-product-gallery__next', 
		prevEl: '.single-product-gallery__prev' 
	},
	freeMode: true,
});

$('.all-attr').on('click', function(){
	$(this).parents('.single').find('a[href="#tab-additional_information"]').click();
});

const sliderImages = new Swiper('.single-product-gallery__images .swiper-container', { 
	slidesPerView: 1,
	mousewheel: true, 
	navigation: { 
		nextEl: '.single-product-gallery__next', 
		prevEl: '.single-product-gallery__prev' 
	},
	grabCursor: true,
	thumbs: { 
		swiper: sliderThumbs 
	},
	breakpoints: { 
		0: {
			mousewheel: false, 
		}
	}
});

// document.querySelectorAll(".catalog__menu li").forEach(el => {
//     el.onmouseenter = function() {
// 		document.querySelector('.sub-menu').classList.remove('active');
// 		if (this.querySelector('.sub-menu')) {
// 			this.querySelector('.sub-menu').classList.add('active');
// 		}
// 	}
// });

// document.querySelector(".catalog__menu li").onmouseleave = function() {
//     document.querySelector('.sub-menu').classList.remove('active');
// }

// woocommerce количество в корзине

$('.woocommerce').on('change', '.qty', function(){
	$("[name='update_cart']").removeAttr("disabled").trigger("click");
});

$( 'body' ).on( 'click', 'button.plus, button.minus', function() {
 
	var qty = $(this).parent().find( 'input' ),
		val = parseInt( qty.val() ),
		min = parseInt( qty.attr( 'min' ) ),
		max = parseInt( qty.attr( 'max' ) ),
		step = parseInt( qty.attr( 'step' ) );
   
	// дальше меняем значение количества в зависимости от нажатия кнопки
	if ( $( this ).is( '.plus' ) ) {
	  if ( max && ( max <= val ) ) {
		qty.val( max );
		$(this).parents('.product-item').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
		$(this).parents('.single-product__price').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
	  } else {
		qty.val( val + step );
		$(this).parents('.product-item').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
		$(this).parents('.single-product__price').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
	  }
	} else {
	  if ( min && ( min >= val ) ) {
		qty.val( min );
		$(this).parents('.product-item').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
		$(this).parents('.single-product__price').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
	  } else if ( val > 0 ) {
		qty.val( val - step );
		$(this).parents('.product-item').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
		$(this).parents('.single-product__price').find('a.ajax_add_to_cart').attr('data-quantity', qty.val());
	  }
	}
	$("[name='update_cart']").removeAttr("disabled").trigger("click");

  });

//добавление количества товаров в каталоге

jQuery(function($){
    $(document.body).on('click', '.add_to_cart_button', function(){
        var button = $(this);
        setTimeout(function(){
			$('.cart .count').html(+$('.cart .count').text() + +button.data('quantity'));
            button.parents('.product-item').find('.quantity > input.qty').val(1); 
        }, 1000); 

    });
	$(document.body).on('click', '.add_to_wishlist', function(){
        var button = $(this);
        setTimeout(function(){
			$('.wishlist .count').html(+$('.wishlist .count').text() + 1);
        }, 1000); 
    });
	$(document.body).on('click', '.remove_from_wishlist', function(){
        var button = $(this);
        setTimeout(function(){
			$('.wishlist .count').html(+$('.wishlist .count').text() - 1);
        }, 1000); 
    });
	$(document.body).on('click', '.yith-wcwl-add-button .delete_item', function(){
        var button = $(this);
        setTimeout(function(){
			$('.wishlist .count').html(+$('.wishlist .count').text() - 1);
        }, 1000); 
    });
 });

//прокрутка
let isScroll = 0,
targetScroll = 400;
  
$(window).on('scroll', function(){
if(isScroll === 0 && $(this).scrollTop() >= targetScroll) {
  isScroll = 1;
  $('.bot__header').addClass('sticky');

} else if(isScroll === 1 && $(this).scrollTop() < targetScroll) {
  isScroll = 0;
  $('.bot__header').removeClass('sticky');
}
});

// в фильтре убрать пустые параметры 

$(window).on("load", function() {
	$('.woof_list').find('.disabled').parent().hide();
});

$(".orderby").each(function () {
    const _this = $(this),
        selectOption = _this.find("option"),
        selectOptionLength = selectOption.length,
        selectedOption = selectOption.filter(":selected"),
        duration = 450; // длительность анимации

    _this.hide();
    _this.wrap("<div class='select'></div>");
    $("<div>", {
        class: "new-select",
        text: _this.children("option:selected").text()
    }).insertAfter(_this);

    const selectHead = _this.next(".new-select");
    $("<div>", {
        class: "new-select__list"
    }).insertAfter(selectHead);

    const selectList = selectHead.next(".new-select__list");
    for (let i = 1; i < selectOptionLength; i++) {
        $("<div>", {
            class: "new-select__item",
            html: $("<span>", {
                text: selectOption.eq(i).text()
            })
        })
            .attr("data-value", selectOption.eq(i).val())
            .appendTo(selectList);
    }

    const selectItem = selectList.find(".new-select__item");
    selectList.slideUp(0);
    selectHead.on("click", function () {
        if (!$(this).hasClass("on")) {
            $(this).addClass("on");
            selectList.slideDown(duration);

            selectItem.on("click", function () {
                let chooseItem = $(this).data("value");

                $(".orderby").val(chooseItem).attr("selected", "selected");
				$(".orderby").change();
                selectHead.text($(this).find("span").text());

                selectList.slideUp(duration);
                selectHead.removeClass("on");
            });

        } else {
            $(this).removeClass("on");
            selectList.slideUp(duration);
        }
    });
});

let btnPopup = document.querySelectorAll('.btn-popup');
let popup = document.querySelector('.popup');
let closePopup = document.querySelector('.popup__close');
let popupThanks = document.querySelector('.popup-thanks');
let closePopupThanks = document.querySelector('.popup-thanks__close');
let closePopupThanks_2 = document.querySelector('.popup-thanks__btn');

if (btnPopup) {
  btnPopup.forEach(item=> {
    item.addEventListener('click', (e)=>{
        e.preventDefault();
        popup.classList.add('active');
    });
  })
}

closePopup.addEventListener('click', function(){
  popup.classList.remove('active');
});

popup.addEventListener('click', function(e){
  if (e.target === popup) {
    popup.classList.remove('active');
  }
});

closePopupThanks.addEventListener('click', function(){
  popupThanks.classList.remove('active');
});

closePopupThanks_2.addEventListener('click', function(){
  popupThanks.classList.remove('active');
});

popupThanks.addEventListener('click', function(e){
  if (e.target === popupThanks) {
    popupThanks.classList.remove('active');
  }
});

$('.mob__btn').on('click', function(){
	$('.aws-container').addClass('active');
});

$(document).mouseup( function(e){ 
	if ( !$('.aws-search-form').is(e.target) 
		&& $('.aws-search-form').has(e.target).length === 0 ) { 
			$('.aws-container').removeClass('active'); 
	}
});

function slider_nav(nameClass, count) {
	if($(`.${nameClass} .swiper-slide`).length < count){
		$(`.${nameClass}`).parent().find('.navigation').hide();
	}
}

$(document).ready(function (){
    mobResize();
	$(window).resize(function() {
		mobResize();
	});
});

function mobResize() {
	if ($(window).width() < 991 && $(window).width() > 501){
		slider_nav('tovary-mesyacza-swiper', 3);
		slider_nav('sales-hits-swiper', 3);
		slider_nav('new-products-swiper', 3);
		slider_nav('you-will-like-swiper', 3);
		slider_nav('popular-category', 3);
		slider_nav('cross-sells-swiper', 3);
		slider_nav('have-viewed-swiper', 3);
    } else if($(window).width() < 501) {
		slider_nav('tovary-mesyacza-swiper', 2);
		slider_nav('sales-hits-swiper', 2);
		slider_nav('new-products-swiper', 2);
		slider_nav('you-will-like-swiper', 2);
		slider_nav('popular-category', 2);
		slider_nav('cross-sells-swiper', 2);
		slider_nav('have-viewed-swiper', 2);
	} else {
		slider_nav('tovary-mesyacza-swiper', 5);
		slider_nav('sales-hits-swiper', 5);
		slider_nav('new-products-swiper', 5);
		slider_nav('you-will-like-swiper', 5);
		slider_nav('popular-category', 5);
		slider_nav('cross-sells-swiper', 5);
		slider_nav('have-viewed-swiper', 5);
	}
}

});