{{-- filepath: resources/views/events/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Event</h2>
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="eventName" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="eventName" name="name" value="{{ $event->name }}" required>
        </div>
        <div class="mb-3">
            <label for="eventDate" class="form-label">Date</label>
            <input type="date" class="form-control" id="eventDate" name="date" value="{{ $event->date }}" required>
        </div>
        <div class="mb-3">
            <label for="eventLocation" class="form-label">Location</label>
            <input type="text" class="form-control" id="eventLocation" name="location" value="{{ $event->location }}" required>
        </div>
        <div class="mb-3">
            <label for="eventStatus" class="form-label">Status</label>
            <select class="form-select" id="eventStatus" name="status" required>
                <option value="Active" {{ $event->status == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Draft" {{ $event->status == 'Draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ticketsTotal" class="form-label">Total Tickets</label>
            <input type="number" class="form-control" id="ticketsTotal" name="tickets_total" value="{{ $event->tickets_total }}" required>
        </div>
        <div class="mb-3">
            <label for="eventPrice" class="form-label">Ticket Price</label>
            <input type="number" step="0.01" class="form-control" id="eventPrice" name="price" value="{{ $event->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
@endsection