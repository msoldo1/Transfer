@extends('layouts.app')

@section('title', 'My Offers List')

@section('content')

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div class="mr-auto pb-2"><h1>Offers List</h1></div>
                    @if(Auth::check() && Auth::user()->is_company)
                        <div class="p-2"><a class="btn btn-primary" href="/offers/create">Create new offer</a></div>
                    @endif
                    <div class="p-2"><form class="form-inline" action="/offer/search" method="get">
                        <input type="search" class="form-control ml-sm-2" name="query" placeholder="Search for start or destination">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                        </form></div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Company</th>
                <th scope="col">Truck</th>
                <th scope="col">Price</th>
                <th scope="col">Start</th>
                <th scope="col">Destination</th>
                <th scope="col">Date</th>
                <th scope="col">Info</th>
            </tr>
            </thead>
            <tbody>
            @foreach($offers as $offer)
                <tr>
                    <th scope="row">{{ $offer->id }}</th>
                    <td>{{ $offer->company->name }}</td>
                    <td> {{ $offer->truck->brand }}</td>
                    <td> {{ $offer->price }}</td>
                    <td> {{ $offer->start}}</td>
                    <td> {{ $offer->destination }}</td>
                    <td> {{ $offer->date }}</td>

                    @if($offer->customer == null)
                        <td><a href="/offers/{{ $offer->id }}"><i class="fas fa-info"></i></a></td>
                    @else
                        <td><a href="/offers/{{ $offer->id }}"><i class="fas fa-info"></i> Booked</a></td>
                    @endif
                </tr>
            @endforeach

            </tbody>
        </table>
        @if(str_contains(url()->current(), 'search'))
        <div></div>
        @else
        <div class="row pt-3">
            <div class="col-12  d-flex justify-content-center">
                {{ $offers->links() }}
            </div>
        </div>
        @endif
@endsection
