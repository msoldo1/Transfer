@extends('layouts.app')

@section('title', 'Companies List')

@section('content')

        <div class="row pb-2">
            <div class="col-12">
                <h1>Companies list</h1>
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
                <td><a href="/companies/{{ $user->id }}" class="btn btn-primary">Show</a></td>
            </tr>
            @endforeach

            </tbody>
        </table>





@endsection
