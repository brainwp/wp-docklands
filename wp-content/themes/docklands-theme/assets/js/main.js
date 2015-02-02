;(function(e){e.fn.visible=function(t,n,r){var i=e(this).eq(0),s=i.get(0),o=e(window),u=o.scrollTop(),a=u+o.height(),f=o.scrollLeft(),l=f+o.width(),c=i.offset().top,h=c+i.height(),p=i.offset().left,d=p+i.width(),v=t===true?h:c,m=t===true?c:h,g=t===true?d:p,y=t===true?p:d,b=n===true?s.offsetWidth*s.offsetHeight:true,r=r?r:"both";if(r==="both")return!!b&&m<=a&&v>=u&&y<=l&&g>=f;else if(r==="vertical")return!!b&&m<=a&&v>=u;else if(r==="horizontal")return!!b&&y<=l&&g>=f}})(jQuery);
jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();
	$('.only-onecheck').on('click', function() {
	// in the handler, 'this' refers to the box clicked on
	var $box = $(this);
	if ($box.is(":checked")) {
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		// the checked state of the group/box on the other hand will change
		// and the current value is retrieved using .prop() method
		$(group).prop("checked", false);
		$box.prop("checked", true);
	} else {
		$box.prop("checked", false);
	}
	});
	$('.product-cat-list').on('click',function(e){
		e.preventDefault();
		var slug = $(this).attr('data-slug');
		$('#input-categories').attr('value',slug);
		$('#advanced-search').submit();
	});
	$('li.cat-parent').hover(
		function() {
			if($(this).attr('data-open') != 'true'){
				$(this).attr('data-open','true');
				$(this).children('ul.children').show('medium');
			}
		}, function() {
			if($(this).attr('data-open') == 'true'){
				$(this).attr('data-open','false');
				$(this).children('ul.children').hide('medium');
		    }
		}
	);
	$('.toggle .title').on('click',function(){
		father = $(this).parent('.toggle');
		icon = $(this).find('.icon-open-close');
		if(father.attr('data-open') == 'false' || !father.attr('data-open')){
			father.addClass('open');
			father.attr('data-open','true');
			icon.html('-');
		}
		else if(father.attr('data-open') == 'true'){
			father.removeClass('open');
			father.attr('data-open','false');
			icon.html('+');
		}
	});
	$('.clear-form').on('click',function(){
		$('form').trigger('reset')
	})
	$('ul#price-selector li').on('click',function(){
		$('ul#price-selector li.active').removeClass('active');
		$('#price-input').attr('value',$(this).attr('data-slug'));
		$(this).addClass('active');
	});
	var config1 = {
		"id": $('#twitter-fetcher').attr('data-widget-id'),
		"domId": 'twitter-fetcher',
		"maxTweets": $('#twitter-fetcher').attr('data-widget-max'),
		"enableLinks": true,
		"showTime": false,
		"showRetweet": false,
		"showInteraction": false
	};
	twitterFetcher.fetch(config1);

	$('#selector_qty').on('change',function(e){
		$('input.qty').val($(this).val());
	});
	$('#odin-add-to-cart').on('click',function(e){
		$('form.cart').submit();
	});
	$('#slider-cat').slick({
		infinite: true,
		slidesToShow: 3,
		slidesToScroll: 1
	});
	$('.movescroll').each(function(){
		elem = $(this).attr('href');
		if($(elem).visible() == true){
			$(this).hide();
		}
	});
	$(window).scroll(function(){
		$('.movescroll').each(function(){
			elem = $(this).attr('href');
			if($(elem).visible() == true){
				$(this).fadeOut('slow');
			}
			else{
				$(this).fadeIn('slow');
			}
		});
	});
	$('.movescroll').on('click',function(e){
		e.preventDefault();
		elem = $(this).attr('href');
		$('html,body').animate({scrollTop:$(elem).offset().top},1000);
	});
});

