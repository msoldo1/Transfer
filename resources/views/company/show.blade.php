@extends('layouts.app')

@section('title', 'Details for Company'. $user->name)

@section('content')

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div class="mr-auto pb-2"><h1>Company {{ $user->name }} details</h1></div>
                    <div class="p-2"><a class="btn btn-primary" href="/companies/{{ $user->id }}/edit">EDIT</a></div>
                    <div class="p-2">
                        <form action="/companies/{{ $user->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <h4>Basic info</h4>
                <hr>
            </div>
                <div class="col-6 pb-2"><strong>Name: </strong>{{ $user->name }}</div>
                <div class="col-6 pb-2"><strong>Phone: </strong>{{ $user->phone }}</div>
                <div class="col-6 pb-2"><strong>ID: </strong>{{ $user->user_number }}</div>
                <div class="col-6 pb-2"><strong>User email: </strong>{{ $user->email }}</div>
                <div class="col-6 pb-2"><strong>Number of offers: </strong>{{ $offers->count() }}</div>
                <div class="col-6 pb-2"><strong>Number of orders: </strong>{{ $orders->count() }}</div>
        </div>
        <hr class="pb-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h3>List of company offers</h3>

                </div>
            </div>
        </div>
        <table class="table table-striped ">
            <thead >
            <tr>
                <th scope="col">ID offer</th>
                <th scope="col">Start</th>
                <th scope="col">Destination</th>
                <th scope="col">Name of driver</th>
                <th scope="col">Customer</th>
                <th scope="col">Datum</th>
            </thead>
            <tbody>

            @foreach($offers as $offer)

                <tr>
                    <th scope="row">{{ $offer->id }}</th>
                    <td>
                        {{ $offer->start }}
                    </td>
                    <td>{{ $offer->destination }}</td>
                    <td>
                            {{ $offer->driver->name }}
                    </td>
                    <td>
                        {{ $offer->customer->name ?? 'not booked'}}
                    </td>
                    <td>
                        {{ $offer->date }}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

        <hr class="pb-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <h3>List of company orders</h3>

                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead >
            <tr>
                <th scope="col">ID order</th>
                <th scope="col">Start</th>
                <th scope="col">Destination</th>
                <th scope="col">Price</th>
                <th scope="col">Customer</th>
                <th scope="col">Datum</th>
            </thead>
            <tbody>
            @foreach($orders as $order)

                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>
                        {{ $order->start }}
                    </td>
                    <td>{{ $order->destination }}</td>
                    <td>
                        {{ $order->price }}
                    </td>
                    <td>
                        {{ $order->company->name }}
                    </td>
                    <td>
                        {{ $order->date }}
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>

@endsection
