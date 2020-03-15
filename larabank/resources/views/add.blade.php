@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new Item') }}</div>
				
				@if($errors->any())
					{!! implode('', $errors->all('<div class="feedback">:message</div>')) !!}
				@endif
                <div class="card-body">
                    <form method="POST" action=" {{ route('add') }}" enctype="multipart/form-data">
                        @csrf
						<div class="form-group row">
                            <label for="itemtype" class="col-md-4 col-form-label text-md-right">{{ __('Type of Item') }}</label>

                            <div class="col-md-6">
								<select name="types"  class="form-control @error('itemtype') is-invalid @enderror" size="3" required>
									<option value="jewellery">{{ __('Jewellery') }}</option>
									<option value="pets">{{ __('Pets') }}</option>
									<option value="phones">{{ __('Phones') }}</option>
								</select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">{{ __('Color') }}</label>
                            <div class="col-md-6">
								<input id="color" type="text" class="form-control @error('color') is-invalid @enderror" name="color" value="{{ old('color') }}" required autocomplete="color" autofocus>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date Found:') }}</label>
                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" required autocomplete="date" autofocus>  
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Where was it found?:') }}</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location" autofocus>  
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Description:') }}</label>
                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" autofocus>  
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Image Of Item:') }}</label>
                            <div class="col-md-6">
                                <input id="file" type="file"  class="form-control @error('file') is-invalid @enderror" name="file"> 
                            </div>

                        </div>

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
