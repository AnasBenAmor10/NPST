@extends('dashboard')
<style>
    .card {
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-4px);
}

.card-title {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
}

.card-text {
    font-size: 0.9rem;
    color: #666;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-primary i {
    margin-right: 0.5rem;
}

</style>
@section('container')
    @if ($total_stage == '0')
        <p> Nothing </p>
    @else
        <div class="container py-4">
        <div class="row">
            @foreach($mystage as $stage)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        {{-- <img class="card-img-top" src="{{ asset('assets/img/st.png') }}" alt="Image Title"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $stage->type }}</h5>
                            <p class="card-text">
                                Start Date: {{ $stage->dateD_stage }}<br>
                                End Date: {{ $stage->dateF_stage }}<br>
                                Soutenance Date: {{ $stage->dateS }}<br>
                                @if ($stage->encadrant_id=='6')
                                Encadrant : <a href="/dashboard/assign-encadrant-to-stage/{{$stage->id}}" class="btn"> choisir un encadrant</a>
                                  
                                @else 
                                Encadrant :{{$stage->encadrant_id}}
                                @endif  
                            </p>
                            <a href="#" class="btn btn-primary"><i class="fa-solid fa-download"></i> Download le rapport</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection
