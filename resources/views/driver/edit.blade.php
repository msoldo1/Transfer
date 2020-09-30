@extends('layouts.app')

@section('title', 'Edit Driver')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Driver</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/drivers/{{ $driver->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('driver.form')


                    <button class="btn btn-primary" type="submit">Save driver</button>

                </form>
            </div>
        </div>


    </div>
@endsection
