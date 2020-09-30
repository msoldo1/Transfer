@extends('layouts.app')

@section('title', 'Create New Order')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add new order</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/orders" method="POST" class="pb-5">
                    @include('order.form')

                    <button class="btn btn-primary" type="submit">Add new order</button>

                </form>
            </div>
        </div>


    </div>
@endsection
