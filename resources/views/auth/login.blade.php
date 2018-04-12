<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<title>Prijava</title>

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
		
		<!--temporary help-->
		{{Auth::check()? "Logged in":"Logged out"}}

		<div class="container">
		    <div class="row">
		        <div class="col-md-offset-5 col-md-3">
		            <div class="form-login">
		            	<h4 class="page-header">Prijava</h4>
			            {!! Form::open(array('data-parsley-validate' => '')) !!}
			            {{	Form::email('email', null, array('class'=>'form-control input-sm chat-input', 'placeholder'=>'email', 'maxlength'=>'50','required'=>'')) }}
			            </br>
			            {{	Form::password('password', array('class'=>'form-control input-sm chat-input','placeholder'=>'Lozinka', 'maxlength'=>'20','required'=>'')) }}
			            </br>
			            {{ Form::checkbox('remember') }}
			            {{ Form::label('remember', "Zapamti me") }}
			            </br>
				        {{ Form::submit('Prijavi se ', array('class'=>'btn btn-primary btn-block')) }}
			            {!! Form::close() !!}
		            </div>
		        
		        </div>
		    </div>
		</div>
	

	</body>
</html>	
