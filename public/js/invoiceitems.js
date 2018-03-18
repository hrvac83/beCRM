$(document).ready(function(){
		
		var item=$('#item');
		var price=$('#price');
		var amount=$('#amount');
		var tax=$('#tax');
		var i=0;
		var index;
		

		$('#additem').click(function(){
			if ((item.val()=="")||(price.val()=="")||(amount.val()=="")||(tax.val()=="")){
				alert('Sva polja moraju biti ispunjena');
			}
			else{
				i+=1;
				$('tbody').append('<tr><th id="'+i+'"scope="row">'+i+'</th><td>'+item.val()+'</td><td>'+price.val()+
					'</td><td>'+amount.val()+'</td><td>'+tax.val()+'</td>'+
					'<td><input type="button" class="btn btn-danger" value="X"></td></tr>');
				item.val('');
				price.val('');
				amount.val('');
				tax.val('');
				
			};			
		});

		$("tbody").on( "click", ".btn-danger", function() {
			
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

});
