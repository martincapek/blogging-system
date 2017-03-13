<!DOCTYPE html>
<html lang="en" class="no-js">
<head>

    <title>Erasmus +</title>

    <meta charset="utf-8"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts including -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">

    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/unite-gallery.css">
    <link rel="stylesheet" href="/frontend/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--<script>--}}
    {{--(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){--}}
    {{--(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),--}}
    {{--m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)--}}
    {{--})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');--}}

    {{--ga('create', 'UA-91723800-1', 'auto');--}}
    {{--ga('send', 'pageview');--}}

    {{--</script>--}}

</head>
<body>


<header class="clearfix">
    <div class="container">
        <div class="row flex-center">
            <div class="col-sm-2 col-xs-5 logo">
                <a href="/"><img class="img-responsive" src="/frontend/images/logo1.jpg" alt="Logo BETSV"></a>
            </div>
            <div class="col-sm-10">
               <span class="h1 main-title">
                    Building A Better Europe <br>
                    Through Sports Values
               </span>
            </div>

        </div>
    </div>

    <!-- Static navbar -->
    <div class="navbar-border">
        <nav class="navbar navbar-default navbar-static-top">

            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        @include('frontend.custom-menu', array('items' => Menu::get('main_nav')->roots()))
                    </ul>
                </div>
            </div>

        </nav>
    </div>
</header>

@yield('content')

<footer>
    <div class="inner clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 erasmus-logo">
                    <h3>Supported by</h3>
                    <img src="/frontend/images/erasmus-logo.png" class="img-responsive" alt="">
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-1 col-sm-3">
                    <h3>Schools</h3>
                    <ul class="styled">
                        <li><a href="/schools/czech-republic">Czech Republic</a></li>
                        <li><a href="/schools/italy">Italy</a></li>
                        <li><a href="/schools/norway">Norway</a></li>
                        <li><a href="/schools/spain">Spain</a></li>
                        <li><a href="/schools/portugal">Portugal</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>


<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="/frontend/js/owl.carousel.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/unitegallery.js"></script>
<script src='/frontend/themes/tiles/ug-theme-tiles.js'></script>
<script>

    // Select and loop the container element of the elements you want to equalise
    $('.schools').each(function () {

        // Cache the highest
        var highestBox = 0;

        // Select and loop the elements you want to equalise
        $('.col-md-6', this).each(function () {

            // If this box is higher than the cached highest then store it
            if ($(this).height() > highestBox) {
                highestBox = $(this).height();
            }

        });

        // Set the height of all those children to whichever was highest
        $('.col-md-6', this).height(highestBox);

    });

    $('#banner').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        items: 1
    });

    $('#school-gallery').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        items: 5,
        navText: [
            "<i class='icon-chevron-left icon-white'><</i>",
            "<i class='icon-chevron-right icon-white'>></i>"
        ],
    });

    $('.timeline-gallery').each(function () {
        $(this).owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            items: 2
        }).show();
    });

    $timeline_block = $('.cd-timeline-block');

    $(window).on('scroll', function () {
        $timeline_block.each(function () {
            if ($(this).offset().top <= $(window).scrollTop() + $(window).height() * 0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden')) {
                $(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
            }
        });
    });

    $timeline_block_upcoming = $('.cd-timeline-block.upcoming');
    var upcoming = false;


    $('#show-upcoming').on('click', function () {
        var $this = $(this);
        if (upcoming) {
            $timeline_block_upcoming.slideUp();
            upcoming = false;
            $(this).html('Show upcoming');
        } else {
            $timeline_block_upcoming.slideDown();
            upcoming = true;
            $(this).html('Hide upcoming');
        }
    });


    jQuery("#gallery").unitegallery({
        tiles_type: "justified"
    });

</script>
</body>
</html>
