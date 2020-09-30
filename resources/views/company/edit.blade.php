@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Edit Company</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/companies/{{ $user->id }}" method="POST" class="pb-5">
                    @method('PATCH')
                    @include('company.form')

                    <button class="btn btn-primary" type="submit">Save company</button>
                </form>
            </div>
        </div>


    </div>
@endsection
