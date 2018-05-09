$(document).ready(function(){
		
		var description=$('#description');
		var price=$('#price');
		var amount=$('#amount');
		var tax=$('#tax');
		var code=$('#code');
		var module=$('#module');
		var sum_wo_tax=0;
		var sum_all=0;
		var i=0;
		var index;
		var price_sub;
		var amount_sub;
		var tax_sub;

		var date_input=$('input[name="date"]'); 
      	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      	var options={
	        format: 'dd/mm/yyyy',
	        container: container,
	        todayHighlight: true,
	        autoclose: true,
      	};
      	date_input.datepicker(options);
	

		$('#additem').click(function(){

			$("#code").parsley().validate();
			$("#description").parsley().validate();
			$("#module").parsley().validate();
			$("#price").parsley().validate();
			$("#amount").parsley().validate();
			$("#tax").parsley().validate();
			if(!$("#code").parsley().isValid()){return;};
			if(!$("#description").parsley().isValid()){return;};
			if(!$("#module").parsley().isValid()){return;};
			if(!$("#price").parsley().isValid()){return;};
			if(!$("#amount").parsley().isValid()){return;};
			if(!$("#tax").parsley().isValid()){return;};

			if ((code.val()=="")||(description.val()=="")||(module.val()=="")||(price.val()=="")||(amount.val()=="")||(tax.val()=="")){
				alert('Sva polja moraju biti ispunjena');
			}
			else
			{
				i+=1;
				$("#item_table").append('<tr><th id="'+i+'"scope="row">'+i+'</th><td class="code">'+code.val()+'</td><td class="description">'+description.val()+
					'</td><td class="module">'+module.val()+'</td><td class="price">'+price.val()+'</td><td class="amount">'+amount.val()+'</td><td class="tax">'+tax.val()+'</td>'+
					'<td><input type="button" class="btn btn-danger" value="X"></td></tr>');

				sum_wo_tax +=(+price.val())*(+amount.val());
				sum_all+=(+price.val())*(+amount.val())+(+price.val())*(+amount.val())*((+tax.val())/100);
				$("#price_without_tax").html(sum_wo_tax);
				$("#price_with_tax").html(sum_all);

				description.val('');
				price.val('');
				amount.val('');
				tax.val('');
				code.val('');
				module.val('');
				
			};			
		});

		$("#item_table").on( "click", ".btn-danger", function() {
			
			index=$(this).closest('tr').find('th').html();
			price_sub=$(this).closest('tr').find('.price').html();
			amount_sub=$(this).closest('tr').find('.amount').html();
			tax_sub=$(this).closest('tr').find('.tax').html();
			sum_wo_tax-=(+price_sub)*(+amount_sub);
			sum_all-=(+price_sub)*(+amount_sub)+((+price_sub)*(+amount_sub)*((+tax_sub)/100));

			$("#price_without_tax").html(sum_wo_tax);
			$("#price_with_tax").html(sum_all);

			$(this).parent().parent().remove(); 
  			
  			for(j=index;j<=i;++j){
  				$('#'+j).html(j-1).attr("id", j-1);
  			};
  			i--;
		});

		$("#deleteall").click(function(){

			$("#item_table").empty();
			sum_wo_tax=0;
			sum_all=0;
			i=0;
			$("#price_without_tax").html(sum_wo_tax);
			$("#price_with_tax").html(sum_all);

		});


		$(".clickable-row").click(function() {

			//this commented code looks equal to code below but works only once?!!!????
			/*
        	$("#code").attr("value", $(this).find('.code').html());
        	$("#description").attr("value", $(this).find('.desc').html());
        	$("#module").attr("value", $(this).find('.mod').html());
        	$("#price").attr("value", $(this).find('.price').html());
			*/
			code.val($(this).find('.code').html());
        	description.val($(this).find('.desc').html());
        	module.val($(this).find('.mod').html());
        	price.val($(this).find('.price').html());

        	$('#itemsModal').modal('hide');
    	});

    	$("#create_invoice").click(function(){

    		//data validation
            $("#sellerName").parsley().validate();
            $("#sellerAddress").parsley().validate();
            $("#sellerOib").parsley().validate();
            $("#buyerName").parsley().validate();
            $("#buyerAddress").parsley().validate();
            $("#buyerOib").parsley().validate();
            $("#date").parsley().validate();
            if(!$("#sellerName").parsley().isValid()){return;};
            if(!$("#sellerAddress").parsley().isValid()){return;};
            if(!$("#sellerOib").parsley().isValid()){return;};
            if(!$("#buyerName").parsley().isValid()){return;};
            if(!$("#buyerAddress").parsley().isValid()){return;};
            if(!$("#buyerOib").parsley().isValid()){return;};
            if(!$("#date").parsley().isValid()){return;};

            var rowCount = $('#item_table tr').length;
    		if (rowCount==0) {
    			alert('Račun mora imati barem jednu stavku!');
    			return false;
    		};

        	$('#item_table tr').each(function(){

        		var row_code=$(this).find('.code').html();
        		var row_desc=$(this).find('.description').html();
        		var row_mod=$(this).find('.module').html();
        		var row_price=$(this).find('.price').html();
        		var row_amount=$(this).find('.amount').html();
        		var row_tax=$(this).find('.tax').html();
        		var token = $("input[name='_token']").val();
        		var item_path = $("#invoice_item_route").val();

        		console.log(item_path);

        		$.post( item_path, { _token: token, _method: "POST", code:row_code, description:row_desc, module:row_mod, price:row_price })
				 .done(function( data ) {
				  	alert(data);
				 });
        		
        	});

    	});



});
