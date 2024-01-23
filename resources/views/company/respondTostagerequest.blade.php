@extends('dashboard')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Respond to Stage Request') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('company.respondToStageRequest', $stage->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="response" class="col-md-4 col-form-label text-md-right">{{ __('Response') }}</label>

                            <div class="col-md-6">
                                <select id="response" class="form-control @error('response') is-invalid @enderror" name="response" required>
                                    <option value="accept">{{ __('Accept') }}</option>
                                    <option value="reject">{{ __('Reject') }}</option>
                                </select>

                                @error('response')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
