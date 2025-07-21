@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Create User</div>
                    <div class="alert alert-danger">
                        <li>This user will have Administrative Access</li>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('adminUserStore') }}" method="POST">
                            @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name:</label>
                            <div class="form-controls">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email:</label>
                            <div class="form-controls">
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password:</label>
                            <div class="form-controls">
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password_confirm') ? ' has-error' : '' }}">
                            <label for="password_confirm">Confirm Password:</label>
                            <div class="form-controls">
                                <input type="password" name="password_confirm" class="form-control" value="{{ old('password_confirm') }}">
                                @if ($errors->has('password_confirm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirm') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('adminUsers')}}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
