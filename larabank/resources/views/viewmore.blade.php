@extends('layouts.app')
@section('content')
<!-- This is the view the user will see if they are trying to view more details on the items. -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>{{ __('View Items') }}</center></div>
				<div class="content">
					<!-- Table which holds the information of all the items -->
					<table class="table table-striped table-hover centre">
						<center>
							<tr>
								<th><strong>Type:</strong></th>
							</tr>
							<tr>
								<td>{{$founditems['type']}}</td>
							</tr>
							<tr>
								<th><strong>Color:</strong></th>
							</tr>
							<tr>
								<td>{{$founditems['color']}}</td>
							</tr>
							<tr>
								<th><strong>Location:</strong></th>
							</tr>
							<tr>
								<td>{{$founditems['location']}}</td>
							</tr>
							<tr>
								<th><strong>Date:</strong></th>
							</tr>
							<tr>
								<td>{{$founditems['date_found']}}</td>
							</tr>
							<tr>
								<th><strong>Description:</strong></th>
							</tr>
							<tr>
								<td>{{$founditems['description']}}</td>
							</tr>
							<tr>
								<th><strong>Image:</strong></th>
							</tr>
							<tr>
								<!-- All the images -->
								<td>
									@foreach(explode("|",$founditems['image']) as $image)
										<img src={{url('https://180039762.cs2410-web01pvm.aston.ac.uk/'.$image)}} class="img-fluid">
									@endforeach
								</td>
							</tr>
							<tr>
								<th><strong>Added by:</strong></th>
							</tr>
							<tr>
								<td>{{$user['name']}}</td>
							</tr>
						</center>	
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
