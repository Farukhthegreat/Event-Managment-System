<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index() { return view('attendees.index'); }

    public function tickets()
    {
        // Fetch tickets for the logged-in attendee if needed
        $tickets = \App\Models\Ticket::with('event')->where('user_id', \Illuminate\Support\Facades\Auth::id())->get();
        return view('attendee.tickets', compact('tickets'));
    }

    public function registered()
    {
        // Fetch registered events for the logged-in attendee if needed
        $userId = \Illuminate\Support\Facades\Auth::id();
        $tickets = \App\Models\Ticket::with('event')->where('user_id', $userId)->get();
        return view('attendee.registered', compact('tickets'));
    }

    public function notifications()
    {
        // Fetch notifications for the logged-in attendee if needed
        $notifications = \Illuminate\Support\Facades\Auth::user()->notifications;
        return view('attendee.notifications', compact('notifications'));
    }

    public function dashboard()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $myTickets = $user->tickets()->with('event')->get();

        // Count of events registered (unique events from tickets)
        $eventsRegistered = $myTickets->pluck('event_id')->unique()->count();

        // Count of tickets purchased
        $ticketsPurchased = $myTickets->count();

        // Count of events rated (if you have a ratings table)
        $eventsRated = \App\Models\Rating::where('user_id', $user->id)->count();

        // Fetch notifications for the logged-in attendee
        $notifications = $user->notifications;

        // Pass all variables to the view
        return view('dashboard.attendee', compact(
            'myTickets',
            'eventsRegistered',
            'ticketsPurchased',
            'eventsRated',
            'notifications'
        ));
    }
}
