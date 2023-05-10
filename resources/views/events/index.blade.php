@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Events</h1>
        @if(count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date and Time</th>
                        <th>Location</th>
                        <th>Price</th>
                        <th>Available Seats</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date_time->format('F d, Y h:i A') }}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->price }}</td>
                            <td>{{ $event->available_seats }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">View</a>
                                @if(auth()->check() && $event->user_id == auth()->user()->id)
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                @endif
                                @if(auth()->check() && !$event->isExpired() && $event->available_seats > 0)
                                    <a href="{{ route('reservations.create', $event->id) }}" class="btn btn-success btn-sm">Reserve</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>There are no events available at the moment.</p>
        @endif
    </div>
@endsection
