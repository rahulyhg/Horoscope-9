@extends('layouts.app')
	@section('content')
		{!! Form::open(['route' => 'weeklystore','id'=>'weekly-create','class'=>'form-horizontal','role'=>'form','enctype'=> 'multipart/form-data']) !!}

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('for_date', 'Date',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9 input-group" id="datetimepicker1">
						<input type="date" name="for_date"  class="form-control" data-required-message = "Please Enter Date For Horoscope" required="required">
                    </span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('mesha', 'Mesha',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('mesha',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('brisha', 'brisha',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('brisha',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('mithuna', 'Mithuna',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('mithuna',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('karkata', 'Karkata',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('karkata',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('simha', 'Simha',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('simha',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('kanya', 'kanya',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('kanya',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('tula', 'Tula',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('tula',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('brishika', 'Brishika',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('brishika',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('dhanu', 'Dhanu',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('dhanu',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('makara', 'Makara',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('makara',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('kumbha', 'Kumbha',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('kumbha',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>

			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
						{!! Form::label('meena', 'Meena',['class'=>'control-label']) !!}
					</div>
					<div class="col-md-9">
						{!! Form::textarea('meena',null,array('class'=>'form-control ','required')) !!}
					</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="row">
					<div class="col-md-3">
					{{ Form::hidden('horoscope_type', 'weekly') }}
						
					</div>
					<div class="col-md-9">
						{!! Form::submit('Save',array('class'=>'btn btn-info btn-single')) !!}	

						{!! Form::button('Cancel',array('class'=>'btn btn-info btn-single','onclick'=>'history.go(-1);')) !!}
						
						{!! Form::close() !!}
					</div>
				</div>
			</div>


		{!! Form::close() !!}
	@endsection
