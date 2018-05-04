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
		

		$('#additem').click(function(){

			if ((code.val()=="")||(description.val()=="")||(module.val()=="")||(price.val()=="")||(amount.val()=="")||(tax.val()=="")){
				alert('Sva polja moraju biti ispunjena');
			}
			else
			{
				i+=1;
				$("#item_table").append('<tr><th id="'+i+'"scope="row">'+i+'</th><td>'+code.val()+'</td><td>'+description.val()+
					'</td><td>'+module.val()+'</td><td class="price">'+price.val()+'</td><td class="amount">'+amount.val()+'</td><td class="tax">'+tax.val()+'</td>'+
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


});
