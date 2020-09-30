@extends('layouts.app')

@section('title', 'Details for Truck')

@section('content')

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div class="mr-auto pb-2"><h1>Driver details</h1></div>
                    <div class="p-2"><a class="btn btn-primary" href="/trucks/{{ $truck->id }}/edit">Edit</a></div>
                    <div class="p-2">
                        <form action="/trucks/{{ $truck->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4>Info</h4>
                <hr>
            </div>
            <div class="col-6 pb-2"><strong>Mark: </strong>{{ $truck->brand }}</div>
            <div class="col-6 pb-2"><strong>Max cap: </strong>{{ $truck->capacity }} kg</div>
            <div class="col-6 pb-2"><strong>Type: </strong>{{ $truck->type }}</div>
        </div>

@endsection
