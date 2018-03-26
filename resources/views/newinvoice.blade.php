@extends('main')
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
		  		<button type="button" class="btn btn-default col-md-6" id="getcontacts">Potraži u kontaktima
		  		</button>
			    <div class="form-check col-md-6">
			      	<input class="form-check-input" type="checkbox" id="saveContact">
			      	<label class="form-check-label" for="saveContact">
			        	Spremi kontakt
			      	</label>
			    </div>
			</div>
	</div>

	  		
</form>

</div>




@endsection