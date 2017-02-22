@extends('layouts.app')

@section('content')


    <div class="row">
        <form role="form" action="{{ route('categories.update', $category->id) }}" method="POST">
            @include('categories._form')
        </form>
    </div>

@endsection

