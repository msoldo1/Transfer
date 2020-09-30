@extends('layouts.app')

@section('title', 'Details')

@section('content')

        <div class="row">
            <div class="col-12">
                <h1>Offer details</h1>
            </div>
        </div>
        <hr>
        @if(Auth::user()->is_company == true)
            <div class="row">
                    <div class="col-6 pb-2"><strong>Driver: </strong>{{ $offer->driver->name }}</div>
                    <div class="col-6 pb-2"><strong>Truck: </strong>{{ $offer->truck->brand }}</div>
                    <div class="col-6 pb-2"><strong>From - To: </strong>{{ $offer->start }} - {{ $offer->destination }}}</div>
                    <div class="col-6 pb-2"><strong>Date: </strong>{{ $offer->date }}</div>
                    <div class="col-6 pb-2"><strong>Price: </strong>{{ $offer->price }}</div>
                    <div class="col-6 pb-2"><strong>Booked: </strong> {{ $offer->customer->name }}</div>
            </div>
        @else
            <div class="row">
                <div class="col-6 pb-2"><strong>From - To: </strong>{{ $order->start }} - {{ $order->destination }}</div>
                <div class="col-6 pb-2"><strong>Date: </strong>{{ $order->date }}</div>
                <div class="col-6 pb-2"><strong>Booked: </strong> {{ $order->company->name }}</div>
            </div>
        @endif


@endsection
