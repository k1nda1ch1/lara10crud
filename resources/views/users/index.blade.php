@extends('layouts.app')
  
@section('title', 'User List')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List User</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    {{-- <div class="row">
        <div class="col mb-3">
            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div> --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
            <a class="btn btn-warning float-end" href="{{ route('users.export') }}">Export User Data</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="mese" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>氏名</th>
                            <th>Eメール</th>
                            <th>役割</th>
                            <th>言語</th>
                            <th>作成日</th>
                            <th>更新日</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($user->count() > 0)
                            @foreach($user as $rs)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $rs->name }}</td>
                                    <td class="align-middle">{{ $rs->email }}</td>
                                    <td class="align-middle">{{ $rs->role }}</td>
                                    <td class="align-middle">{{ $rs->lang }}</td>
                                    <td class="align-middle">{{ $rs->created_at->format('Y-m-d H:i:s') }}</td>  
                                    <td class="align-middle">{{ $rs->updated_at->format('Y-m-d H:i:s') }}</td>  
                                    <td class="align-middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('users.show', $rs->id) }}" type="button" class="btn btn-xs btn-info btn-flat btn-sm m-1">Detail</a>
                                            <a href="{{ route('users.edit', $rs->id)}}" type="button" class="btn btn-xs btn-success btn-flat btn-sm m-1">Edit</a>
                                            <form action="{{ route('users.destroy', $rs->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm m-1" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="5">user not found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection