(function($) {
    'use strict';

    var woocommerce = {};
    edgtf.modules.woocommerce = woocommerce;

    woocommerce.edgtfOnDocumentReady = edgtfOnDocumentReady;
    woocommerce.edgtfOnWindowLoad = edgtfOnWindowLoad;
    woocommerce.edgtfOnWindowResize = edgtfOnWindowResize;

    $(document).ready(edgtfOnDocumentReady);
    $(window).load(edgtfOnWindowLoad);
    $(window).resize(edgtfOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function edgtfOnDocumentReady() {
        edgtfInitQuantityButtons();
        edgtfInitSelect2();
	    edgtfInitSingleProductLightbox();
	    edgtfInitShopPagination();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function edgtfOnWindowLoad() {
        edgtfInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function edgtfOnWindowResize() {
        edgtfInitProductListMasonryShortcode();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function edgtfInitQuantityButtons() {
		$(document).on('click', '.edgtf-quantity-minus, .edgtf-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.edgtf-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('edgtf-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function edgtfInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.edgtf-woocommerce-page .edgtf-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function edgtfInitSingleProductLightbox() {
		var item = $('.edgtf-woo-single-page.edgtf-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof edgtf.modules.common.edgtfPrettyPhoto === "function") {
				edgtf.modules.common.edgtfPrettyPhoto();
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function edgtfInitProductListMasonryShortcode() {
		var container = $('.edgtf-pl-holder.edgtf-masonry-layout .edgtf-pl-outer');
		
		if (container.length) {
			container.each(function () {
				var thisContainer = $(this),
					size = thisContainer.find('.edgtf-pl-sizer').width();
				
				thisContainer.waitForImages(function () {
					thisContainer.isotope({
						itemSelector: '.edgtf-pli',
						resizable: false,
						masonry: {
							columnWidth: '.edgtf-pl-sizer',
							gutter: '.edgtf-pl-gutter'
						}
					});
					
					edgtfResizeWooCommerceMasonryLayoutItems(size, thisContainer);
					
					thisContainer.isotope('layout').css('opacity', 1);
				});
			});
		}
	}
	
	function edgtfResizeWooCommerceMasonryLayoutItems(size,container){
		if(container.find('.edgtf-woo-image-large-width').length || container.find('.edgtf-woo-image-large-height').length || container.find('.edgtf-woo-image-large-width-height').length) {
			var space_between_items = parseInt(container.find('.edgtf-pli').css('paddingLeft'), 10),
				newSize = size - 2 * space_between_items,
				defaultMasonryItem = container.find('.edgtf-woo-image-small'),
				largeWidthMasonryItem = container.find('.edgtf-woo-image-large-width'),
				largeHeightMasonryItem = container.find('.edgtf-woo-image-large-height'),
				largeWidthHeightMasonryItem = container.find('.edgtf-woo-image-large-width-height');
			
			defaultMasonryItem.css('height', newSize);
			largeHeightMasonryItem.css('height', Math.round(2 * ( newSize + space_between_items )));
			
			if (edgtf.windowWidth > 680) {
				largeWidthHeightMasonryItem.css('height', Math.round(2 * ( newSize + space_between_items )));
				largeWidthMasonryItem.css('height', newSize);
			} else {
				largeWidthHeightMasonryItem.css('height', newSize);
				largeWidthMasonryItem.css('height', Math.round(newSize / 2));
			}
		}
	}

	/*
	 ** Set pagination arrows
	 */
	function edgtfInitShopPagination() {
		var item = $('.woocommerce-pagination');

		if(item.length) {
			item.find('.next').parent().addClass('edgtf-pag-next');
			item.find('.prev').parent().addClass('edgtf-pag-prev');
		}
	}

})(jQuery);