$(document).ready(function(){


	$("tbody").on( "click", ".edit_btn", function() {

		num1 = $(this).closest('tr').find('td').html();
		num = num1.split('<')[0];
		id = $("#id_"+num).val();
		code = $("#code_"+num).html();
		desc = $("#desc_"+num).html();
		mod = $("#mod_"+num).html();
		price = $("#price_"+num).html();

		
		$("#row_"+num).html("<td>"+num+"</td><td><input type=\"text\" class=\"form-control\" required=\"\" maxlength=\"15\" name=\"u-code\" id=\"u-code_"+code+"\" value=\""+code+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" required=\"\" maxlength=\"191\" name=\"u-description\" id=\"u-description_"+code+"\" value=\""+desc+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" maxlength=\"10\" name=\"u-module\" id=\"u-module_"+code+"\" value=\""+mod+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" data-parsley-type=\"number\" step=\"0.1\" name=\"u-price\"id=\"u-price_"+code+"\" value=\""+price+"\">"+
							"</td><td><input class=\"btn btn-success btn-xs save_btn\" value=\"Spremi\" data-code=\""+code+"\">"+
							"<input class=\"btn btn-warning btn-xs \" value=\"Odustani\"</td>");
		
		$(".edit_btn").css("visibility", "hidden");
		$(".del_btn").css("visibility", "hidden");
		
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

		$('#u-code_'+j_code).parsley().validate();
		$('#u-description_'+j_code).parsley().validate();
		$('#u-module_'+j_code).parsley().validate();
		$('#u-price_'+j_code).parsley().validate();

		console.log(u_code);
		$.post( real_path, { _token: token, _method: "PUT", test: "success", description: u_desc, module:u_module, price:u_price, item_code:u_code })
		  .done(function( data ) {
		  	alert(data);
		    location.reload(true);
		  });

	});


	$("tbody").on( "click", ".btn-warning", function() {
		location.reload(true);
	});

});