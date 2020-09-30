@extends('layouts.app')

@section('title', 'Truck List')

@section('content')

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div  class="mr-auto pb-2"><h1>Truck List</h1></div>
                    <div class="p-2"><a class="btn btn-primary" href="/trucks/create">Creat new truck</a></div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Truck Brand</th>
                <th scope="col">Type</th>
                <th scope="col">Capacity</th>
                <th scope="col">Info</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trucks as $truck)
                <tr>
                    <th scope="row">{{ $truck->id }}</th>
                    <td>{{ $truck->brand }}</td>
                    <td>{{ $truck->type }}</td>
                    <td>{{ $truck->capacity }}</td>
                    <td><a href="/trucks/{{ $truck->id }}"><i class="fas fa-info"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>



@endsection
