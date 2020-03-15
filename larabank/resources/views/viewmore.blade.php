@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>{{ __('View Items') }}</center></div>
				<div class="content">

						
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
								<td><img src={{url($founditems['image'])}} class="img-fluid"></td>
							</tr>
							<tr>
								<th><strong>Added by:</strong></th>
							</tr>
							<tr>
								<td>{{$user['name']}}</td>
							</tr>
						</center>	
						</table>

					@csrf
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
