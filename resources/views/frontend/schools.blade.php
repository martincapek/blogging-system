@extends('frontend.layout')

@section('content')


    <div class="container school-desc">
        <h1 class="with-line">@yield('school_name')</h1>
        <div class="row">
            <div class="col-md-4 col-md-push-8">
                <img src="@yield('school_image')" class="img-responsive" alt="Photo of school"></div>
            <div class="col-md-8 col-md-pull-4">

                @yield('school_desc')

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="school-gallery" class="owl-carousel owl-theme">
                    @yield('school_gall')

                </div>
            </div>
        </div>
    </div>
@stop