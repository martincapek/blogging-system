@extends('layouts.app')

@section('content')


    <div class="row">
        <form role="form" action="{{ route('posts.store') }}" method="POST">
            @include('posts._form')
        </form>
    </div>

@endsection

