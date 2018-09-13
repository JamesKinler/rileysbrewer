(function($) {
    'use strict';
	
	var masonryGalleryList = {};
	edgtf.modules.masonryGalleryList = masonryGalleryList;

    masonryGalleryList.edgtfInitMasonryGallery = edgtfInitMasonryGallery;

    masonryGalleryList.edgtfOnDocumentReady = edgtfOnDocumentReady;
	
	$(document).ready(edgtfOnDocumentReady);
	
	/*
	 All functions to be called on $(document).ready() should be in this function
	 */
	function edgtfOnDocumentReady() {
		edgtfInitMasonryGallery().init();
	}
	
	/**
	 * Masonry gallery, init masonry and resize pictures in grid
	 */
	function edgtfInitMasonryGallery() {
		var holder = $('.edgtf-masonry-gallery-holder');
		
		var initMasonryGallery = function (holderGallery, gallerySizer) {
			holderGallery.waitForImages(function () {
				holderGallery.isotope({
					layoutMode: 'packery',
					itemSelector: '.edgtf-mg-item',
					percentPosition: true,
					packery: {
						gutter: '.edgtf-mg-grid-gutter',
						columnWidth: '.edgtf-mg-grid-sizer'
					}
				});
				
				resizeMasonryGallery(holderGallery, gallerySizer.outerWidth());
				
				setTimeout(function() {
					holderGallery.animate({opacity: 1}).isotope('layout');
				}, 800);
			});
		};
		
		var resizeMasonryGallery = function(holder, size) {
			var rectangle_portrait = holder.find('.edgtf-mg-rectangle-portrait'),
				rectangle_landscape = holder.find('.edgtf-mg-rectangle-landscape'),
				square_big = holder.find('.edgtf-mg-square-big'),
				square_small = holder.find('.edgtf-mg-square-small'),
				space_between_items = parseInt( holder.find('.edgtf-mg-item').css('paddingLeft'), 10 ),
				newSize = size - 2 * space_between_items;
			
			square_small.css('height', newSize);
			rectangle_portrait.css('height', Math.round(2 * ( newSize + space_between_items )));
			
			if (edgtf.windowWidth > 680) {
				square_big.css('height', Math.round(2 * ( newSize + space_between_items )));
				rectangle_landscape.css('height', newSize);
			} else {
				square_big.css('height', newSize);
				rectangle_landscape.css('height', Math.round(newSize / 2));
			}
		};
		
		var reInitMasonryGallery = function (holderGallery, gallerySizer) {
			resizeMasonryGallery(holderGallery, gallerySizer.outerWidth());
			
			holderGallery.isotope('reloadItems');
		};
		
		return {
			init: function () {
				if (holder.length) {
					holder.each(function () {
						var thisHolder = $(this),
							holderGallery = thisHolder.children('.edgtf-mg-inner'),
							gallerySizer = holderGallery.children('.edgtf-mg-grid-sizer');
						
						initMasonryGallery(holderGallery, gallerySizer);
						
						$(window).resize(function () {
							reInitMasonryGallery(holderGallery, gallerySizer);
						});
					});
				}
			}
		};
	}

})(jQuery);