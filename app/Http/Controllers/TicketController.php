<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function sales() 
    { 
        return view('tickets.sales'); 
    }

    public function index() 
    {
    // Organizer: show tickets for their events only
    $events = \App\Models\Event::where('organizer_id', Auth::id())->pluck('id');
    $tickets = \App\Models\Ticket::with(['event', 'user'])->whereIn('event_id', $events)->get();

    return view('tickets.index', compact('tickets'));
}   

    public function show($id) 
    { 
        $ticket = \App\Models\Ticket::with('event')->findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    public function registered()
    {
        $user = Auth::user();
        $tickets = [];
        if ($user) {
            $tickets = \App\Models\Ticket::with('event')->where('user_id', $user->id)->get();
        }
        return view('attendee.registered', compact('tickets'));
    }
    public function destroy($id)
    {
        $ticket = \App\Models\Ticket::findOrFail($id);

        // Optional: Check if the ticket belongs to the logged-in user
        if ($ticket->user_id !== optional(Auth::user())->id) {
            abort(403);
        }

        $ticket->delete();

        return back()->with('success', 'Ticket cancelled successfully.');
    }
}
