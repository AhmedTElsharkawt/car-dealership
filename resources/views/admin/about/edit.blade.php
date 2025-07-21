@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update About Page</div>
                    <div class="panel-body">

                        <form action="{{ route('adminAboutUpdate') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group{{ $errors->has('owner_name') ? ' has-error' : '' }}">
                                <label for="owner_name">Owner Name</label>
                                <input type="text" name="owner_name" value="{{ old('owner_name', $about->owner_name) }}" class="form-control">
                                @error('owner_name')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{ old('email', $about->email) }}" class="form-control">
                                @error('email')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $about->phone) }}" class="form-control">
                                @error('phone')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('fax') ? ' has-error' : '' }}">
                                <label for="fax" rel="tooltip" title="If you do not set a fax number, field will be hidden">Fax</label>
                                <input type="text" name="fax" value="{{ old('fax', $about->fax) }}" rel="tooltip" title="If you do not set a fax number, field will be hidden" class="form-control">
                                @error('fax')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" style="resize:none">{{ old('address', $about->address) }}</textarea>
                                @error('address')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('hours') ? ' has-error' : '' }}">
                                <label for="hours">Business Hours</label>
                                <textarea name="hours" class="form-control" style="resize:none">{{ old('hours', $about->hours) }}</textarea>
                                @error('hours')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description">Description/Mission Statement</label>
                                <textarea name="description" class="form-control">{{ old('description', $about->description) }}</textarea>
                                @error('description')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <hr>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3>Media</h3>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('storefront') ? ' has-error' : '' }}">
                                @if (file_exists(public_path('upload/storefront.jpg')))
                                    <img src="{{ asset('upload/storefront.jpg') }}" style="max-height: 100px">
                                @else
                                    <img src="{{ asset('example/storefront.jpg') }}" style="max-height: 100px">
                                @endif
                                <br>
                                <label for="storefront">Storefront</label>
                                <input type="file" name="storefront" class="form-control">
                                @error('storefront')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <hr>
                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                @if (file_exists(public_path('upload/shop.jpg')))
                                    <img src="{{ asset('upload/shop.jpg') }}" style="max-height: 100px">
                                @else
                                    <img src="{{ asset('example/shop.jpg') }}" style="max-height: 100px">
                                @endif
                                <br>
                                <label for="photo">Shop Photo</label>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <hr>
                            <div class="form-group{{ $errors->has('banner') ? ' has-error' : '' }}">
                                @if (file_exists(public_path('upload/banner.jpg')))
                                    <img src="{{ asset('upload/banner.jpg') }}" style="max-height: 100px">
                                @else
                                    <img src="{{ asset('example/banner.jpg') }}" style="max-height: 100px">
                                @endif
                                <br>
                                <label for="banner">Banner</label>
                                <input type="file" name="banner" class="form-control">
                                @error('banner')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <hr>
                            <div class="form-group{{ $errors->has('gmap') ? ' has-error' : '' }}">
                                <label for="gmap" rel="tooltip" title="To get this value, go to Google Maps, search for address, click Share, click 'Embed a map', then 'COPY HTML'. Paste the entire string here.">Google Map Link</label>
                                <input type="text" name="gmap" value="{{ old('gmap', $about->gmap) }}" class="form-control">
                                @error('gmap')
                                    <span class="help-block"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <iframe src="{{ $about->gmap }}" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                            <hr>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin') }}">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('[rel=tooltip]').tooltip({placement: 'top'});
        });
    </script>
@endsection
