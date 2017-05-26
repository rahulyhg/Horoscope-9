@extends('layouts.app')

@section('content')
		<div>
			<a href="{{route('weeklycreate')}}" class="btn btn-primary">Add weekly Hororscope</a>
		</div>
		<table class="table table-hover table-bordered table-striped">
				<tr>
					<th>SN</th>
					<th>Date</th>
					<th>Week</th>
					<th>Mesha</th>
					<th>Brisha</th>
					<th>Mithuna</th>
					<th>karkata</th>
					<th>simha</th>
					<th>kanya</th>
					<th>tula</th>
					<th>brishika</th>
					<th>dhanu</th>
					<th>makara</th>
					<th>kumbha</th>
					<th>meena</th>
					<th>Action</th>
				</tr>
				
				@forelse ($weekly as $key => $value)
					<tr>
						<td>
							{{$key+1}}
						</td>
						<td>
							@if($value->for_date)
								{{$value->for_date}}
							@else
								-
							@endif
						</td>

						<td>
							@if($value->week_number)
								{{$value->week_number}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->mesha)
								{{$value->mesha}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->brisha)
								{{$value->brisha}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->mithuna)
								{{$value->mithuna}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->karkata)
								{{$value->karkata}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->simha)
								{{$value->simha}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->kanya)
								{{$value->kanya}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->tula)
								{{$value->tula}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->brishika)
								{{$value->brishika}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->dhanu)
								{{$value->dhanu}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->makara)
								{{$value->makara}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->kumbha)
								{{$value->kumbha}}
							@else
								-
							@endif
						</td>
						<td>
							@if($value->meena)
								{{$value->meena}}
							@else
								-
							@endif
						</td>
						<td>
							<a href="{{route('weeklyedit',$value->id)}}" class="btn btn-default">Edit</a>
						</td>
					</tr>
				@empty
					Sorry No Horscope Found
				@endforelse
		</table>


	@endsection