@extends('layouts.app')

@section('title', 'Details for offer ' . $offer->id)

@section('content')
    <div class="row pb-3">
        <div class="col-12">
            <div class="d-flex">
                <div class="mr-auto pb-2"><h1>Offer details {{ $offer->id }} </h1></div>
                @if($offer->company_id == $user_id && $offer->customer_id == null)
                    <div class="p-2"><a class="btn btn-primary" href="/offers/{{ $offer->id }}/edit">Edit</a></div>
                    <div class="p-2">
                        <form action="/offers/{{ $offer->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                @else
                    @if($offer->customer_id == null)
                        <div class="p-2">
                            <form action="/offers/{{ $offer->id }}/acceptOffer" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                        </div>
                    @else
                        <div class="p-2">
                            {{ $offer->customer->name }}
                        </div>
                        <div class="p-2">
                            Booked
                        </div>
                    @endif
            @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Info</h4>
            <hr>
        </div>
        <div class="col-6 pb-2"><strong>Driver name: </strong>{{ $offer->driver->name }}</div>
        <div class="col-6 pb-2"><strong>Truck: </strong> {{ $offer->truck->brand }}</div>
        <div class="col-6 pb-2"><strong>Price: </strong> {{ $offer->price }} $</div>
        <div class="col-6 pb-2"><strong>Start: </strong>{{ $offer->start }}</div>
        <div class="col-6 pb-2"><strong>Destination: </strong>{{ $offer->destination }}</div>
        <div class="col-6 pb-2"><strong>Date: </strong>{{ $offer->date }}</div>
    </div>
@endsection
