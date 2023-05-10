@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>My Events</h1>
        @if(count($events) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date and Time</th>
                        <th>Location</th>
                        <th>Attendees</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->date}} {{ $event->date}}</td>
                            <td>{{ $event->location }}</td>
                            <td>{{ $event->attendees}} / {{ $event->max_attendees }}</td>
                            <td>
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You have not created any events yet.</p>
        @endif
    </div>
@endsection
