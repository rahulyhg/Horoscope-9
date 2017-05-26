@extends('layouts.app')

@section('content')
<a href="{{route('customers.create')}}" title="Add"  class="btn btn-default ">Add Customers</a>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>SN</th>
			<th>Image</th>
			<th>Full Name</th>
			<th>email</th>
			<th>gender</th>
			<th>Phone Number</th>
			<th>Date of Birth</th>
			<th>Gemstone Description</th>
			<th>Gemstone Purity(carat)</th>
			<th>Zodiac</th>
			<th>Lucky Number</th>
			<th>Lucky Color</th>
			<th>Bio</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($customers as $key => $customer)
			<tr class="user_row" data-url="{{ route('customers.show', ['id'=>$customer->id]) }}">
				<td>{{$key+1}}</td>
				<td><img src="{{$customer->image}}" alt="{{$customer->first_name}} {{$customer->last_name}}" class="img-responsive"></td>
				<td>{{$customer->first_name}} {{$customer->last_name}}</td>
				<td>{{$customer->email}}</td>
				<td>{{$customer->gender}}</td>
				<td>{{$customer->phone_number}}</td>
				<td>{{$customer->date_of_birth}} {{$customer->time_of_birth}}</td>
				<td>{{$customer->place_of_birth}}</td>
				<td>{{$customer->age}}</td>
				@if ($customer->zodiac_id)
				<td>{{$customer->zodiacs->name}}</td>
				
				@else
				-	
				@endif
				@if ($customer->zodiac_id)
				<td>{{$customer->zodiacs->lucky_number}}</td>
				
				@else
				-	
				@endif
				@if ($customer->zodiac_id)
				<td>{{$customer->zodiacs->lucky_color}}</td>
				
				@else
				-	
				@endif

				<td>{{$customer->bio}}</td>
				<td>
				<a href="{{route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a>
				</td>
			</tr>
		@empty
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		@endforelse
	</tbody>
</table>

@endsection
