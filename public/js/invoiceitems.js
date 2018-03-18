$(document).ready(function(){
		
		var item=$('#item');
		var price=$('#price');
		var amount=$('#amount');
		var tax=$('#tax');
		var i=1;

		$('#additem').click(function(){
			if ((item.val()=="")||(price.val()=="")||(amount.val()=="")||(tax.val()=="")){
				alert('Sva polja moraju biti ispunjena');
			}
			else{
				$('tbody').append('<tr><th scope="row">'+i+'</th><td>'+item.val()+'</td><td>'+price.val()+
					'</td><td>'+amount.val()+'</td><td>'+tax.val()+'</td>'+
					'<td style="width:10%"><input type="button" class="btn btn-danger" value="X"></td></tr>');
				item.val('');
				price.val('');
				amount.val('');
				tax.val('');
				i++;
			};			
		});

		$("tbody").on( "click", ".btn-danger", function() {
  			$(this).parent().parent().empty();
		});

		$("#deleteall").click(function(){
			$('tbody').empty();

		});

});
