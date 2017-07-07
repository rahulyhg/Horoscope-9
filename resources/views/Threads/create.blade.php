@extends('layouts.app')

@section('content')
	{!! Form::open(array('route' => 'threads.store', 'class' => 'form-horizontal')) !!}
	<div class="form-group">
		<div class="col-lg-6">
		{!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
		{!! Form::text('name', null, ['class'=>'form-control','data-trigger'=>'change focusout']) !!}
		</div>
		
		</div>
			{!! Form::submit('Submit', ['class'=>'btn btn-default']) !!}
		
	</div>
	{!! Form::close() !!}

@endsection
