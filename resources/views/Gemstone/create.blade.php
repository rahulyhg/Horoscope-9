@extends('layouts.app')

@section('content')
	{!! Form::open(array('route' => 'gemstones.store', 'class' => 'form-horizontal')) !!}
		<div class="form-group">
	        <label class="col-xs-2 control-label" for="gemstone-name">Name</label>
	        <div class="col-xs-10">
	            <input type="text" id="gemstone-name" class="form-control" placeholder="Gemstone Name" name="name">
	            <span class="help-block"></span>
	        </div>
	    </div>
	    <div class="form-group">
	        <label class="col-xs-2 control-label" for="gemstone-description">Description</label>
	        <div class="col-xs-10">
	        	<textarea name="description" id="gemstone-description" class="form-control" rows="10"></textarea>
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
	    	<label class="col-xs-2 control-label" for="gemstone-submit">Submit</label>
	        <div class="col-xs-10">
	    		<button type="submit" id="gemstone-submit" class="btn btn-default">Submit</button>
	    	</div>
	    </div>
	{!! Form::close() !!}

@endsection
