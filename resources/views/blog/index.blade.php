@extends('blog.layout')


@section('blog_content')
    <h1 class="with-line">Blog {{ ((isset($cur_cat)?(' - '.$cur_cat->name):'')) }} {{ ((isset($cur_auth)?(' - '.$cur_auth->name):'')) }} {{ ((isset($cur_search)?(' - '.$cur_search):'')) }}</h1>

    <div class="row all-posts">
        @foreach($posts as $post)
            <div class="col-md-6 portfolio-item">
                <a href="{{ route('blog.detail', ['category' => $post->category->slug, 'id' => $post->slug]) }}">
                    <img class="img-responsive" src="{{ $post->image }}" alt="">
                </a>
                <h3>
                    <a href="{{ route('blog.detail', ['category' => $post->category->slug, 'id' => $post->slug]) }}">{{ $post->title }}</a>
                </h3>
                <p>{{ $post->perex }}</p>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-12 text-center">
            {{ $posts->links() }}
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