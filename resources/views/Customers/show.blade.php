@extends('layouts.app')

@section('content')
{{-- <a href="{{route('customers.create')}}" title="Add"  class="btn btn-default pull-left">Add Customers</a> --}}
<div style="margin-top: 50px;">
	
	<div class="col-lg-6">
			<h3>Full Name</h3>{{$customer->first_name}} {{$customer->last_name}}
			<h3>email</h3>{{$customer->email}}
			<h3>gender</h3>{{$customer->gender}}
			<h3>Phone Number</h3>{{$customer->phone_number}}
			<h3>Date of Birh3</h3>{{$customer->date_of_birth}} {{$customer->time_of_birth}}
			<h3>Place of Birh3</h3>{{$customer->place_of_birth}}
			<h3>Age</h3>{{$customer->age}}
			<h3>Gemstone Description</h3>{{$customer->zodiacs->gemstone_description}}
			<h3>Gemstone Purity(carat)</h3>{{$customer->zodiacs->carat}}
			<h3>Zodiac</h3>{{$customer->zodiacs->name}}
			<h3>Lucky Number</h3>{{$customer->zodiacs->lucky_number}}
			<h3>Lucky Color</h3>{{$customer->zodiacs->lucky_color}}
			<h3>Bio</h3>{{$customer->bio}}
			
			<a href="{{route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>

	</div>
	<div class="col-lg-6">
		<img src="{{$customer->image}}" alt="{{$customer->first_name}} {{$customer->last_name}}" class="img-responsive">		
	</div>
</div>
		
@endsection
