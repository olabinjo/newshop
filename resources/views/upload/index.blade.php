@extends('layouts.app')

@section('content')

<body>

			<div class="container">
			@if(Session::has('success'))
				<div class="alert-box success">
					<h2>{!! Session::get('success') !!}</h2>
					
				</div>
			@endif
			<div class="form-group">
				<h2>Simple Multiple Upload</h2>
				{!!Form::open(array('url'=>'upload/uploadFiles', 'method'=>'Post','files'=>true)) !!}
				{!! Form::file('images[]', array('multiple'=>true)) !!}

				<p>{!! $errors->first('images') !!}</p>
				@if(Session::has('error'))

				<p>{!! Session::get('error')!!}</p>

				@endif

				{!! Form::submit('Submit', array('class'=>'btn btn-lg btn-primary col-md-4')) !!}

				{!! Form:: close()!!}
				


			</div>

			</div>
	



<body>




@endsection