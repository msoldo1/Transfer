@extends('layouts.app')

@section('title', 'Edit details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit orders</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/orders/{{ $order->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('order.form')


                    <button class="btn btn-primary" type="submit">Save order</button>

                </form>
            </div>
        </div>


    </div>
@endsection
