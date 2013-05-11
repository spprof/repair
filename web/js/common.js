$(function () {
	$('.spec-item-rating a').tooltip();

    $('#registerTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	$('#inputOrgType').change(function () {
		if($(this).val()=='Команда'){
			$('.control-group-peoples').slideDown();
			$('.control-group-org').slideUp();
		}else
    	if($(this).val()=='Официальная компания'){
    		$('.control-group-org, .control-group-peoples').slideDown();
    	}else $('.control-group-org, .control-group-peoples').slideUp();
    })
});