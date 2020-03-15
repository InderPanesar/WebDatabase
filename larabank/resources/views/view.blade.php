@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center>{{ __('View Items') }}</center></div>
						<!-- Need to ensure that the authentication of the users is checked before table is shown. -->
						@if(auth()->check())
						<div class="table-responsive">
						  <table class="table table-striped table-hover table-condensed">
							<thead>
							  <tr>
								<th>@sortablelink('id')</th>
								<th>@sortablelink('type')</th>
								<th>@sortablelink('color')</th>
								<th>@sortablelink('description')</th>
								<th><strong>Further Options</strong></th>
							  </tr>
							</thead>
							<tbody>
							@foreach($sortable as $row)
							  <tr>
								<td name="id" id="name">{{$row['id']}}</td>
								<th>{{$row['type']}}</th>
								<th>{{$row['color']}}</th>
								<th>{{$row['description']}}</th>
								<th>
									@if(auth()->user()->is_admin)
									<button onclick="location.href='{{ route('viewmore', $row['id'])}}'" class="btn btn-primary">VIEW</button>
									<button onclick="location.href='{{ route('edit', $row['id'])}}'" class="btn btn-secondary">EDIT</button>
									@else
									<button onclick="location.href='{{ route('viewmore', $row['id'])}}'" class="btn btn-primary">VIEW</button>
									<button onclick="location.href='{{ route('request', $row['id'])}}'" class="btn btn-secondary">REQUEST</button>
									@endif
								</th>
								
							  </tr>
							@endforeach
							</tbody>
						  </table>
						</div>
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
								<th>{{$row['type']}}</th>
								<th>{{$row['color']}}</th>
								<th>{{$row['description']}}</th>
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
