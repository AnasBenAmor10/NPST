@extends('dashboard')
@section('container')
<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    .custom-table th,
    .custom-table td {
        padding: 10px;
        border: 1px solid #ccc;
        text-align: center;
    }

    .custom-table th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .custom-table img {
        max-width: 100px;
        height: auto;
    }

    .custom-btn {
        /* Appliquer le style Bootstrap au bouton */
        padding: 5px 10px;
        font-size: 0.9rem;
        border: 1px solid #007bff;
        color: #007bff;
        background-color: transparent;
        border-radius: 0.25rem;
        text-decoration: none;
        transition: all 0.3s;
    }

    .custom-btn:hover,
    .custom-btn:focus {
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
    }
</style>
<div class="container">
    <table class="custom-table">
        <!--Table Header-->
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <!--Table Body-->
        <tbody>
            @foreach($encadrants as $encadrant)
            <tr>
                <td><img src="{{ asset('assets/img/' . $encadrant->image) }}" alt="{{$encadrant->name}}"></td>
                <td>{{$encadrant->name}}</td>
                <td>{{$encadrant->email}}</td>
                <td>{{$encadrant->phone}}</td>
                <td><a href="/dashboard/assign-Encadrant-To-Stage/{{$encadrant->id}}" class="custom-btn btn btn-sm btn-outline-primary">demande</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
