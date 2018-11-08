@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Locations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

@foreach ($zips as $zip)

<div class="card mb-3">
  <div class="card-body">
    <h5 class="card-title">{{ $zip->name }}</h5>
    <p class="card-text">{{ $zip->zipcode }}</p>
  </div>
</div>

@endforeach







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
