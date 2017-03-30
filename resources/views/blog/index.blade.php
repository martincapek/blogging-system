@extends('blog.layout')


@section('blog_content')


    <h1 class="with-line">
        Blog {{ ((isset($cur_cat)?(' - '.$cur_cat->name):'')) }} {{ ((isset($cur_auth)?(' - '.$cur_auth->name):'')) }} {{ ((isset($cur_search)?(' - '.$cur_search):'')) }}</h1>
    @if(isset($cur_cat))
        <hr>
        <div class="row">
            @if($cur_cat->image)
                <div class="col-md-4">
                    <img src="{{ $cur_cat->image }}" alt="" class="img-responsive">
                </div>
            @endif
            @if($cur_cat->description)
                <div class="col-md-8"><p>{{$cur_cat->description}}</p></div>
            @endif
        </div>
        <hr>
    @endif

    <div class="row all-posts">
        @if($posts->count())
            @foreach($posts as $post)

                <div class="col-md-6 portfolio-item">
                    <a href="{{ route('blog.detail', ['category' => $post->category->slug, 'id' => $post->slug]) }}">
                        <img class="img-responsive" src="{{ empty($post->image)?"/media/images/placeholder.jpg":$post->image }}" alt="">
                    </a>
                    <h3>

                        <a href="{{ route('blog.detail', ['category' => $post->category->slug, 'id' => $post->slug]) }}">{{ $post->title }}</a>
                    </h3>

                    <p>{{ $post->perex }}</p>

                </div>
            @endforeach

        @else

            <div class="col-md-12"><h3>No posts.</h3></div>
        @endif
    </div>


    @if($posts->links())
        <div class="row">
            <div class="col-md-12 text-center">
                @if(Request::only('search'))
                    {{ $posts->appends(Request::only('search'))->links() }}
                @else
                    {{ $posts->links() }}
                @endif
            </div>
        </div>
    @endif

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