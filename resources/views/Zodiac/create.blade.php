@extends('layouts.app')

@section('content')
	{!! Form::open(array('route' => 'zodiacs.store', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-name">Name</label>
	        <div class="col-xs-10">
	            <input type="text" id="zodiac-name" class="form-control" placeholder="zodiac Name" name="name">
	            <span class="help-block"></span>
	        </div>
	    </div>
	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-description">Description</label>
	        <div class="col-xs-10">
	        	<textarea name="zodiac_description" id="zodiac-description" class="form-control" rows="10"></textarea>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-color_description">Zodiac Traits</label>
	        <div class="col-xs-10">
	        	<textarea name="traits" id="zodiac-traits" class="form-control" rows="10"></textarea>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="gemstone-name">Gemstone Name</label>
	        <div class="col-xs-10">
	            <input type="text" id="gemstone-name" class="form-control" placeholder="Gemstone Name" name="gemstone_name">
	            <span class="help-block"></span>
	        </div>
	    </div>
	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="gemstone-description">Gemstone Description</label>
	        <div class="col-xs-10">
	        	<textarea name="gemstone_description" id="gemstone-description" class="form-control" rows="10"></textarea>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="gemstone-carat">Gemstone Carat</label>
	        <div class="col-xs-10">
	            <input type="text" id="gemstone-carat" class="form-control" placeholder="Purity of Gemstone(Carat)" name="carat">
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-luckyNumber">Lucky Number</label>
	        <div class="col-xs-10">
	           <select name="lucky_number" class="form-control">
	           		<option value="">---------------------------Select Lucky Number ---------------</option>
		           	@for ($i = 1; $i < 9; $i++)
	           			<option value="{{ $i }}">{{ $i }}</option>
		           	@endfor
		        </select>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-luckyNumber">Lucky Color</label>
	        <div class="col-xs-10">
	           <select name="lucky_color" class="form-control">
	           		<option value="">---------------------------Select Lucky Color ---------------</option>
	           		<option value="red">Red</option>
	           		<option value="white">White</option>
	           		<option value="green">Green</option>
	           		<option value="yellow">Yellow</option>
	           		<option value="grey">Grey</option>
	           		<option value="purple">Purple</option>
	           		<option value="black">Black</option>
	           		<option value="purple_and_black">Purple and Black</option>
	           		<option value="red_and_grey">Red and Grey</option>
		        </select>
	            <span class="help-block"></span>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="zodiac-color_description">Color Description</label>
	        <div class="col-xs-10">
	        	<textarea name="color_description" id="zodiac-color_description" class="form-control" rows="10"></textarea>
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
