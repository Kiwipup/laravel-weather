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
    <div class="card-header">{{ $zip->name }} ({{ $zip->zipcode }})</div>
    <div class="card-body">
        <div class="row mt-2">
            <div class="col">
                <p><span class="">48 &#176; F</span><span class="pl-2 pr-2 text-black-50">|</span><span class="">10 &#176; C</span></p>
                <p>150% Humidity</p>
            </div>
            <div class="col text-right"><i style="font-size: 64px;" class="text-info fas fa-cloud-showers-heavy"></i></div>
        </div>
    </div>
</div>

@endforeach







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
