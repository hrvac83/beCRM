@extends('main')

@section('title','|Stavke')

@section ('content')

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <h1 class="page-header">Stavke računa</h1>
  <hr>
	{!! Form::open(['route' => 'items.store']) !!}
	
	<div class="form-group col-md-2">
  		{{	Form::label('code', 'Šifra')	}}
  		{{	Form::text('code', null, array('class'=>'form-control'))	}}
	</div>
	<div class="form-group col-md-4">
  		{{	Form::label('description', 'Opis')	}}
  		{{	Form::text('description', null, array('class'=>'form-control'))	}}
	</div>
	<div class="form-group col-md-2">
  		{{	Form::label('module', 'J.M.')	}}
  		{{	Form::text('module', null, array('class'=>'form-control'))	}}
	</div>
	<div class="form-group col-md-2">
  		{{	Form::label('price', 'Cijena bez PDV')	}}
  		{{	Form::text('price', null, array('class'=>'form-control'))	}}
	</div>
	<div class="form-group col-md-2">
  		{{	Form::submit('Dodaj stavku', array('class'=>'btn btn-success btn-lg btn-block'))	}}
	</div>


	{!! Form::close() !!}

</div>  



@endsection