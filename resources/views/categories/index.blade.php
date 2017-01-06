@extends('layouts.app')

@section('content')

    <div class="col-md-12 panel clearfix">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th class="visible-lg visible-md">Description</th>
                <th class="visible-lg visible-md">Created at</th>
                <th>Actions</th>
            </tr>

            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td class="visible-lg visible-md">{{ $category->created_at->format('j. F Y, H:i') }}</td>
                    <td>{{ Auth::user()->isVerified() }}</td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
