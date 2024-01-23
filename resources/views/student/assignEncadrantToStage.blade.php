@extends('dashboard')

@section('container')
<div class="container">
    <h2>Assign Encadrant to Stage</h2>

    

   <h2>Encadrants</h2>

<ul>
    @foreach ($encadrants as $encadrant)
    <li>
        Encadrant: {{ $encadrant->name }}
        <form action="{{ route('student.assignEncadrantToStage', ['stageId' => $stage->id, 'encadrantId' => $encadrant->id]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Assigner à ce Stage</button>
        </form>
    </li>
    @endforeach
</ul>

</div>
@endsection
