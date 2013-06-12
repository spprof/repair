$(document).ready(function() {
	var $cont = $('#performer-search-form'),
		$columns = $cont.find('.span4'),
		$btn_more = $cont.find('.performer-search_btn-more')
		;
	$columns.each(function(){
		var $checks = $(this).find('label.checkbox'),
			check_count = $checks.lengt;
		if (check_count > 3) {
			for (var i = check_count - 3; i <= check_count; i++) {
				$checks.eq(i).addClass('hidden');
			};
		}
	});

	$btn_more.bind('click',function(){
		$columns.find('label.checkbox').removeClass('hidden');
		$(this).addClass('hidden');
	});

});
