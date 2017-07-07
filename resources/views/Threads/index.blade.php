@extends('layouts.app')

@section('content')
<div>
	<table class="table table-responsive table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>SN</th>
				<th>Name</th>
				
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($threads as $key => $thread)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$thread->name}}</td>
					
					<td>
						<a href="{{route('threads.edit',$thread->id)}} " class="btn btn-primary">Edit</a> / <a href="{{route('threads.destroy',$thread->id)}} " class="btn btn-danger">Delete</a>
					</td>
				</tr>
			@empty
			    <tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					
				</tr>
			@endforelse
		</tbody>
	</table>
</div>

@endsection
