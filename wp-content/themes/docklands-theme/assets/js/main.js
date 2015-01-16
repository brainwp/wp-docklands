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
	$('#advanced-search input:checkbox').on('click', function() {
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
		console.log('oieee');
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
});

