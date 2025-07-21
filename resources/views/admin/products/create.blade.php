@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Listing</div>

                <div class="panel-body">
                    <form action="{{ route('adminProductsStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name -->
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Product Name</label>
                            <div class="form-controls">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Photos -->
                        <div class="form-group{{ $errors->has('photo*') ? ' has-error' : '' }}">
                            <label for="photo">Photos</label>
                            <div class="form-controls">
                                <input type="file" name="photo[]" class="form-control" multiple>
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                        @foreach ($errors->get('photo') as $error)
                                            @if ($error == "The photo field is required.")
                                                <strong>You must upload at least one photo</strong>
                                            @endif
                                        @endforeach
                                    </span>
                                @endif
                                @if ($errors->has('photo.*'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo.*') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Mileage -->
                        <div class="form-group{{ $errors->has('mileage') ? ' has-error' : '' }}">
                            <label for="mileage">Mileage</label>
                            <div class="form-controls">
                                <input type="text" name="mileage" id="mileage" class="form-control" value="{{ old('mileage') }}">
                                @error('mileage')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Color -->
                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">Color</label>
                            <div class="form-controls">
                                <input type="text" name="color" id="color" class="form-control" value="{{ old('color') }}">
                                @error('color')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Year -->
                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year">Year</label>
                            <div class="form-controls">
                                <input type="text" name="year" id="year" class="form-control" value="{{ old('year') }}">
                                @error('year')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Transmission -->
                        <div class="form-group{{ $errors->has('transmission') ? ' has-error' : '' }}">
                            <label for="transmission">Transmission</label>
                            <div class="form-controls">
                                <input type="text" name="transmission" id="transmission" class="form-control" value="{{ old('transmission') }}">
                                @error('transmission')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Fuel Type -->
                        <div class="form-group{{ $errors->has('fuel_type') ? ' has-error' : '' }}">
                            <label for="fuel_type">Fuel Type</label>
                            <div class="form-controls">
                                <input type="text" name="fuel_type" id="fuel_type" class="form-control" value="{{ old('fuel_type') }}">
                                @error('fuel_type')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <div class="form-controls">
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price">Price</label>
                            <div class="form-controls">
                                <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
                                @error('price')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type">Type</label> <a href="{{ route('adminTypesCreate') }}">new</a>
                            <div class="form-controls">
                                <select name="type" id="type" class="form-control">
                                    <option value="">--Select Type--</option>
                                    @foreach ($types as $type => $value)
                                        <option value="{{ $type }}" {{ old('type') == $type ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Make -->
                        <div class="form-group{{ $errors->has('make_id') ? ' has-error' : '' }}">
                            <label for="make_id">Make</label> <a href="{{ route('adminMakesCreate') }}">new</a>
                            <div class="form-controls">
                                <select name="make_id" id="make_id" class="form-control">
                                    <option value="">--Make--</option>
                                    {{-- سيتم تعبئتها عبر JavaScript أو بناءً على البيانات المتوفرة لاحقاً --}}
                                </select>
                                @error('make_id')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="form-group">
                            <div class="form-controls">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('home') }}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
