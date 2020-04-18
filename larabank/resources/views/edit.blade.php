@extends('layouts.app')
@section('content')
<!-- This is the view the admin will see if they are trying to edit an item details. -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit A Item') }}</div>
				<!-- The code below will display any error messages that happen. -->
				@if($errors->any())
					{!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
				@endif
                <div class="card-body">
                    <form method="POST" action=" {{ route('edit', $founditems['id']) }}" enctype="multipart/form-data">
						<!-- The CSRF TOKEN helps protect against Cross-Site Request Forgery. -->                        
						@csrf
						<!-- Drop down menu to choose an item. -->						
						<div class="form-group row">
                            <label for="itemtype" class="col-md-4 col-form-label text-md-right">{{ __('Type of Item') }}</label>
                            <div class="col-md-6">
								<select name="types" value={{ $founditems['type'] }}  class="form-control @error('itemtype') is-invalid @enderror" size="3" required>
									<option value="jewellery">{{ __('Jewellery') }}</option>
									<option value="pets">{{ __('Pets') }}</option>
									<option value="phones">{{ __('Phones') }}</option>
								</select>
                            </div>
                        </div>

						<!-- Text Input to note color of item. -->						
                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>
                            <div class="col-md-6">
								<input id="color" value="{{ $founditems['color'] }}" type="text" class="form-control @error('color') is-invalid @enderror" name="color" required autocomplete="color" autofocus>
                            </div>
                        </div>
						
						<!-- Date Input note the date of the item. -->
						<div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date Found:') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" value={{  $founditems['date_found'] }} class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" autofocus>  
                            </div>
                        </div>
						
						<!-- Text Input to drop the note the location of where the item was found. -->
						<div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Where was it found?:') }}</label>
                            <div class="col-md-6">
                                <input id="location" type="text" value="{{ $founditems['location'] }}" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location" autofocus>  
                            </div>
                        </div>
						
						<!-- Text Input for the description of the item. -->
						<div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Description:') }}</label>
                            <div class="col-md-6">
                                <input id="text" type="text" value="{{ $founditems['description'] }}" class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" autofocus>  
                            </div>
                        </div>
						
						<!-- File Input for 1-3 images to uploaded to the application -->
						<div class="form-group row">
                            <label for="submit" class="col-md-4 col-form-label text-md-right">{{ __('Submit:') }}</label>
                            <div class="col-md-6">
                                <input id="submit"  class="form-control @error('submit') is-invalid @enderror" type="submit" name="submit">  
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
