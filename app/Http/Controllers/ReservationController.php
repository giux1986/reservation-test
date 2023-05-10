<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function create(Request $request)
    {
        $event= Event::findOrFail($request->event);

        
        return view('reservations.create', compact("event"));
    }
    public function store(Request $request)
    {
        $event= Event::findOrFail($request->event_id);
        // Validate the request data
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'event_id' => 'required',
            'num_tickets' => 'required',
        ]);

        // Create a new reservation
        $reservation = new Reservation([
            'name' => $data['name'],
            'email' => $data['email'],
            'num_tickets' => $data['num_tickets'],
            'event_id' => $data['event_id'],
            'user_id' => auth()->user()->id
        ]);

        // Save the reservation to the database
        $reservation->save();

        // Redirect the user back to the event page with a success message
        return redirect()->route('events.show', $event)->with('success', 'Reservation successful!');
    }
}
