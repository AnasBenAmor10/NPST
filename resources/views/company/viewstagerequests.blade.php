@extends('dashboard')

@section('container')
    <div class="container">
        <h1>Stage Requests</h1>
        <div class="custom-table">
            <table>
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Student Email</th>
                        <th>Request Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stageRequests as $request)
                        <tr>
                            <td>{{ $request->student->name }}</td>
                            <td>{{ $request->student->email }}</td>
                            <td>{{ $request->created_at }}</td>
                            <td>
                                <a href="{{ route('company.respondToStageRequest', ['requestId' => $request->id, 'companyId' => $companyId]) }}" class="btn btn-primary">Respond</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
    h1{
        text-align: center;
        margin-bottom: 20px;
    }
    .custom-table {
        margin-top: 20px;
    }
    
    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }
    
    th, td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
    }
    
    th {
        background-color: #f2f2f2;
        
    }
    td{
        justify-content: center;

    }
    
    .btn {
        padding: 5px 10px;
        border: none;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        width: 150px;

    }
    
    .btn:hover {
        background-color: #0056b3;
    }
</style>
