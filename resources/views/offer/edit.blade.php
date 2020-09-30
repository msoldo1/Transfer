@extends('layouts.app')

@section('title', 'Edit details')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit offer</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/offers/{{ $offer->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('offer.form')


                    <button class="btn btn-primary" type="submit">Save offer</button>

                </form>
            </div>
        </div>


    </div>
@endsection
