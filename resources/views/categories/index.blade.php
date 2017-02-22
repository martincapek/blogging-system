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
                @include("partials._single_row_table_category")
            @endforeach

        </table>
    </div>
@endsection
