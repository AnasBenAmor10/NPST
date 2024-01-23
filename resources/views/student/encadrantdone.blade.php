@extends('dashboard')

@section('container')
    <div class="container">
        <h2>Stages</h2>
        @if ($stages->isEmpty())
            <p>No stages available.</p>
        @else
            <ul>
                @foreach ($stages as $stage)
                <li>
                    Stage Type: {{ $stage->type }}
                    Etudiant ID: {{ $stage->etudiant_id }}
                    <!-- Afficher d'autres détails du stage ici -->
                    @if (!$stage->encadrant_id)
                        <form action="{{ route('student.assignEncadrantToStage', ['stageId' => $stage->id, 'encadrantId' => $encadrantId]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Assign Encadrant</button>
                        </form>
                    @endif
                </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
