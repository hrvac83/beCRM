@extends('main')

@section('title','|Informacije o tvrtki')

@section ('content')

<div class="row col-md-6">
	<div class="panel panel-default">
	  <div class="panel-heading">Informacije o tvrtki</div>
	  <div class="panel-body">
		  	<strong><h3>Ime tvrtke:</h3></strong>
			<h4>{{ $company->name }}</h4>
			<br>
			<strong><h3>Adresa tvrtke:</h3></strong>
			<h4>{{ $company->address }}</h4>
			<br>
			<strong><h3>OIB/PDVid tvrtke:</h3></strong>
			<h4>{{ $company->oib }}</h4>
	  </div>
	  <div class="panel-footer">
	  	<a href="{{ route('company.edit', ['company' => $company->id])}}" class='btn btn-primary'>Uredi</a>
	  </div>
	</div>
</div>


@stop