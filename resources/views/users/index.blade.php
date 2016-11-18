@extends('layouts.app')

@section('content')

    <div class="col-md-12 panel">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Registered at</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a> </td>
                    <td>{{ $user->created_at }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
