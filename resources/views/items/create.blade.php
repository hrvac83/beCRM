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
					
							<tr id="row_{{$key+1}}">
								<td>{{ $key+1 }}<input type="hidden" id="id_{{$key+1}}" value="{{ $row->id }}"></td>
								<td id="code_{{$key+1}}">{{ $row->item_code }}</td>
								<td id="desc_{{$key+1}}">{{ $row->description }}</td>
								<td id="mod_{{$key+1}}">{{ $row->module }}</td>
								<td id="price_{{$key+1}}">{{ $row->price }}</td>
								<td>								
									{{ Form::button('Uredi', array('class' => 'btn btn-primary btn-block btn-xs edit_btn')) }}
									{!! Form::open(["route"=>["items.destroy", $row->item_code], "method" => "DELETE"]); !!}
									{!! Form::submit("Briši ", array("class"=>"btn btn-danger btn-block btn-xs del_btn")); !!}
									{!! Form::close(); !!}
								</td>
								
							</tr>
					@endforeach
						
				</tbody>
			</table>

			<div class="text-center">
				{!! $items->links(); !!}
				<br>
				{{ 'Page '.$items->currentPage().' of '.ceil($items->total()/$items->perPage()) }}
			</div>
		</div>
	</div>
	
 <input type="hidden" id="update_route" value="{{ route('items.update', ['id' => 'ID']) }}">

@stop

@section('javascript')

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/items.js') !!}

@stop