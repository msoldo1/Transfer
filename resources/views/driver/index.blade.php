@extends('layouts.app')

@section('title', 'Drivers List')

@section('content')
        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex">
                    <div  class="mr-auto pb-2"><h1>Drivers List</h1></div>
                    <div class="p-2"><a class="btn btn-primary" href="/drivers/create">Creat new driver</a></div>
                </div>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Driver name</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col">Info</th>
            </tr>
            </thead>
            <tbody>
            @foreach($drivers as $driver)
                <tr>
                    <th scope="row">{{ $driver->id }}</th>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->phone }}</td>
                    @if($driver->active == 1)
                        <td>Working</td>
                    @else
                        <td>On Vacation</td>
                    @endif
                    <td><a href="/drivers/{{ $driver->id }}"><i class="fas fa-info"></i></a></td>

                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
