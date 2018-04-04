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
		  		{{	Form::text('description', null, array('class'=>'form-control','maxlength'=>'191','required'=>'')) }}
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
		  		{{	Form::submit('Spremi', array('class'=>'btn btn-success btn-block btn-lg'))	}}
			</div>
			{!! Form::close() !!}
	 </div>
			
	 <div class="row">
		 <div class="form-group col-md-12">
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
						<th>Akcija</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach($items as $key => $row)
							<tr>{!! Form::open(array('route'=>['items.update',$row->item_code], "method" => "PUT" )) !!}
								<td>{{ $key+1 }}</td>
								<td>{{ $row->item_code }}</td>
								<td>{{ $row->description }}</td>
								<td>{{ $row->module }}</td>
								<td>{{ $row->price }}</td>
								<td>
									<div class="btn-group btn-block">
										{!! Form::submit('Spremi', array('class'=>'btn btn-success btn-xs', 'id'=>'save_'.($key+1), 'style'=>'visibility:hidden')) !!}
										{!! Form::close()!!}

										{{ Form::button('Poništi', array('class' => 'btn btn-warning btn-xs', 'id'=>'cancel_'.($key+1),'style'=>'visibility:hidden')) }}
									</div>
									<div class="btn-group btn-block">
										{{ Form::button('Uredi', array('class' => 'btn btn-primary btn-xs', 'id'=>'edit_'.($key+1))) }}

										{!! Form::open(["route"=>["items.destroy", $row->item_code], "method" => "DELETE"]); !!}

										{!! Form::submit("Briši ", array("class"=>"btn btn-danger btn-xs", 'id'=>'del_'.($key+1))); !!}

										{!! Form::close(); !!}
									</div>
								</td>
								
							</tr>
					@endforeach
						
					
					
				</tbody>
			</table>
		</div>
	</div>
	
 

@stop

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/items.js') !!}

@stop