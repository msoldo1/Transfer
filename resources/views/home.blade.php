@extends('layouts.app')

@section('content')

    <div class="row pb-3">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <h1><strong>Welcome to Transfer Platform</strong></h1>
            </div>
        </div>
    </div>
    <section id="showcase" class="showcase1">
        <div class="row">
                <div class="col-sm-7">
                        <img src="images/photo1.jpg">
                </div>
                <div class="col-sm-5">
                    <div class="pt-5">
                        <h1 class="font-weight-bolder">Get on road with us</h1>
                        <h4 class="font-weight-bold">Looking for transport of your goods
                            check here for current offers</h4>
                    </div>
                    <br>
                    <a href="{{ route('offers.index') }}" class="btn btn-primary btn-lg showcase-btn">Check for transport</a>
                </div>
            </div>
    </section>
    <hr>
    <section id="testimonial">
        <div class="container">
            <p>" If it can be profitable to be green, that's just smart business "</p>
            <p class="customer">- Barry Sternlicht</p>
        </div>
    </section>
    <hr>
    <section id="info">
        <div class="container">
            <div class="info-left">
                <h1 class="pb-3">Lower your transport costs</h1>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h3>1. You need transport  <i class="fas fa-road"></i></h3>
                        <p>You will quickly find trucks that pass by you empty and travel in direction you want because you have access to millions of trips. </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3>2. Get in touch  <i class="fas fa-euro-sign"></i></h3>
                        <p>Pick date, enter exact start and finishing address. Choose transport firm you want to transport your goods and book it! </p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3>3. Start  <i class="fas fa-check"></i></h3>
                        <p>Get your goods exactly where u want them to be </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="showcase" class="showcase1">
        <div class="row">
            <div class="col-sm-7">
                <img src="images/photo6.jpg">
            </div>
            <div class="col-sm-5">
                <div class="pt-5">
                    <h1 class="font-weight-bolder">Where do you go?</h1>
                    <h4 class="font-weight-bold">Offer your empty cargo space and make most out of it </h4>
                </div>
                <br>
                <a href="{{ route('orders.index') }}" class="btn btn-primary btn-lg showcase-btn">Make an offer</a>
            </div>
        </div>
    </section>
    <hr>
    <section id="info3">
        <div class="container">
            <div class="info-right">
                <h1 class="pb-3">Get more from your journey</h1>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h3>1. Going on journey?  <i class="fas fa-road"></i></h3>
                        <p> You have empty space in your track through some part of your journey?</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3>2. You wanna fill it?  <i class="fas fa-euro-sign"></i></h3>
                        <p>Pick date, enter route you pass by empty. Choose type of your vehicle and other info. Set price by km and someone will book you!</p>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3>3. Booked!  <i class="fas fa-check"></i></h3>
                        <p>Pick your cargo and deliver it! Free of charges </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>







@endsection
