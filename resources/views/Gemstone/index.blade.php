@extends('layouts.app')

@section('content')
<a href="{{route('gemstones.create')}}" title="Add"  class="btn btn-default">Add Gem Stone</a>

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>SN</th>
			<th>Name</th>
			<th>Description</th>
			<th>Carat</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@forelse ($gemstones as $key => $gemstone)
			<tr>
				<td>{{$key+1}}</td>
				<td>{{$gemstone->name}}</td>
				<td>{{$gemstone->description}}</td>
				<td>{{$gemstone->carat}}</td>
				<td>
				<a href="{{route('gemstones.edit',$gemstone->id)}}" class="btn btn-primary">Edit</a>
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
