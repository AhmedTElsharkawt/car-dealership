@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Create Type</div>
                <div class="panel-body">
                    <form action="{{ route('adminTypesStore') }}" method="POST">
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Types Name:</label>
                            <div class="form-controls">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('adminTypes') }}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
