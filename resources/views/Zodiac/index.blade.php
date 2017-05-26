@extends('layouts.app')

@section('content')
<a href="{{route('zodiacs.create')}}" title="Add"  class="btn btn-default">Add Zodiac</a>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Description</th>
			<th>Traits</th>
			<th>Gemstone Name</th>
			<th>Gemstone Description</th>
			<th>Gemstone Purity(carat)</th>
			<th>Lucky Number</th>
			<th>Lucky Color</th>
			<th>Color Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($zodiacs as $key => $zodiac)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$zodiac->name}}</td>
				<td>{{$zodiac->zodiac_description}}</td>
				<td>{{$zodiac->traits}}</td>
				<td>{{$zodiac->gemstone_name}}</td>
				<td>{{$zodiac->gemstone_description}}</td>
				<td>{{$zodiac->carat}}</td>
				<td>{{$zodiac->lucky_number}}</td>
				<td>{{$zodiac->lucky_color}}</td>
				<td>{{$zodiac->color_description}}</td>
				<td>
				<a href="{{route('zodiacs.edit',$zodiac->id)}}" class="btn btn-primary">Edit</a>
				</td>
			</tr>
		@empty
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
		@endforelse
	</tbody>
</table>

@endsection
