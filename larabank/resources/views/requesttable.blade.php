@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>{{ __('Requested Items') }}</center></div>
				<div class="content">		
					<div class="table-responsive">
						<table class="table ">
							<tr>
								<th>ID</th>
								<th>Reason</th>
								<th>Item Type</th>
								<th>Item Color</th>
								<th>Item Description</th>
								<th>Item Image</th>
								<th>Requestee's Name</th>
								<th>Requestee's Email</th>
								<th>Allow/Deny</th>
								<th>Actions</th>
							</tr>
							@foreach($items as $row)
							<tr>
								<td>{{$row['id']}}</td>
								<td>{{$row['reason']}}</td>
								<td>{{$requesteditems[$row['id']]['type']}}</td>
								<td>{{$requesteditems[$row['id']]['color']}}</td>
								<td>{{$requesteditems[$row['id']]['description']}}</td>
								<td><img src={{url($requesteditems[$row['id']]['image'])}} class="img-fluid"></td>
								<td>{{$requestedusers[$row['id']]['name']}}</td>
								<td>{{$requestedusers[$row['id']]['email']}}</td>
								@if($row['approved'] == 1)
									<td>Allowed Request</td>
								@elseif ($row['approved'] == -1)
									<td>Denied Request</td>
								@else 
									<td>No Decision Made</td>
								@endif
								@if($row['approved'] == 0)
									<td>
										<form method="post" action=" {{ route('requesttable', ['id'=>$row['id']] ) }}">
											<label for="approved">Allow/Deny?</label>
											<input type="checkbox" name="approved">
											<button type="submit">Submit Decision</button>
											@csrf
										</form>	
									</td>
								@else 
									<td>Decision Made</td>
								@endif
							</tr>
							@endforeach
						</table>
					</div>	
					@csrf
				</div>
            </div>
        </div>
    </div>
</div>
@endsection