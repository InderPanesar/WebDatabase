@extends('layouts.app')
@section('content')
<!-- The view the Admin will see when he trys to view all the requested items. -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>{{ __('Requested Items') }}</center></div>
				<div class="content">		
					<!-- Show the table of items. -->
					<div class="table-responsive">
						<table class="table">
							<!-- Set the table headings. -->
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
							<!-- For loop of through all the items which have been requested. -->
							@foreach($items as $row)
							<tr>
								<!-- The values of the row which follow the table headings above. -->
								<td>{{$row['id']}}</td>
								<td>{{$row['reason']}}</td>
								<td>{{$requesteditems[$row['id']]['type']}}</td>
								<td>{{$requesteditems[$row['id']]['color']}}</td>
								<td>{{$requesteditems[$row['id']]['description']}}</td>
								<!-- For loop of multiple images. -->
								<td>
									@foreach(explode("|",$requesteditems[$row['id']]['image']) as $image)
										<img src={{url($image)}} class="img-fluid">
									@endforeach
								</td>
								<td>{{$requestedusers[$row['id']]['name']}}</td>
								<td>{{$requestedusers[$row['id']]['email']}}</td>
								<!-- Shows the admin the current status of the request. -->
								@if($row['approved'] == 1)
									<td>Allowed Request</td>
								@elseif ($row['approved'] == -1)
									<td>Denied Request</td>
								@else 
									<td>No Decision Made</td>
								@endif
								<!-- A form if no decision has been made to allow the user to submit the form. -->
								@if($row['approved'] == 0)
									<td>
										<form method="post" action=" {{ route('requesttable', ['id'=>$row['id']] ) }}">
											<label for="approved">Allow/Deny?</label>
											<input type="checkbox" name="approved">
											<button type="submit">Submit Decision</button>
											@csrf
										</form>	
									</td>
								<!-- If a decision has been made don't allow the admin to make another decision. -->
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