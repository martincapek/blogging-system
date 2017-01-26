@extends('layouts.app')

@section('content')

    <div class="row">
        <form role="form" action="{{ route('posts.update', $post->id) }}" method="POST">
            @include('posts._form')
        </form>
    </div>

@endsection