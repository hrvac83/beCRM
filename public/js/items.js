$(document).ready(function(){

	$("tbody").on( "click", ".btn-primary", function() {

		code = $(this).closest('tr').find('td').html();
		$(this).parent().parent().remove();
		alert (code);
	});

});