<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Organizer\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AttendeeController;

Route::get('/organizer/dashboard', [DashboardController::class, 'index'])
    ->name('organizer.dashboard')
    ->middleware('auth');

Route::get('/', function () {
    return view('landing');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/event', function () {
    return view('event');
});

// Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Place attendee route BEFORE /events/{event}
Route::get('/events/attendee', [EventController::class, 'attendeeIndex'])->name('events.attendee_index');
Route::get('/events/attendee/{event}', [EventController::class, 'attendeeShow'])->name('events.attendee_show');
Route::post('/events/register/{event}', [EventController::class, 'register'])->name('events.register')->middleware('auth');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');


// // Tickets
// Route::get('/tickets', function () {
//     return view('tickets.index');
// })->name('tickets.index');
Route::get('/tickets/{ticket}', function () {
    return view('tickets.show');
})->name('tickets.show');
Route::get('/tickets/sales', [TicketController::class, 'sales'])->name('tickets.sales');

// Attendees
Route::get('/attendees', [AttendeeController::class, 'index'])->name('attendees.index');

// Profile
Route::get('/profile/view', function () {
    return view('profile.index');
})->name('profile.index');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Register page
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Forgot password page
Route::get('/password/reset', function () {
    return view('auth.passwords.email');
})->name('password.request');

// Reset password page
Route::get('/password/reset/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

// Organizer dashboard
// Route::get('/organizer/dashboard', function () {
//     return view('dashboard.organizer');
// })->name('organizer.dashboard')->middleware('auth');

// Attendee dashboard
Route::get('/attendee/dashboard', [AttendeeController::class, 'dashboard'])
    ->name('attendee.dashboard')
    ->middleware('auth');

Route::get('/attendee/tickets', [AttendeeController::class, 'tickets'])->name('attendee.tickets');
Route::get('/attendee/registered', [AttendeeController::class, 'registered'])->name('attendee.registered');
Route::get('/attendee/notifications', [AttendeeController::class, 'notifications'])
    ->name('attendee.notifications')
    ->middleware('auth');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// My Events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Create Event
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

// Ticket Sales
Route::get('/tickets/sales', [TicketController::class, 'index'])->name('tickets.sales');
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.cancel')->middleware('auth');
// Attendees
Route::get('/attendees', [AttendeeController::class, 'index'])->name('attendees.index');

// Profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

// Logout (POST recommended)
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
