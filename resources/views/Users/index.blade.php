@extends('layouts.app')

@section('content')
<div>
	<table class="table table-responsive table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>SN</th>
				<th>Name</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($users as $key => $user)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->username}}</td>
					<td>{{$user->email}}</td>
					<td>
						<a href="{{route('users.edit',$user->id)}} " class="btn btn-primary">Edit</a> / <a href="{{route('users.destroy',$user->id)}} " class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@empty
			    <tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
			@endforelse
		</tbody>
	</table>
</div>

@endsection
