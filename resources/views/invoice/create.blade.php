@extends('main')

@section('title','|Novi račun')


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
	  	<h4 class="page-header">Podaci izdavatelja računa</h4>
		    <div class="form-group col-md-5">
		      <label for="sellerName">Ime</label>
		      <input type="text" class="form-control" id="sellerName" value="{{ Auth::user()->company->name }}">
		    </div>
		    <div class="form-group col-md-5">
		      <label for="sellerAddress">Adresa</label>
		      <input type="text" class="form-control" id="sellerAddress" value="{{ Auth::user()->company->address }}">
		    </div>
		    <div class="form-group col-md-2">
		      <label for="sellerOib">OIB/PDV broj</label>
		      <input type="text" class="form-control" id="sellerOib" value="{{ Auth::user()->company->oib }}">
		    </div>
		</div>
			<div class="form-row">
				<h4 class="page-header">Podaci kupca</h4>
			    <div class="form-group col-md-5">
			      <label for="buyerName">Ime</label>
			      <input type="text" class="form-control" id="buyerName" placeholder="Ime">
			    </div>
			    <div class="form-group col-md-5">
			      <label for="buyerAddress">Adresa</label>
			      <input type="text" class="form-control" id="buyerAddress" placeholder="Adresa">
			    </div>
			    <div class="form-group col-md-2">
			      <label for="buyerOib">OIB/PDV broj</label>
			      <input type="text" class="form-control" id="buyerOib" placeholder="OIB/PDV broj">
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
				    <input type="text" class="form-control" id="code" required>
				</div>
				<div class="form-group col-md-3">
					<label for="description">Opis</label>
				    <input type="text" class="form-control" id="description" required>
				</div>
				<div class="form-group col-md-1">
					<label for="module">J.M.</label>
				    <input type="text" class="form-control" id="module" required>
				</div>
				<div class="form-group col-md-2">
					<label for="price">Cijena</label>
				    <input type="text" class="form-control" id="price" required>
				</div>
				<div class="form-group col-md-1">
					<label for="amount">Količina</label>
				    <input type="text" class="form-control" id="amount" required>
				</div>
				<div class="form-group col-md-1">
					<label for="tax">PDV</label>
				    <input type="text" class="form-control" id="tax" required>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-success" id="additem">Dodaj stavku</button>
				</div>
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemsModal" id="loaditem">Učitaj stavku</button>
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
		<div class="form-group col-md-12">
			<div class="well col-md-3">
				<h5>Ukupna cijena bez PDV-a:</h5>
				<strong><p id="price_without_tax">0.00</p></strong>
				<h5>Ukupna cijena:</h5>
				<strong><p id="price_with_tax">0.00</p></strong>
			</div>
		</div>
	</div>

	<input type="hidden" id="store_route" value="{{ route('invoice.store') }}">

@stop

@section('javascript')
<script src ="{{ asset('/js/invoiceitems.js') }}"></script>
@stop