<?php
namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Ticket;

class DashboardController extends Controller
{
    public function index()
    {
        $organizer = Auth::user();

        $events = \App\Models\Event::where('user_id', $organizer->id)->get();
        $upcomingEvents = $events->where('date', '>=', now())->count();
        $ticketsSold = \App\Models\Ticket::whereIn('event_id', $events->pluck('id'))->count();
        $revenue = \App\Models\Ticket::whereIn('event_id', $events->pluck('id'))->sum('price');

        return view('dashboard.organizer', compact('events', 'upcomingEvents', 'ticketsSold', 'revenue'));
    }
}