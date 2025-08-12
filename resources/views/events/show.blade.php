@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- <h2>Event Details</h2>
    <p>This is the Event Details page.</p> --}}
</div>
@endsection

    <div class="container mt-4">
        <h3>Event Information</h3>
        <p>Here are the details of the event:</p>
        <!-- Example event details -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Event Name: {{ $event->name }}</h5>
                <p class="card-text">Date: {{ $event->date }}</p>
                <p class="card-text">Location: {{ $event->location }}</p>
                <p class="card-text">Status: {{ $event->status }}</p>
            </div>
        </div>
    </div>
    