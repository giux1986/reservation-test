@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $event->title }}</div>

                    <div class="card-body">
                        <p>{{ $event->description }}</p>
                        <p>Date and time: {{ $event->date }} {{ $event->time }}</p>
                        <p>Location: {{ $event->location }}</p>
                        <p>Price: {{ $event->price }}</p>
                        <p>Attendee limit: {{ $event->available_tickets() }}</p>

                        @if ($event->is_full())
                            <p>This event is sold out.</p>
                        @elseif ($event->has_passed_deadline())
                            <p>The deadline to reserve tickets for this event has passed.</p>
                        @else
                               
                                <a href="{{ route('reservations.create', ['event'=>$event->id]) }}" class="btn btn-primary btn-sm"> {{ __('Reserve Ticket') }}</a>

                        @endif

                       

                    </div>
                </div>
                <br>
                
                        <a href="{{ route('events.my-events') }}" class="btn btn-primary btn-sm"> {{ __('Go Back') }}</a>
            </div>
        </div>
    </div>
@endsection
