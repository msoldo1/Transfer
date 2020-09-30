@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Customer</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/customers/{{ $user->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('customer.form')


                    <button class="btn btn-primary" type="submit">Save customer</button>

                </form>
            </div>
        </div>


    </div>
@endsection
