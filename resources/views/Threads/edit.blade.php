@extends('layouts.app')

@section('content')
	{!! Form::model($thread,['id'=>'zodiac-update','route' => ['threads.update', $thread->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
	<div class="form-group">
		<div class="col-lg-6">
			{!! Form::label('name', 'Name', ['class'=>'control-label']) !!}
			{!! Form::text('name', null, ['class'=>'form-control','data-trigger'=>'change focusout']) !!}
		</div>
		<div class="clearfix"></div>
		<div class="col-lg-6"> 
			{!! Form::submit('Submit', ['class'=>'btn btn-default']) !!}
		</div>
		
		</div>
		
	</div>
	{!! Form::close() !!}

@endsection
