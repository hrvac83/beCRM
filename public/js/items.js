$(document).ready(function(){

	$("tbody").on( "click", ".btn-primary", function() {

		num1 = $(this).closest('tr').find('td').html();
		num = num1.split('<')[0];
		id = $(this).closest('tr').find("#id_"+num).val();
		code = $(this).closest('tr').find('td').eq(1).html();
		desc = $(this).closest('tr').find('td').eq(2).html();
		mod = $(this).closest('tr').find('td').eq(3).html();
		price = $(this).closest('tr').find('td').eq(4).html();

		
		$(this).parent().parent().html("<td>"+num+"</td><td><input type=\"text\" class=\"form-control\" name=\"u-code\" id=\"u-code_"+code+"\" value=\""+code+"\">"+
										"</td><td><input type=\"text\" class=\"form-control\" name=\"u-description\" id=\"u-description_"+code+"\" value=\""+desc+"\">"+
										"</td><td><input type=\"text\" class=\"form-control\" name=\"u-module\" id=\"u-module_"+code+"\" value=\""+mod+"\">"+
										"</td><td><input type=\"text\" class=\"form-control\" name=\"u-price\"id=\"u-price_"+code+"\" value=\""+price+"\">"+
										"</td><td><input class=\"btn btn-success btn-xs save_btn\" value=\"Spremi\" data-code=\""+code+"\">"+
										"<input class=\"btn btn-warning btn-xs \" value=\"Odustani\"</td>");
		
	});


	$("tbody").on( "click", ".save_btn", function() {
		
		var j_code  = $(this).data('code');
		var u_code  = $('#u-code_'+j_code).val();
		var u_desc = $('#u-description_'+j_code).val();
		var u_module = $('#u-module_'+j_code).val();
		var u_price = $('#u-price_'+j_code).val();
		var token = $("input[name='_token']").val();
		var tpl_path = $("#update_route").val();
		var real_path = tpl_path.replace('ID', id);

		console.log(u_code);
		$.post( real_path, { _token: token, _method: "PUT", test: "success", description: u_desc, module:u_module, price:u_price, item_code:u_code })
		  .done(function( data ) {
		    alert(data.test);
		    location.reload(true);
		  });

	});


	$("tbody").on( "click", ".btn-warning", function() {
		location.reload(true);
	});

});