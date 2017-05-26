@extends('layouts.app')

@section('content')
	{!! Form::open(array('route' => 'customers.store', 'class' => 'form-horizontal','enctype'=> 'multipart/form-data')) !!}
		<div class="form-group">
			<div class="col-md-6">
				{!! Form::label('name', 'First Name',['class'=>'control-label']) !!}
				{!! Form::text('first_name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.')) !!}
			</div>
			<div class="col-md-6">
				{!! Form::label('name', 'Last Name',['class'=>'control-label']) !!}
				{!! Form::text('last_name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.')) !!}
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6">
				{!! Form::label('password', 'Password',['class'=>'control-label']) !!}
				{!! Form::password('password',array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter password')) !!}
			</div>
			<div class="col-md-6">
				{!! Form::label('confirm', 'Confirm Password',['class'=>'control-label']) !!}
				{!! Form::password('confirm_password',array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter password')) !!}
			</div>
		</div>

		<div class="form-group">
		    <div class="col-md-6">
				{!! Form::label('email', 'Email',['class'=>'control-label']) !!}
				{!! Form::email('email',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.')) !!}
			</div>
			<div class="col-md-6">
				{!! Form::label('gender', 'gender',['class'=>'control-label']) !!}
				{!! Form::select('gender',array('male'=>'Male','female'=>'Female','unspecified'=>'Unspecified'),null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter gender')) !!}
				</div>
		</div>

		<div class="form-group">
		    <div class="col-md-6">
					{!! Form::label('date_time_of_birth', 'Date of Birth',['class'=>'control-label']) !!}
					<input type="datetime-local" name="date_of_birth" value="" placeholder="" class="form-control" data-required-message = "Please Enter Your Date of Birth">
				</div>

			<div class="col-md-6">

					{!! Form::label('place_of_birth', 'Place Of Birth',['class'=>'control-label']) !!}
					{!! Form::text('place_of_birth',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter gender')) !!}

				</div>
		</div>

	    <div class="form-group">
	    	<div class="col-md-6">
					{!! Form::label('zodiac', 'Zodiac',['class'=>'control-label']) !!}
			    <select name="zodiac_id" class="form-control">
	           		<option value="">---------------------------Select Zodiac ---------------</option>
		           	@forelse ($zodiacs as $zodiac)
	           			<option value="{{ $zodiac->id }}">{{ $zodiac->name }}</option>
	           		@empty
	           			<option value="">No Zodiacs Assigned</option>}
		           	@endforelse
		        </select>
	            <span class="help-block"></span>
			</div>
			<div class="col-md-6">
				{!! Form::label('phone_number', 'Phone Number',['class'=>'control-label']) !!}
				{!! Form::text('phone_number',null,array('class'=>'form-control','data-trigger'=>'change focusout')) !!}
			</div>
	    		
	    	</div>

		<div class="row">
		    <div class="form-group">
				<div class="col-md-2">
					{!! Form::label('image', 'Image',['class'=>'control-label']) !!}
				</div>
				<div class="col-md-10">
					<input type="file" name="image"  accept="image/*" class="btn btn-default btn-file">
	            	<span class="help-block"></span>
				</div>
			</div>

		</div>

		<div class="row">
		    <div class="form-group">
				<div class="col-md-2">
					{!! Form::label('bio', 'bio',['class'=>'control-label']) !!}
				</div>
				<div class="col-md-10">
						{!! Form::textarea('bio',null,array('class'=>'form-control','rows'=>10)) !!}
	            	<span class="help-block"></span>
				</div>
			</div>

		</div>

	    <div class="form-group">
			<div class="row">
				<div class="col-md-2">
					{!! Form::label('Submit', 'Submit',['class'=>'control-label']) !!}
					
				</div>
				<div class="col-md-10">
					{!! Form::submit('Save',array('class'=>'btn btn-info btn-single')) !!}	

					{!! Form::button('Cancel',array('class'=>'btn btn-info btn-single','onclick'=>'history.go(-1);')) !!}
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>


	{!! Form::close() !!}

@endsection
