@extends('layouts.app')

@section('title', 'Create New Truck')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add new truck</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/trucks" method="POST" class="pb-5">
                    @include('truck.form')

                    <button class="btn btn-primary" type="submit">Add new truck</button>

                </form>
            </div>
        </div>


    </div>
@endsection
