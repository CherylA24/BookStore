@extends('layout')

@section('title','Manage User')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role}}</td>
                                <td class="d-flex justify-content-between">
                                    <a class="btn btn-secondary" href="{{ route('viewdetailuser', $user->id) }}" role="button">View Detail</a>
                                    @if( $user->role =='Member')
                                        <form action="{{ route('deleteuser', $user->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>No Data...</td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection