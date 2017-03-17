@extends('frontend.layout')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @yield('blog_content')
            </div>

            <div class="col-md-4" id="sidebar">
                @include('blog.sidebar')
            </div>
        </div>

    </div>
@stop

@section('scripts')
    $(document).ready(function() {
    // Select and loop the container element of the elements you want to equalise
    $('.all-posts').each(function(){

    // Cache the highest
    var highestBox = 0;

    // Select and loop the elements you want to equalise
    $('.portfolio-item', this).each(function(){

    // If this box is higher than the cached highest then store it
    if($(this).height() > highestBox) {
    highestBox = $(this).height();
    }

    });

    // Set the height of all those children to whichever was highest
    $('.portfolio-item',this).height(highestBox);

    });
    });
@stop