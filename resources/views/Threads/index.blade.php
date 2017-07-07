@extends('layouts.app')

@section('content')
<div>
<a href="{{route('threads.create')}}" title="Add"  class="btn btn-default">Add Thread</a>
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
						<a href="{{route('threads.edit',$thread->id)}} " class="btn btn-primary">Edit</a> / <form action="{{ URL::route('threads.destroy',$thread->id) }}" method="POST" style="display: inline-block;">
						    <input type="hidden" name="_method" value="DELETE">
						    <input type="hidden" name="_token" value="{{ csrf_token() }}">
						    <button data-rel="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
						</form>
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
