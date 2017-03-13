@extends('frontend.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="with-line text-center">Timeline</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" id="show-upcoming">Show upcoming</button>
            </div>
        </div>



        <section id="cd-timeline">



            <div class="cd-timeline-block bounce-in upcoming">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/640px-Flag_of_Spain.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Transnational meeting in Spain to elaborate the final report.</h2>
                    <p></p>

                    <span class="cd-date">14 – 18 JUNE 2018</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->

            <div class="cd-timeline-block bounce-in upcoming">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/640px-Flag_of_Italy.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Conference meeting in Italy</h2>
                    <p></p>

                    <span class="cd-date">7 – 14 MAY 2018</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->




            <div class="cd-timeline-block bounce-in upcoming">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/640px-Flag_of_Portugal.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Conference meeting in Portugal </h2>
                    <p></p>

                    <span class="cd-date">27 FEBRUARY – 6 MARCH 2018</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->



            <div class="cd-timeline-block bounce-in upcoming">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/640px-Flag_of_Portugal.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Transnational meeting in Portugal</h2>
                    <p></p>

                    <span class="cd-date">16 - 20 JUNE 2017</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->


            <div class="cd-timeline-block bounce-in upcoming">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/640px-Flag_of_Norway.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Conference meeting in Norway</h2>
                    <p></p>

                    <span class="cd-date">15 – 22 MAY 2017</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->



            <div class="cd-timeline-block bounce-in">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/640px-Flag_of_Spain.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Conference meeting in Spain</h2>
                    <p></p>

                    <span class="cd-date">3 – 10 MARCH 2017</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->


            <div class="cd-timeline-block bounce-in">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/640px-Flag_of_Europe.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Preparing the Erasmus Corners</h2>
                    <p>Students from all schools are working on their Erasmus corners.</p>

                    <div class="owl-carousel owl-theme timeline-gallery">
                        <div class="item"><img src="/frontend/images/other/e_corner.jpg" class="img-responsive" alt=""></div>
                        <div class="item"><img src="/frontend/images/other/e_corner_2.jpg" class="img-responsive" alt=""></div>

                    </div>

                    <span class="cd-date">DECEMBER 2016</span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->




            <div class="cd-timeline-block bounce-in">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/640px-Flag_of_Europe.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Logo competition</h2>
                    <p>Students from all schools created logos for the project. Every school chose the best ones and then
                        all 5 countries decided on the winning one. As most people voted for one of the italian logos, it
                        was decided that the one will be the logo of the project.</p>

                    <div class="owl-carousel owl-theme timeline-gallery">
                        <div class="item"><img src="/frontend/images/logo1.jpg" class="img-responsive" alt=""></div>

                    </div>

                    <span class="cd-date">NOVEMBER 2016 </span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->


            <div class="cd-timeline-block bounce-in">
                <div class="cd-timeline-img">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/640px-Flag_of_the_Czech_Republic.svg.png"
                         alt="Picture">
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2>Transnational meeting in the Czech Republic </h2>
                    <p>Teachers from all 5 countries came to Brno to agree on all the issues related to the project. They
                        not only discussed the programmes of individual meetings, distributed tasks for each school and
                        decided on deadlines, but they also got acquainted with the E - Twinning platform and had some time
                        to visit interesting places in Brno and its surroundings.</p>

                    <div class="owl-carousel owl-theme timeline-gallery">
                        <div class="item"><img src="/frontend/images/other/meeting_brno.jpg" class="img-responsive" alt=""></div>

                    </div>
                    <span class="cd-date">17 – 21 OCTOBER 2016 </span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block bounce-in -->


        </section>
    </div>
@stop