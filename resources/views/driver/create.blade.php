@extends('layouts.app')

@section('title', 'Create New Driver')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Add new driver</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/drivers" method="POST" class="pb-5">
                    @include('driver.form')

                    <button class="btn btn-primary" type="submit">Add new driver</button>

                </form>
            </div>
        </div>


    </div>
@endsection
