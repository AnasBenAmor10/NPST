@extends('dashboard')
@section('container')
    <h2>My Stage Requests</h2>
    @foreach ($myStageRequests as $request)
        <!-- Display stage request details here -->
        <p>Company ID: {{ $request->company_id }}</p>
        <!-- Display other request details -->
    @endforeach
@endsection    

