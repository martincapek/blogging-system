@extends('frontend.layout')

@section('og_url', url()->current())
@section('og_title', $post->title)
@section('og_type', 'article')
@section('og_description', $post->perex)
@section('og_image', url($post->image))




@section('content')

    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1 class="with-line">{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="{{ route('blog.author', $post->user->id) }}">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $post->image }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {{ $post->perex }}
                </p>
                {!! $post->text !!}

                <hr>

                <div class="fb-share-button" data-href="{{ url()->current() }}"
                     data-layout="button_count" data-size="small" data-mobile-iframe="true"><a
                            class="fb-xfbml-parse-ignore" target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}&amp;src=sdkpreparse">Share</a>
                </div>

                <!-- Comments Form -->

                @if(Auth::user())
                    <hr>
                    <div id="comment-form" class="well">
                        <h4>Leave a Comment:</h4>
                        @if (count($errors) > 0)
                            <div class="alert alert-warning">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::get('status'))
                            <div class="alert alert-success">
                                <ul>
                                        <li>{{ Session::get('status') }}</li>

                                </ul>
                            </div>
                        @endif

                        <form method="post" role="form" action="{{ route('blog.comment', $post->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                @endif

                <hr>

                <!-- Posted Comments -->

                @foreach($comments as $comment)
                    @include('blog._single_comment', $comment)
                @endforeach


            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" id="sidebar">
                @include('blog.sidebar')
            </div>
            <!-- /.row -->


        </div>
    </div>

@stop
