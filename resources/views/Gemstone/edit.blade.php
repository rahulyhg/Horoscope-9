@extends('layouts.app')

@section('content')
	{!! Form::model($gemstone,['id'=>'gemstone-update','route' => ['gemstones.update', $gemstone->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}

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
						{!! Form::label('description', 'Description',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::textarea('description',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter description','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-2">
						{!! Form::label('carat', 'Carat',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-10">
						{!! Form::number('carat',null,array('class'=>'form-control ','data-trigger'=>'change focusout','data-required-message'=>'Please enter carat','required','min'=>0)) !!}
					</div>
				</div>
			</div>
		

			<div class="form-group">
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						{!! Form::submit('Save',array('class'=>'btn btn-info btn-single')) !!}	

						{!! Form::button('Cancel',array('class'=>'btn btn-info btn-single','onclick'=>'history.go(-1);')) !!}
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>


		{!! Form::close() !!}

@endsection
