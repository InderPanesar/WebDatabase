@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>{{ __('View Items') }}</center></div>
				<!-- Need to ensure that the authentication of the users is checked before table is shown. -->
				@if(auth()->check())
				<!-- The code below will display any error messages that happen. -->
					@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
				<div class="table-responsive">
					<!-- For loop of through all the items which have been added. -->
					<table class="table table-striped table-hover table-condensed">
						<thead>
							<tr>
								<!-- The values of the table headings above and is sortable through Kyslik package. -->
								<th>@sortablelink('id')</th>
								<th>@sortablelink('type')</th>
								<th>@sortablelink('color')</th>
								<th>@sortablelink('description')</th>
								<th><strong>Further Options</strong></th>
							</tr>
						</thead>
						<tbody>
							<!-- For loop of through all the items which are in the database. -->
							@foreach($sortable as $row)
							<!-- The values of the row which follow the table headings above. -->
							  <tr>
								<td name="id" id="name">{{$row['id']}}</td>
								<td>{{$row['type']}}</td>
								<td>{{$row['color']}}</td>
								<td>{{$row['description']}}</td>
								<td>
									@if(auth()->user()->is_admin)
										<button onclick="location.href='{{ route('viewmore', $row['id'])}}'" class="btn btn-primary">VIEW</button>
										<button onclick="location.href='{{ route('edit', $row['id'])}}'" class="btn btn-secondary">EDIT</button>
									@else
										<button onclick="location.href='{{ route('viewmore', $row['id'])}}'" class="btn btn-primary">VIEW</button>
										<button onclick="location.href='{{ route('request', $row['id'])}}'" class="btn btn-secondary">REQUEST</button>
									@endif
								</td>	
							  </tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<!-- If not authenticated then don't allow further options -->
				@else
				<div class="table-responsive">
					<table class="table ">
						<tr>
							<th>@sortablelink('id')</th>
							<th>@sortablelink('type')</th>
							<th>@sortablelink('color')</th>
							<th>@sortablelink('description')</th>
						</tr>
						@foreach($sortable as $row)
						<tr>
							<td>{{$row['id']}}</td>
							<td>{{$row['type']}}</td>
							<td>{{$row['color']}}</td>
							<td>{{$row['description']}}</td>
						</tr>
						@endforeach
					</table>
				</div>
				@endif
				@csrf
            </div>
        </div>
    </div>
</div>
@endsection
