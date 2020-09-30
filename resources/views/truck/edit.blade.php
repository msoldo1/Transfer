@extends('layouts.app')

@section('title', 'Edit Driver')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Truck</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/trucks/{{ $truck->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('truck.form')


                    <button class="btn btn-primary" type="submit">Save truck</button>

                </form>
            </div>
        </div>


    </div>
@endsection
