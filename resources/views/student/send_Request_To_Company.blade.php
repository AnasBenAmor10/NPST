@extends('dashboard')

@section('container')
    <h2>Send Request to Company</h2>
    <!-- Create a form for sending request to company -->
    <form action="{{ route('student.send_Request_To_Company') }}" method="POST">
        @csrf
        <!-- Include form fields here -->
        <button type="submit">Send Request</button>
    </form>
@endsection    

