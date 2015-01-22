jQuery(function($){
	$( '#brasa_slider_sortable_ul' ).sortable();
	$('#search-bt-slider').click(function(){
		var url = $('#brasa_slider_result').attr('data-url');
		var key = $('#search_brasa_slider').val();
		$('#brasa_slider_result').html('Buscando...');
		$.get( url + '?brasa_slider_ajax=true&key=' + key, function( data ) {
			$('#brasa_slider_result').html( data );
		});
	});
	$(document).on('click','#brasa_slider_result .brasa_slider_item',function(e){
		var html = $(this).html();
		var id = $(this).attr('data-post-id');
		$('#brasa_slider_sortable_ul').append('<li class="brasa_slider_item is_item" id="'+id+'" data-post-id="'+id+'">'+html+'</li>');
		$('#brasa_slider_result').html('');
	});
	$(document).on('click','#brasa_slider_sortable .rm-item',function(e){
		$(this).parent('li').hide('slow').remove();
	});
	var updateInput = function(){
		var posts = [];
		var i = 0;
		$('#brasa_slider_sortable li').each(function(){
			var id = $(this).attr('data-post-id');
			posts.push(id);
			i++;
		});
		$('#brasa_slider_hide').val(posts.join());
		console.log(posts.join());
		console.log('contador::'+i);
	}
	$(document).on('submit', '#post',function(e){
		updateInput();
	});
	$('body').on('click',function(e){
		updateInput();
	});


	//$( '#brasa_slider_sortable' ).on( 'sortchange', updateInput() );
});
