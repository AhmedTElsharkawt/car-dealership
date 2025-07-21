@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update User</div>
                    <div class="panel-body">
                        <form action="{{ route('adminUserUpdate', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name:</label>
                            <div class="form-controls">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Email Address:</label>
                            <div class="form-controls">
                                <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                            <label for="current_password">Current Password</label>
                            <div class="form-controls">
                                <input type="password" name="current_password" class="form-control" value="{{ old('current_password') }}">
                            </div>
                            @if ($errors->has('current_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('current_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password:</label>
                            <div class="form-controls">
                                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                            <label for="confirm_password">Confirm Password:</label>
                            <div class="form-controls">
                                <input type="password" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                            </div>
                            @if ($errors->has('confirm_password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('adminUsers')}}">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
