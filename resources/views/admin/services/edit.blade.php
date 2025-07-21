@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Update Services</div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Service</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->name }}</td>
                                    <td class="pull-right">
                                        <a href="" data-toggle="modal" data-target="{{"#modal-".$service->id}}">
                                            <button class="btn btn-xs btn-danger">Delete</button>
                                        </a>
                                        <div id="modal-{{$service->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            &times;
                                                        </button>
                                                        <h4 class="modal-title">Warning!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you sure want to delete this service?</p><br>
                                                        <h4>{{ $service->name }}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST" action="{{ route('adminServicesDelete', $service->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <hr>

                <form method="POST" action="{{ route('adminServicesUpdate') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="add_service">New Service</label>
                        <div class="form-controls">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('admin') }}" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
