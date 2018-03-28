@if (Session::has('success'))

	<div class="alert alert-success" role="alert">
  		<strong> {{ Session::get('success') }} </strong>
	</div>

@endif

<!-- ista stvar kao gore 
<?php
/*
if(Session::has('success')){
	echo ('<div class="alert alert-success" role="alert">
  			<strong>'.Session::get('success').'</strong></div>');
};
*/
?>
-->

@if (count($errors)>0)

	<div class="alert alert-danger" role="alert">
		<strong>Errors:</strong><ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>

@endif