@extends('layouts.app')

@section('title', 'Notifications')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">
                @if(Auth::user()->is_company == true)
                    <h1>Orders for
                @else
                    <h1>Offers for
                @endif
                        {{ $user->name }}</h1>
            </div>
        </div>
        @if($user->notifications->count()==0)
            <div class="row">
                <div class="col-4">U have no new messages</div>
            </div>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Booked by</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->notifications as $notification)
                    <tr>
                        <th scope="row"><a href="/inovices/{{ $notification->data['id'] }}">{{ $notification->data['id'] }}</a></th>
                        <td>{{ $notification->data['user_name'] }}</td>
                        @if($notification->read_at != null)
                            <td> <i class="fas fa-check"></i></td>
                        @else
                            <td><i class="fas fa-book-open"></i></td>
                        @endif
                    </tr>
                @endforeach
                @endif

                </tbody>
            </table>


    </div>

@endsection
