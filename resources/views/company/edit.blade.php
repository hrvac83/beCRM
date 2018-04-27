@extends('main')

@section('title','|Uredi informacije o tvrtki')

@section ('content')

<div class="row col-md-6">
	<div class="panel panel-default">
		{!! Form::open(array('url' => $uri, 'method' => 'PUT', 'data-parsley-validate' => '')) !!}
	  	<div class="panel-heading">Informacije o tvrtki</div>
	  	<div class="panel-body">
	  	
			{{ Form::label('name', 'Ime tvrtke:')	}}
			{{ Form::text('name', $company->name , array('class'=>'form-control', 'required'=>'', 'maxlength'=>'191')) }}
			{{ Form::label('address', 'Adresa tvrtke:')	}}
			{{ Form::text('address', $company->address, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'191')) }}
			{{ Form::label('oib', 'OIB/PDV-id:')	}}
			{{ Form::text('oib', $company->oib, array('class'=>'form-control', 'maxlength'=>'20')) }}

	  	</div>
	  	<div class="panel-footer">
	  		{{ Form::submit('Spremi', array('class'=>'btn btn-success btn-block')) }}
	  	</div>
	  	{!! Form::close() !!}
	</div>
</div>


@stop