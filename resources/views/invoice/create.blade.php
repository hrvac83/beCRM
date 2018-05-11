@extends('main')

@section('title','|Novi račun')

@section ('stylesheets')
	<!--Bootstrap datepicker plugin-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
	{!! Html::style('css/parsley.css') !!}
@stop


@section ('content')

<div class="modal fade" id="itemsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">Učitaj stavku</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			<table id="table_modal" class="table table-hover table-bordered">
			    <thead>
			        <tr class="clickable-row">
			            <th>#</th>
			            <th>Šifra</th>
						<th>Opis</th>
						<th>Jedinica mjere</th>
						<th>Cijena</th>
			        </tr>
			    </thead>
			    <tbody>	
			    	@foreach ($items as $key => $row)
			    	<tr class="clickable-row">
						<td>{{ $key+1 }}</td>
						<td class="code">{{ $row->item_code }}</td>
						<td class="desc">{{ $row->description }}</td>
						<td class="mod">{{ $row->module }}</td>
						<td class="price">{{ $row->price }}</td>
					</tr>
		        	@endforeach

				</tbody>
			</table>	
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
	      </div>
	    </div>
	  </div>
	</div>


  <h1 class="page-header">Novi račun</h1>
  <form>
  		<div class="form-row">
  			<div class="form-group col-md-12">
  				<div class="col-md-2">
	  				<label for="invoice_num">Broj računa</label>
			      	<input type="text" class="form-control" id="invoice_num" required="" value="">
			    </div>
  			</div>
  		</div>
		<div class="form-row"> 
	  	<h4 class="page-header">Podaci izdavatelja računa</h4>
		    <div class="form-group col-md-5">
		      <label for="sellerName">Ime</label>
		      <input type="text" class="form-control" id="sellerName" required="" value="{{ Auth::user()->company->name }}">
		    </div>
		    <div class="form-group col-md-5">
		      <label for="sellerAddress">Adresa</label>
		      <input type="text" class="form-control" id="sellerAddress" required="" value="{{ Auth::user()->company->address }}">
		    </div>
		    <div class="form-group col-md-2">
		      <label for="sellerOib">OIB/PDV broj</label>
		      <input type="text" class="form-control" id="sellerOib" required="" value="{{ Auth::user()->company->oib }}">
		    </div>
		</div>
			<div class="form-row">
				<h4 class="page-header">Podaci kupca</h4>
			    <div class="form-group col-md-5">
			      <label for="buyerName">Ime</label>
			      <input type="text" class="form-control" id="buyerName" placeholder="Ime" required="">
			    </div>
			    <div class="form-group col-md-5">
			      <label for="buyerAddress">Adresa</label>
			      <input type="text" class="form-control" id="buyerAddress" placeholder="Adresa" required="">
			    </div>
			    <div class="form-group col-md-2">
			      <label for="buyerOib">OIB/PDV broj</label>
			      <input type="text" class="form-control" id="buyerOib" placeholder="OIB/PDV broj" required="">
			    </div>
			</div>
    
		<div class="form-row">  
		    <div class="form-group col-md-4">
		  		<button type="button" class="btn btn-default col-md-6" id="getcontacts">Potraži u kontaktima</button>
		  	</div>
			 <div class="form-group col-md-4">
			     <input class="form-check-input" type="checkbox" id="saveContact">
			     <label class="form-check-label" for="saveContact">
			        	Spremi kontakt
			     </label>
			 </div>
			 <div class="form-group col-md-4">
			</div>
		</div>
			

<!--Invoice items-->
		<div class="form-row">
			<div class="form-group col-md-12 topmargin">
				<h4 class="page-header">Stavke računa</h4>
				<div class="form-group col-md-2">
					<label for="code">Šifra</label>
				    <input type="text" class="form-control" id="code" maxlength="15" required>
				</div>
				<div class="form-group col-md-3">
					<label for="description">Opis</label>
				    <input type="text" class="form-control" id="description" maxlength="191" required>
				</div>
				<div class="form-group col-md-1">
					<label for="module">J.M.</label>
				    <input type="text" class="form-control" id="module" maxlength="10" required>
				</div>
				<div class="form-group col-md-2">
					<label for="price">Cijena</label>
				    <input type="text" class="form-control" id="price" data-parsley-type="number" step="0.1" required>
				</div>
				<div class="form-group col-md-1">
					<label for="amount">Količina</label>
				    <input type="text" class="form-control" id="amount" data-parsley-type="number" step="0.1" required>
				</div>
				<div class="form-group col-md-1">
					<label for="tax">PDV</label>
				    <input type="text" class="form-control" id="tax" data-parsley-type="number" step="0.1" required>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-success" id="additem">Dodaj stavku</button>
				</div>
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#itemsModal" id="loaditem">Učitaj stavku</button>
				</div>
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-danger" id="deleteall">Ukloni sve stavke</button>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="table_outer form-group col-md-12">
				<!--Table-->
				<table class="table table-striped">
				    
				    <!--Table head-->
				    <thead>
				        <tr>
				            <th>#</th>
				            <th>Šifra</th>
							<th>Opis</th>
							<th>J.M.</th>
							<th>Cijena</th>
							<th>Količina</th>
							<th>PDV</th>
							<th>Ukloni stavku</th>
				        </tr>
				    </thead>
				    <tbody id="item_table">
					</tbody>
				</table>
			</div>
		</div>
		
	</form>

	<div class="form-row">
		<div class="form-group col-md-4">
			{{ Form::label('additional', 'Dodatne napomene:',['style'=>'display:block']) }}
        	{{ Form::textarea('additional', null, ['class' => 'form-control', 'size'=>'60x5', 'style'=>'display:block']) }}
		</div>

		<div class="form-group col-md-4">
			<div class="form-group col-md-12">
			      <label  for="payment_option">Načini plaćanja</label>
			      <select class="form-control" id="payment_option">
			        <option value="Gotovina">Gotovina</option>
			        <option value="Kartice">Kartice</option>
			        <option value="Ček">Ček</option>
			        <option value="Transakcijski račun">Transakcijski račun</option>
			      </select>
			</div>
			<div class="form-group col-md-12"> <!-- Date input -->
	        	<label class="control-label" for="date">Datum</label>
	        	<input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required=""/>
      		</div>
      	</div>
      	<div class="form-group well col-md-4">
				<h5>Ukupna cijena bez PDV-a:</h5>
				<strong><p id="price_without_tax">0.00</p></strong>
				<h5>Ukupna cijena:</h5>
				<strong><p id="price_with_tax">0.00</p></strong>
				{{ Form::button('Napravi račun', ['class' => 'btn btn-primary btn-block', 'id' => 'create_invoice']) }}
		</div>
	</div>

	{!! Form::token() !!}

	<input type="hidden" id="store_route" value="{{ route('invoice.store') }}">
	<input type="hidden" id="item_route" value="{{ route('items.invoice') }}">
	<input type="hidden" id="invoice_item_store" value="{{ route('invoice-item.store') }}">

@stop

@section('javascript')
	{!! Html::script('js/parsley.min.js') !!}
	<script src ="{{ asset('/js/invoiceitems.js') }}"></script>
	<!--Bootstrap datepicker plugin-->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

@stop