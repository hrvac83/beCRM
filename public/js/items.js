$(document).ready(function(){


	$("tbody").on( "click", ".edit_btn", function() {

		num1 = $(this).closest('tr').find('td').html();
		num = num1.split('<')[0];
		id = $("#id_"+num).val();
		code = $("#code_"+num).html();
		desc = $("#desc_"+num).html();
		mod = $("#mod_"+num).html();
		price = $("#price_"+num).html();

		
		$("#row_"+num).html("<td>"+num+"</td><td><input type=\"text\" class=\"form-control\" required=\"\" maxlength=\"15\" name=\"u-code\" id=\"u-code_"+id+"\" value=\""+code+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" required=\"\" maxlength=\"191\" name=\"u-description\" id=\"u-description_"+id+"\" value=\""+desc+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" maxlength=\"10\" name=\"u-module\" id=\"u-module_"+id+"\" value=\""+mod+"\">"+
							"</td><td><input type=\"text\" class=\"form-control\" data-parsley-type=\"number\" step=\"0.1\" name=\"u-price\"id=\"u-price_"+id+"\" value=\""+price+"\">"+
							"</td><td><input class=\"btn btn-success btn-xs save_btn\" value=\"Spremi\" data-code=\""+id+"\">"+
							"<input class=\"btn btn-warning btn-xs \" value=\"Odustani\"</td>");
		
		$(".edit_btn").css("visibility", "hidden");
		$(".del_btn").css("visibility", "hidden");
		
	});


	$("tbody").on( "click", ".save_btn", function() {
		
		var u_id  = $(this).data('code');
		var u_code  = $('#u-code_'+u_id).val();
		var u_desc = $('#u-description_'+u_id).val();
		var u_module = $('#u-module_'+u_id).val();
		var u_price = $('#u-price_'+u_id).val();
		var token = $("input[name='_token']").val();
		var tpl_path = $("#update_route").val();
		var real_path = tpl_path.replace('ID', u_id);

		$('#u-code_'+u_id).parsley().validate();
		$('#u-description_'+u_id).parsley().validate();
		$('#u-module_'+u_id).parsley().validate();
		$('#u-price_'+u_id).parsley().validate();
		if(!$('#u-code_'+u_id).parsley().isValid()){return;};
		if(!$('#u-description_'+u_id).parsley().isValid()){return;};
		if(!$('#u-module_'+u_id).parsley().isValid()){return;};
		if(!$('#u-price_'+u_id).parsley().isValid()){return;};


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