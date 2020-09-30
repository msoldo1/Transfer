@extends('layouts.app')

@section('title', 'Details for Driver')

@section('content')

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div class="mr-auto pb-2"><h1>Driver details</h1></div>
                    <div class="p-2"><a class="btn btn-primary" href="/drivers/{{ $driver->id }}/edit">Edit</a></div>
                    <div class="p-2">
                        <form action="/drivers/{{ $driver->id }}" method="POST">
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
            <div class="col-6 pb-2"><strong>Name: </strong>{{ $driver->name }}</div>
            <div class="col-6 pb-2"><strong>Phone: </strong>{{ $driver->phone }}</div>
            @if($driver->active == 1)
            <div class="col-6 pb-2"><strong>Status: </strong>Working</div>
            @else
            <div class="col-6" pb-2><strong>Status: </strong>On Vacation</div>
                @endif
        </div>


@endsection
