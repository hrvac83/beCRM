@extends('main')

@section('title','|Novi račun')

@section ('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Novi račun</h1>
  <form>
		<div class="form-row"> 
	  	<h4 class="page-header">Podaci izdavatelja računa</h4>
		    <div class="form-group col-md-5">
		      <label for="sellerName">Ime</label>
		      <input type="text" class="form-control" id="sellerName" placeholder="Ime">
		    </div>
		    <div class="form-group col-md-5">
		      <label for="sellerAddress">Adresa</label>
		      <input type="text" class="form-control" id="sellerAddress" placeholder="Adresa">
		    </div>
		    <div class="form-group col-md-2">
		      <label for="sellerOib">OIB/PDV broj</label>
		      <input type="text" class="form-control" id="sellerOib" placeholder="OIB/PDV broj">
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
				<div class="form-group col-md-4">
					<label for="item">Stavka</label>
				    <input type="text" class="form-control" id="item" required>
				</div>
				<div class="form-group col-md-2">
					<label for="price">Jed. cijena</label>
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
					<button type="button" class="btn btn-default" id="additem">Dodaj stavku</button>
				</div>
				<div class="form-group col-md-2">
					<button type="button" class="btn btn-default" id="deleteall">Ukloni sve stavke</button>
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
				            <th>Stavka</th>
				            <th>Jedinična cijena</th>
				            <th>Količina</th>
				            <th>PDV</th>
				            <th>Ukloni stavku</th>
				        </tr>
				    </thead>
				    <tbody>	
					</tbody>
				</table>

			</div>

		</div>

	  		
	</form>

</div>
@endsection

@section('javascript')
<script src ="{{ asset('/js/invoiceitems.js') }}"></script>
@endsection