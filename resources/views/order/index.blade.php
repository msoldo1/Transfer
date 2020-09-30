@extends('layouts.app')

@section('title', 'Order List')

@section('content')
    <div class="row pb-3">
        <div class="col-12">
            <div class="d-flex">
                <div class="mr-auto pb-2"><h1>Orders List</h1></div>
                @if(Auth::check() && Auth::user()->is_customer)
                    <div class="p-2"><a class="btn btn-primary" href="/orders/create">Create new order</a></div>
                @endif
                <div class="p-2">
                    <form class="form-inline" action="/order/search" method="get">
                        <input type="search" class="form-control ml-sm-2" name="query" placeholder="Search for start or destination">
                        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Customer</th>
            <th scope="col">Price</th>
            <th scope="col">Start</th>
            <th scope="col">Destination</th>
            <th scope="col">Date</th>
            <th scope="col">Info</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <th scope="row">{{ $order->id }}</th>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->price }}</td>
                <td> {{ $order->start }}</td>
                <td> {{ $order->destination }}</td>
                <td> {{ $order->date }}</td>

                @if($order->company == null)
                    <td><a href="/orders/{{ $order->id }}"><i class="fas fa-info"></i></a></td>
                @else
                    <td><a href="/orders/{{ $order->id }}"><i class="fas fa-info"></i> Booked</a></td>
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
                {{ $orders->links() }}
            </div>
        </div>
    @endif


@endsection
