@extends('layouts.app')

@section('title', 'Create New Offer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add new offer</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/offers" method="POST" class="pb-5">
                    @include('offer.form')

                    <button class="btn btn-primary" type="submit">Add new offer</button>

                </form>
            </div>
        </div>


    </div>
@endsection
