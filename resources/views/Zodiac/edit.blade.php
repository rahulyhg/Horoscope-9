@extends('layouts.app')

@section('content')
{!! Form::model($zodiac,['id'=>'zodiac-update','route' => ['zodiacs.update', $zodiac->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}

		<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						{!! Form::label('name', 'Name',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::text('name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter name','data-pattern-message'=>'Only letters are allowed.','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						{!! Form::label('zodiac_description', 'Description',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::textarea('zodiac_description',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter description','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						{!! Form::label('traits', 'Zodiac Traits',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::textarea('traits',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter traits of this zodiac','required')) !!}
					</div>
				</div>
			</div>

		    <div class="form-group">
		        <label class="col-xs-2 control-label" for="zodiac-carat">Gemstone</label>
		        <div class="col-xs-10">
		        	{!! Form::text('gemstone_name',null,array('class'=>'form-control ','data-trigger'=>'change focusout','pattern'=>'^[a-zA-Z\\s]+','data-required-message'=>'Please enter gemstone name','data-pattern-message'=>'Only letters are allowed.','required')) !!}
		            <span class="help-block"></span>
		        </div>
		    </div>
			
			<div class="form-group">
		        <label class="col-xs-2 control-label" for="zodiac-carat">Gemstone Purity(carat)</label>
		        <div class="col-xs-10">
		        	{!! Form::number('carat',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter gemstone purity in carat')) !!}
		            <span class="help-block"></span>
		        </div>
		    </div>

		    <div class="form-group">
				<div class="row">
					<div class="col-md-2">
						{!! Form::label('gemstone_description', 'Gemstone Description',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::textarea('gemstone_description',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter description','required')) !!}
					</div>
				</div>
			</div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-luckyNumber">Lucky Number</label>
	        <div class="col-xs-10">
	           <select name="lucky_number" class="form-control">
	           		<option value="">---------------------------Select Lucky Number ---------------</option>
		           	@for ($i = 1; $i < 9; $i++)
	           			<option value="{{ $i }}" @if($i == $zodiac->lucky_number) selected='selected' @endif>{{ $i }}</option>
		           	@endfor
		        </select>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-luckyNumber">Lucky Color</label>
	        <div class="col-xs-10">
	           <select name="lucky_color" class="form-control">
	           		<option value="" >---------------------------Select Lucky Color ---------------</option>
	           		<option value="red" @if($zodiac->lucky_color == "red") selected='selected' @endif>Red</option>
	           		<option value="white" @if($zodiac->lucky_color == "white") selected='selected' @endif>White</option>
	           		<option value="green" @if($zodiac->lucky_color == "green") selected='selected' @endif>Green</option>
	           		<option value="yellow" @if($zodiac->lucky_color == "yellow") selected='selected' @endif>Yellow</option>
	           		<option value="grey" @if($zodiac->lucky_color == "grey") selected='selected' @endif>Grey</option>
	           		<option value="purple" @if($zodiac->lucky_color == "purple") selected='selected' @endif>Purple</option>
	           		<option value="black" @if($zodiac->lucky_color == "black") selected='selected' @endif>Black</option>
	           		<option value="purple_and_black" @if($zodiac->lucky_color == "purple_and_black") selected='selected' @endif>Purple and Black</option>
	           		<option value="red_and_grey" @if($zodiac->lucky_color == "red_and_grey") selected='selected' @endif>Red and Grey</option>
		        </select>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-color_description">Color Description</label>
	        <div class="col-xs-10">
	        	{!! Form::textarea('color_description',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter Color description','required','id'=>'zodiac-color_description','rows'=>10)) !!}
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	    	<label class="col-xs-2 control-label" for="zodiac-submit">Submit</label>
	        <div class="col-xs-10">
	    		<button type="submit" id="zodiac-submit" class="btn btn-default">Submit</button>
	    	</div>
	    </div>
	{!! Form::close() !!}

@endsection
