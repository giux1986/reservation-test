<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) 
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
            'attendee_limit' => 'required'
        ]);




        $event = new Event;
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->location = $validatedData['location'];
        $event->date = $validatedData['date'];
        $event->time = $validatedData['time'];
        $event->price = $validatedData['price'];
        $event->max_attendees = $validatedData['attendee_limit'];
        $event->user_id = auth()->user()->id;
        $event->save();
        return redirect()->route('events.show', $event);
    }

    /**
     * Display the specified event.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    /**
     * Display a listing of the authenticated user's events.
     *
     * @return \Illuminate\Http\Response
     */
    public function myEvents()
    {
        $user = auth()->user();
        $events = $user->events;
        return view('events.my-events', compact('events'));
    }
}
