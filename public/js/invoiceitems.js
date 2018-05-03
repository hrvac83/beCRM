$(document).ready(function(){
		
		var description=$('#description');
		var price=$('#price');
		var amount=$('#amount');
		var tax=$('#tax');
		var code=$('#code');
		var module=$('#module');
		var i=0;
		var index;
		

		$('#additem').click(function(){

			if ((code.val()=="")||(description.val()=="")||(module.val()=="")||(price.val()=="")||(amount.val()=="")||(tax.val()=="")){
				alert('Sva polja moraju biti ispunjena');
			}
			else
			{
				i+=1;
				$("#item_table").append('<tr><th id="'+i+'"scope="row">'+i+'</th><td>'+code.val()+'</td><td>'+description.val()+
					'</td><td>'+module.val()+'</td><td>'+price.val()+'</td><td>'+amount.val()+'</td><td>'+tax.val()+'</td>'+
					'<td><input type="button" class="btn btn-danger" value="X"></td></tr>');
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
			$(this).parent().parent().remove(); 			
  			
  			for(j=index;j<=i;++j){
  				$('#'+j).html(j-1).attr("id", j-1);
  			};
  			i--;
		});

		$("#deleteall").click(function(){
			$('tbody').empty();
			i=0;
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
