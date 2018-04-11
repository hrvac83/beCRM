<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<title>Registracija</title>

	</head>
	<body>
		<div class="container">
		    <div class="row">
		        <div class="col-md-offset-4 col-md-3">
		            <div class="form-reg">
			            <h4 class="page-header">Registracija</h4>
			            {!! Form::open() !!}
			  			{{	Form::text('name', null, array('class'=>'form-control input-sm chat-input','placeholder'=>'Ime', 'maxlength'=>'191','required'=>'')) }}
			  			</br>
			  			{{	Form::text('last_name', null, array('class'=>'form-control input-sm chat-input','placeholder'=>'Prezime', 'maxlength'=>'191','required'=>'')) }}
			            </br>
			            {{	Form::email('email', null, array('class'=>'form-control input-sm chat-input', 'placeholder'=>'email', 'maxlength'=>'50','required'=>'')) }}
			            </br>
			            {{	Form::password('password', array('class'=>'form-control input-sm chat-input','placeholder'=>'Lozinka', 'maxlength'=>'20','required'=>'')) }}
			            </br>
			            {{	Form::password('password_confirm', array('class'=>'form-control input-sm chat-input','placeholder'=>'Ponovite lozinku', 'maxlength'=>'20','required'=>'')) }}
			            </br>
				        {{ Form::submit('Registriraj se ', array('class'=>'btn btn-primary btn-md btn-block')) }}
			            {!! Form::close() !!}
		            </div>
		        
		        </div>
		    </div>
		</div>
	

	</body>
</html>	
