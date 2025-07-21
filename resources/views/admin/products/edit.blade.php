@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Update product</div>
                <div class="panel-body">
                    <form action="{{ route('adminProductsUpdate', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Product Name</label>
                            <div class="form-controls">
                                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">
                                @error('name')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('photo*') ? ' has-error' : '' }}">
                            <label for="photo">Photos</label>
                            <div class="form-controls">
                                <input type="file" name="photo[]" multiple class="form-control">
                                @foreach ($errors->get('photo') as $error)
                                    @if ($error == "The photo field is required.")
                                        <span class="help-block"><strong>You must upload at least one photo</strong></span>
                                    @endif
                                @endforeach
                                @if ($errors->has('photo.*'))
                                    <span class="help-block"><strong>{{ $errors->first('photo.*') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-controls">
                                <table class="table table-striped">
                                    <tr>
                                        @foreach ($product->productimages as $image)
                                            <th>
                                                <img class="img-responsive img-thumbnail" src="{{ asset($image->thumbnail) }}" alt="noImage" style="width: 200px;height: 200px"><br/>
                                                @if ($image->default == 0 )
                                                    <a href="{{ route('adminImageDefault', ['product' => $product->id, 'id' => $image->id] ) }}">
                                                        <button type="button" class="btn btn-xs btn-primary">Set as Default</button>
                                                    </a>
                                                @endif
                                                <a href="#" data-toggle="modal" data-target="{{"#".$image->id}}">
                                                    <button class="btn btn-xs btn-danger">Delete</button>
                                                </a>

                                                <div id="{{$image->id}}" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Warning!</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do you sure want to delete this image?</p><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="{{ route('adminProductsImageDelete', ['id' => $image->id]) }}">
                                                                    <button type="button" class="btn btn-danger">Yes</button>
                                                                </a>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- Repeat the same input structure for other fields -->

                        <div class="form-group{{ $errors->has('mileage') ? ' has-error' : '' }}">
                            <label for="mileage">Mileage</label>
                            <input type="text" name="mileage" value="{{ old('mileage', $product->mileage) }}" class="form-control">
                            @error('mileage') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
                            <label for="color">Color</label>
                            <input type="text" name="color" value="{{ old('color', $product->color) }}" class="form-control">
                            @error('color') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year">Year</label>
                            <input type="text" name="year" value="{{ old('year', $product->year) }}" class="form-control">
                            @error('year') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('transmission') ? ' has-error' : '' }}">
                            <label for="transmission">Transmission</label>
                            <input type="text" name="transmission" value="{{ old('transmission', $product->transmission) }}" class="form-control">
                            @error('transmission') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('fuel_type') ? ' has-error' : '' }}">
                            <label for="fuel_type">Fuel Type</label>
                            <input type="text" name="fuel_type" value="{{ old('fuel_type', $product->fuel_type) }}" class="form-control">
                            @error('fuel_type') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                            @error('description') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price">Price</label>
                            <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                            @error('price') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type">Type <a href="{{ route('adminTypesCreate') }}">new</a></label>
                            <select name="type" class="form-control">
                                <option value="{{ $product->make->type->id }}">- {{ $product->make->type->name }} -</option>
                                @foreach ($types as $type => $value)
                                    <option value="{{ $type }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('type') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group{{ $errors->has('make_id') ? ' has-error' : '' }}">
                            <label for="make_id">Make <a href="{{ route('adminMakesCreate') }}">new</a></label>
                            <select name="make_id" class="form-control">
                                <option value="{{ $product->make->id }}">- {{ $product->make->name }} -</option>
                            </select>
                            @error('make_id') <span class="help-block"><strong>{{ $message }}</strong></span> @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('adminProducts') }}">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
