@extends('layouts.app')

@section('title', 'Customers List')

@section('content')
        <div class="row pb-3">
            <div class="col-12">
                <h1>Customers list</h1>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Company</th>
                <th scope="col">User id</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Info</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td> {{ $user->user_number }}</td>
                    <td> {{ $user->phone }}</td>
                    <td> {{ $user->email }}</td>
                    <td><a href="/customers/{{ $user->id }}" class="btn btn-primary">Show</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>

@endsection
