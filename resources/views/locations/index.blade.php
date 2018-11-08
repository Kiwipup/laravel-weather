@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Locations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

<table class="table">
    <thead>
        <tr>
            <th>Action</th>
            <th>Name</th>
            <th>Zipcode</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><form id="add" method="post" action="/locations">@csrf<button class="btn btn-sm btn-primary" type="submit">Add</button></form></td>
            <td><input form="add" class="form-control form-control-sm" type="text" name="newName" id="newName" placeholder="Location name..."></td>
            <td><input form="add" class="form-control form-control-sm" type="text" name="newZip" id="newZip" placeholder="12345"></td>
        </tr>

@foreach ($zips as $zip)

        <tr>
            <td><form method="post" action="/locations/{{ $zip->id }}">@csrf @method('DELETE')<button class="btn btn-sm btn-danger" type="submit">Delete</button></form></td>
            <td>{{ $zip->name }}</td>
            <td>{{ $zip->zipcode }}</td>
        </tr>

@endforeach

    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
