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
		"maxTweets": 5,
		"enableLinks": true,
		"showTime": false,
		"showRetweet": false,
		"showInteraction": false
	};
	twitterFetcher.fetch(config1);

	$('#selector_qty').on('change',function(e){
		console.log('chamou');
		$('input.qty').val($(this).val());
	});
	$('#odin-add-to-cart').on('click',function(e){
		$('form.cart').submit();
	});
});

