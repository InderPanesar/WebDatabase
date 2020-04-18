@extends('layouts.app')
@section('content')
<!-- This is the view a user will see if they attempt to request an item -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center>{{ __('Request Item') }}</center></div>
				<!-- The code below will display any error messages that happen. -->
				@if($errors->any())
					{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
				@endif
				<!-- Display all the item details -->
				<div class="content">		
					<table class="table table-striped table-hover centre">
						<center>
							<tr>
								<th><strong>Type: </strong>{{$founditems['type']}}</th>
							</tr>
							<tr>
								<th><strong>Color: </strong>{{$founditems['color']}}</th>
							</tr>
							<tr>
								<th><strong>Location: </strong>{{$founditems['location']}}</th>
							</tr>
							<tr>
								<th><strong>Date: </strong>{{$founditems['date_found']}}</th>
							</tr>
							<tr>
								<th><strong>Description: </strong>{{$founditems['description']}}</th>
							</tr>
							<tr>
								<th><strong>Added by: </strong>{{$user['name']}}</th>
							</tr>
						</center>	
					</table>
						
			       <form method="POST" action=" {{ route('request', $founditems['id']) }}" enctype="multipart/form-data">
                        <!-- The CSRF TOKEN helps protect against Cross-Site Request Forgery. -->
						@csrf
						<!-- The user types in the reason for the request. -->
                        <div class="form-group row">
                            <label for="reason" class="col-md-12 col-form-label text-md-center">{{ __('Reason') }}</label>
                            <div class="col-md-12">
								<input id="reason" type="text" class="form-control @error('reason') is-invalid @enderror" name="reason" value="{{ old('reason') }}" required autocomplete="reason" autofocus>
								@error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						<!-- The user submits the reason for the request -->
						<div class="form-group row">
                            <div class="col-md-12">
								<input id="submit" type="submit" class="form-control @error('submit') is-invalid @enderror">
								@error('submit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
					@csrf
				</div>
            </div>
        </div>
    </div>
</div>
@endsection