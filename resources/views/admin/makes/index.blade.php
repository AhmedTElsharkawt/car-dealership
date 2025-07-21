@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading d-flex justify-content-between align-items-center">
                        List of Makes
                        <a href="{{ route('adminMakesCreate') }}">
                            <button class="btn btn-xs btn-success">Add Make</button>
                        </a>
                    </div>

                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makes as $make)
                                <tr>
                                    <td>{{ $make->id }}</td>
                                    <td>{{ $make->name }}</td>
                                    <td>{{ optional($make->type)->name ?? '-' }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('adminMakesEdit', ['id' => $make->id]) }}" class="btn btn-xs btn-primary">Edit</a>

                                        <!-- Trigger modal -->
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal{{ $make->id }}">Delete</button>

                                        <!-- Delete Modal -->
                                        <div id="deleteModal{{ $make->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Warning!</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Do you really want to delete this make?</p>
                                                        <h4>{{ $make->name }}</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('adminMakesDelete', ['id' => $make->id]) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $makes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
