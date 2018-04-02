$(document).ready(function(){

	$("tbody").on( "click", ".btn-primary", function() {

		num = $(this).closest('tr').find('td').html();
		code = $(this).closest('tr').find('td').eq(1).html();
		desc = $(this).closest('tr').find('td').eq(2).html();
		mod = $(this).closest('tr').find('td').eq(3).html();
		price = $(this).closest('tr').find('td').eq(4).html();

		$(this).parent().parent().html("<td>"+num+"</td><td><input type=\"text\" class=\"form-control\" id=\"code\" value=\""+code+"\"></td>"+
										"<td><input type=\"text\" class=\"form-control\" id=\"desc\" value=\""+desc+"\"></td>"+
										"<td><input type=\"text\" class=\"form-control\" id=\"mod\" value=\""+mod+"\"></td>"+
										"<td><input type=\"text\" class=\"form-control\" id=\"price\" value=\""+price+"\"></td>"+
										"<td><button type=\"button\" class=\"btn btn-success btn-sm btn-save\">Spremi</button></td>");
		
	});
	$("tbody").on( "click", ".btn-save", function() {

		num = $(this).closest('tr').find('td').html();
		code = $(this).closest('tr').find('#code').val();
		desc = $(this).closest('tr').find('#desc').val();
		mod = $(this).closest('tr').find('#mod').val();
		price = $(this).closest('tr').find('#price').val();
		
	});

});