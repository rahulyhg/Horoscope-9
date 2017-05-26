@extends('layouts.app')

@section('content')
	{!! Form::model($customer,['id'=>'customer_edit','route' => ['customers.update',$customer->id], 'class' => 'form-horizontal','method'=>'PUT']) !!}
		<div class="form-group">
			<div class="col-md-6">
				{!! Form::label('name', 'First Name',['class'=>'control-label']) !!}
				{!! Form::text('first_name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.', "disabled")) !!}
			</div>
			<div class="col-md-6">
				{!! Form::label('name', 'Last Name',['class'=>'control-label']) !!}
				{!! Form::text('last_name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.' ,"disabled")) !!}
			</div>
		</div>

		<div class="form-group">
		    <div class="col-md-6">
				{!! Form::label('date_time_of_birth', 'Date of Birth',['class'=>'control-label']) !!}
					<input class="form-control" data-required-message = "Please Enter Your Date of Birth" disabled="disabled"  name="date_of_birth" type="text" value = "{{$customer->date_of_birth}} {{$customer->time_of_birth}}">
				</div>

			<div class="col-md-6">

					{!! Form::label('place_of_birth', 'Place Of Birth',['class'=>'control-label']) !!}
					{!! Form::text('place_of_birth',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter gender' ,"disabled")) !!}

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
				{!! Form::submit('Save',array('class'=>'btn btn-info btn-single')) !!}	

				{!! Form::button('Cancel',array('class'=>'btn btn-info btn-single','onclick'=>'history.go(-1);')) !!}
				
				{!! Form::close() !!}
			</div>	
    	</div>

		

	{!! Form::close() !!}

@endsection
