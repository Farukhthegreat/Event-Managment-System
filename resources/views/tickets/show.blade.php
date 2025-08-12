@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Ticket Details</h2>
    <p>This is the Ticket Details page.</p>
</div>
@endsection
<div class="container mt-4">
    <h3>Ticket Information</h3>
    <p>Here are the details of the ticket:</p>
    <!-- Example ticket details -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Ticket Type: {{ $ticket->type }}</h5>
            <p class="card-text">Price: ${{ $ticket->price }}</p>
            <p class="card-text">Quantity Available: {{ $ticket->quantity_available }}</p>
            <p class="card-text">Status: {{ $ticket->status }}</p>
        </div>
    </div>
</div>