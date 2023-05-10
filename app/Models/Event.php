<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'location',
        'price',
        'max_attendees',
        'user_id',
    ];
    protected $appends = ['attendees'];

    public function getAttendeesAttribute()
    {
        return $this->reservations()->sum('num_tickets');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function has_passed_deadline()
    {
        return now() > $this->date." ".$this->time;
    }
    public function is_full()
    {
        return $this->reservations()->sum('num_tickets') >= $this->max_attendees; 
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
 
    public function available_tickets()
    {
        // Get the number of reservations for the event
        $reserved_tickets = $this->reservations()->sum('num_tickets');

        // Subtract the number of reserved tickets from the maximum attendees
        return $this->max_attendees - $reserved_tickets;
    }
}
