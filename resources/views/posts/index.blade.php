@extends('layouts.app')

@section('content')

    <div class="col-md-12 panel clearfix">
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th class="visible-lg visible-md">Perex</th>
                <th class="visible-lg visible-md">Category</th>
                <th class="visible-lg visible-md">Views</th>
                <th class="visible-lg visible-md">Comments</th>
                <th width="220" class="visible-lg visible-md">Created at</th>
                <th>Actions</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td class="visible-lg visible-md">{{ $post->perex }}</td>
                    <td class="visible-lg visible-md">{{ $post->category }}</td>
                    <td class="visible-lg visible-md">{{ $post->views }}</td>
                    <td class="visible-lg visible-md">{{ $post->comments }}</td>
                    <td class="visible-lg visible-md">{{ $post->created_at->format('j. F Y, H:i') }}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
