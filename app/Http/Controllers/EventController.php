<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TicketConfirmed;

class EventController extends Controller
{
    public function index() {
        // Fetch all events (or only for the logged-in user if you want)
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create() {
        // Show event creation form
        $events = \App\Models\Event::where('date', '>=', now())->get();
        return view('events.create', compact('events'));
    }

    public function store(Request $request) {
        // Validate and create the event
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|string',
            'tickets_total' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0'
        ]);

        Event::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'date' => $validated['date'],
            'location' => $validated['location'],
            'status' => $validated['status'],
            'tickets_total' => $validated['tickets_total'],
            'price' => $validated['price'],
        ]);

        return redirect()->route('events.index')->with('success', 'Event created!');
    }

    public function show($id) {
        // Show a single event
        $event = \App\Models\Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id) {
        // Edit an event
        $event = \App\Models\Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'status' => 'required|string',
            'tickets_total' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $event = \App\Models\Event::findOrFail($id);
        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated!');
    }

    public function destroy($id)
    {
    \App\Models\Event::findOrFail($id)->delete();
    return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
    public function attendeeIndex()
    {
        $events = \App\Models\Event::where('date', '>=', now())
        ->where('status', 'Active')
        ->get();
        return view('events.attendee_index', compact('events'));
    }

    public function attendeeShow($id)
    {
        $event = \App\Models\Event::findOrFail($id);
        return view('events.attendee_show', compact('event'));
    }

    public function register($eventId)
{
    $user = Auth::user();

    // Prevent duplicate registration
    $alreadyRegistered = \App\Models\Ticket::where('event_id', $eventId)
        ->where('user_id', $user->id)
        ->exists();

    if (!$alreadyRegistered) {
        \App\Models\Ticket::create([
            'event_id' => $eventId,
            'user_id' => $user->id,
            'price' => \App\Models\Event::find($eventId)->price,
            'status' => 'Upcoming',
        ]);

        // Fetch the event and notify the user about the ticket confirmation
        $event = \App\Models\Event::find($eventId);
      
        
        $user->notify(new TicketConfirmed($event));
    }
         
    return redirect()->route('attendee.dashboard')->with('success', 'Registered for event!');
}
}