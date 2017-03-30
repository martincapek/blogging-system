@extends('layouts.app')

@section('content')

    <div class="col-md-12 panel">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Registered at</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->role() }}</td>
                    <td><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-pencil"
                                                                          aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
