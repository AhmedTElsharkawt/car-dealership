@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Make</div>
                    <div class="panel-body">
                        <form action="{{ route('adminMakesUpdate', $make->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name">Make Name:</label>
                                <div class="form-controls">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $make->name) }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                                <label for="type_id">Type</label>
                                <div class="form-controls">
                                    <select name="type_id" id="type_id" class="form-control">
                                        @foreach($types as $id => $type)
                                            <option value="{{ $id }}" {{ old('type_id', $make->type_id) == $id ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('type_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('adminMakes') }}" class="btn btn-default">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
