@extends('main')

@section('title','|Nova tvrtka')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@stop

@section ('content')

	<h2 class="page-header">Prijavi novu tvrtku</h2>
	<div class="form-row col-md-6">
		{!! Form::open(array('route' => 'company.store', 'data-parsley-validate' => '')) !!}

		{{ Form::label('name', 'Ime tvrtke:')	}}
		{{ Form::text('name', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'191')) }}
		{{ Form::label('address', 'Adresa tvrtke:')	}}
		{{ Form::text('address', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'191')) }}
		{{ Form::label('oib', 'OIB/PDV-id:')	}}
		{{ Form::text('oib', null, array('class'=>'form-control', 'maxlength'=>'20')) }}

		</br>
		{{ Form::submit('Spremi', array('class'=>'btn btn-success btn-block')) }}

		{!! Form::close() !!}
	</div>

@stop

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}

@stop