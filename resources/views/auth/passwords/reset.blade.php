<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        {!! Html::style('css/parsley.css') !!}
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		{!! Html::script('js/parsley.min.js') !!}

		<title>Zaboravljena lozinka</title>

	</head>
	<body>
		<!--temporary errors experiment-->
		@if (count($errors)>0)

			<div class="alert alert-danger" role="alert">
				<strong>Errors:</strong><ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
				</ul>
			</div>

		@endif
		<div class="container">
		    <div class="row">
		        <div class="col-md-offset-5 col-md-3">
		            <div class="form-login">
		            	<h4 class="page-header">Reset lozinke</h4>
			            {!! Form::open(array('url'=>'password/reset', 'data-parsley-validate' => '')) !!}

			            {{ Form::hidden('token', $token) }}
			            {{ Form::label('email','Email:') }}
			            {{	Form::email('email', $email, array('class'=>'form-control input-sm chat-input', 'maxlength'=>'50','required'=>'')) }}
			            </br>
			            {{ Form::label('password', 'Nova lozinka:') }}
			            {{	Form::password('password', array('class'=>'form-control input-sm chat-input','placeholder'=>'Lozinka', 'minlength'=>'6', 'maxlength'=>'20','required'=>'')) }}
			            </br>
			            {{ Form::label('password_confirmation', 'Potvrdi novu lozinku:') }}
			            {{	Form::password('password_confirmation', array('class'=>'form-control input-sm chat-input','placeholder'=>'Ponovite lozinku', 'minlength'=>'6', 'maxlength'=>'20','required'=>'')) }}
			        	</br>
				        {{ Form::submit('Reset', array('class'=>'btn btn-primary btn-block')) }}
			            
			            {!! Form::close() !!}
		            </div>
		        
		        </div>
		    </div>
		</div>

	</body>
</html>