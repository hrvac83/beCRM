@extends('main')

@section('title','|Stavke')

@section('stylesheets')

	{!! Html::style('css/parsley.css') !!}

@stop

@section ('content')

	 <h1 class="page-header">Stavke računa</h1>
	 <hr>
	 <div class="form-row">
			{!! Form::open(array('route' => 'items.store', 'data-parsley-validate' => '')) !!}
			<div class="form-group col-md-2">
		  		{{	Form::label('code', 'Šifra')	}}
		  		{{	Form::text('code', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'15'))	}}
			</div>
			<div class="form-group col-md-4">
		  		{{	Form::label('description', 'Opis')	}}
		  		{{	Form::text('description', null, array('class'=>'form-control','maxlength'=>'191','required'=>''))	}}
			</div>
			<div class="form-group col-md-2">
		  		{{	Form::label('module', 'J.M.')	}}
		  		{{	Form::text('module', null, array('class'=>'form-control', 'maxlength'=>'10'))	}}
			</div>
			<div class="form-group col-md-2">
		  		{{	Form::label('price', 'Cijena')	}}
		  		{{	Form::text('price', null, array('class'=>'form-control', 'data-parsley-type'=>'number', 'step'=>'0.1'))	}}
			</div>
			<div class="form-group col-md-2">
		  		{{	Form::submit('Dodaj stavku', array('class'=>'btn btn-success btn-block'))	}}
			</div>
			{!! Form::close() !!}
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
						<th>Jedinica mjere</th>
						<th>Cijena</th>
					</tr>
				</thead>
				<tbody>	
				</tbody>
			</table>
		</div>
	</div>
 

@stop

@section('javascript')

	{!! Html::script('js/parsley.min.js')!!}

@stop