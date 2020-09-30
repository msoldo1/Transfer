@extends('layouts.app')

@section('title', 'Details for order' . $order->id)

@section('content')
    <div class="row pb-3">
        <div class="col-12">
            <div class="d-flex">
                <div class="mr-auto pb-2"><h1>Order details {{ $order->id }}</h1></div>
                @if($order->customer_id == $user_id && $order->company_id == null)
                    <div class="p-2"><a href="/orders/{{ $order->id }}/edit">Edit</a></div>
                    <div class="p-2">
                        <form action="/orders/{{ $order->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                @else
                    @if($order->company_id == null && Auth::user('is_company'))
                        <div class="p-2">
                            <form action="/orders/{{ $order->id }}/acceptOrder" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                        </div>
                    @else
                        <div class="p-2">
                            {{ $order->company->name }}
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
        <div class="col-6 pb-2"><strong>Price: </strong> {{ $order->price }}</div>
        <div class="col-6 pb-2"><strong>Start: </strong>{{ $order->start }}</div>
        <div class="col-6 pb-2"><strong>Destination: </strong>{{ $order->destination }}</div>
        <div class="col-6 pb-2"><strong>Date: </strong>{{ $order->date }}</div>
    </div>

@endsection
