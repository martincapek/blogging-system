@extends('frontend.layout')

@section('content')
    <div class="container clearfix">
        <div id="banner" class="owl-carousel owl-theme">
            <div class="item"><img src="/frontend/images/main_banner.jpg" alt="Main banner"></div>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="with-line">We Are Building Better Europe</h1>

                <p>
                    <strong>BETSV</strong> is an ETwinning project within an Erasmus + KA2 - Strategic partnership for
                    schools.
                    Five schools from different countries are involved in the project : <strong>Molde kommune - Bergmo
                        (Norway)</strong>, <strong>Istituto Tecnico Superiore Carlo Rosselli (Italy)</strong>, <strong>SOS
                        EDUCAnet
                        Brno (Czech Republic)</strong>, <strong>Escolas Pdr. Ant. Martins de Oliveira
                        (Portugal)</strong> and
                    <strong>IES El Burgo de Las Rozas (Spain)</strong>.
                    The purpose of this two year project is to boost the European dimension of sports in our
                    school-communities
                    and give our teachers and students diverse opportunities to get in touch with colleagues from other
                    countries and cultures in order to compare the similarities and differences.
                    Taking part in this European partnership will improve the quality and relevance of language learning
                    by
                    strengthening intercultural links with other European countries and empowering the use of new
                    technologies.
                    Promoting local international experience will help to construct a more profound European identity.

                </p>


                <div class="row schools">
                    <div class="col-md-12">
                        <h2 class="with-line">Schools</h2>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/640px-Flag_of_the_Czech_Republic.svg.png"
                                     class="img-responsive" alt="Flag of Czech Republic">
                            </div>
                            <div class="col-sm-9">
                                <h3><a href="/schools/czech-republic">SOS EDUCAnet Brno</a></h3>
                                <p>EDUCAnet Brno school is situated in a quiet part of Brno – it is the 2nd largest city
                                    and
                                    it is said to be one of the most beautiful cities in the Czech Republic. EDUCAnet
                                    Brno
                                    is a part of a secondary school network which consists of four other schools in
                                    different cities of the Czech Republic. </p>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/Flag_of_Spain.svg/640px-Flag_of_Spain.svg.png"
                                     class="img-responsive" alt="Flag of Spain">
                            </div>
                            <div class="col-sm-9">
                                <h3><a href="/schools/spain">IES El Burgo de Las Rozas</a></h3>
                                <p>The IES EL Burgo de Las Rozas is a bilingual Secondary School located in a
                                    medium-high
                                    income area in the Northwestern town of
                                    Las Rozas in Madrid. We have around one thousand students but try to fit the needs
                                    for
                                    all types of pupils.
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/0/03/Flag_of_Italy.svg/640px-Flag_of_Italy.svg.png"
                                     class="img-responsive" alt="Flag of Italy">
                            </div>
                            <div class="col-sm-9">
                                <h3><a href="/schools/italy">Istituto Tecnico Superiore Carlo Rosselli</a></h3>
                                <p>The school is located in the western suburbs of the municipality of Genova, in the
                                    north
                                    of Italy. This area has had a great development in the last few years. A lot of
                                    popular
                                    buildings have been built increasing the number of inhabitants.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/640px-Flag_of_Norway.svg.png"
                                     class="img-responsive" alt="Flag of Norway">
                            </div>
                            <div class="col-sm-9">
                                <h3><a href="/schools/norway">Molde kommune - Bergmo</a></h3>
                                <p>Bergmo Ungdomsskole is in Molde on the west coast of Norway. It is a small town with
                                    25
                                    000
                                    inhabitants, and it is the administrative center of the region. Bergmo Ungdomsskole
                                    is a
                                    general lower secondary school with app. 300 students from the age of 13 to the age
                                    of
                                    16.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/640px-Flag_of_Portugal.svg.png"
                                     class="img-responsive" alt="Flag of Portugal">
                            </div>
                            <div class="col-sm-9">
                                <h3><a href="/schools/portugal">Escolas Pdr. Ant. Martins de Oliveira</a></h3>
                                <p>ESPAMOL – Escola Secundária Padre António Martins de Oliveira, it’s a public school
                                    aggregation of medium size, with about 1790 students from the pre-school up to high
                                    school (12th grade). It’s placed in the heart of western Algarve, in Lagoa, between
                                    Portimão and Silves.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-md-4 news clearfix">
                <div class="inner clearfix">
                    <h2>Latest News</h2>
                    <div class="item">
                        <h3>The meeting in Spain is approaching ( 3-10 March 2017)</h3>

                    </div>
                    <div class="item">
                        <h3>Students of each school are getting ready for the meeting in Spain</h3>
                        They are creating presentations on the assigned topics and they are also getting ready for the
                        debate. The assigned topics for presentations are - Greece: the birth of the Olympic Games
                        (Italy),
                        Rome: sport as a show and a social event (Italy), Middle Ages: tournaments, the Knight ideal,
                        sports
                        as a way to train skillful warriors (Portugal), Thomas Arnold, the education reformer who
                        highlighted values of sports (The Czech Republic), Pierre de Coubertin the creator of the modern
                        Olympic Games (Spain) and Modern sport after the Second World War (Norway).
                    </div>

                    <div class="item">
                        <h3>Students are creating Erasmus Corners at their schools</h3>
                    </div>

                </div>
            </div>
        </div>


    </div>
@stop