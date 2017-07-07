@extends('layouts.app')

@section('content')
	{!! Form::open(array('route' => 'users.store', 'class' => 'form-horizontal')) !!}
	<div class="form-group">
		<div class="col-lg-6">
		{!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
		{!! Form::text('name', null, ['class'=>'form-control','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.']) !!}
		</div>
		<div class="col-lg-6">
			
		{!! Form::label('username', 'Username', ['class'=>'control-label']) !!}
		{!! Form::text('username', null, ['class'=>'form-control']) !!}
			
		</div>

		<div class="col-lg-6">
			{!! Form::label('email', 'Email', ['class'=>'control-label']) !!}
			{!! Form::email('email', null, ['class'=>'form-control']) !!}
		</div>
		<div class="col-lg-6">
			{!! Form::label('phone_number', 'Phone', ['class'=>'control-label']) !!}
			{!! Form::text('phone', null, ['class'=>'form-control']) !!}
		</div>
		<div class="col-lg-6">
			{!! Form::label('password', 'Password', ['class'=>'control-label']) !!}
			{!! Form::password('password', ['class'=>'form-control']) !!}	
		</div>
		<div class="col-lg-6">
			{!! Form::label('conform_password', 'Confirm Password', ['class'=>'control-label']) !!}
			{!! Form::password('confirm_password', ['class'=>'form-control']) !!}	
		</div>
		</div>
			{!! Form::submit('Submit', ['class'=>'btn btn-default']) !!}
		
	</div>
	{!! Form::close() !!}

@endsection
