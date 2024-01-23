@extends('dashboard')

@section('container')
<div class="container">
    <h2>Review Stage Request</h2>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Stage Request</h5>
            <p>Type: {{ $stage->type }}</p>
            <p>Student Name: {{ $stage->student->name }}</p>
            <p>Date D: {{ $stage->dateD_stage }}</p>
            <p>Date F: {{ $stage->dateF_stage }}</p>
            <!-- Add other stage request details -->

            <form method="POST" action="{{ route('reviewStageRequest', ['stageId' => $stage->id]) }}">
                @csrf
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="accept">Accept</option>
                        <option value="reject">Reject</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
