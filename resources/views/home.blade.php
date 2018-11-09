@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">My Locations</div> -->

                <!-- <div class="card-body"> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



@foreach ($zips as $zip)

    <weather name="{{ $zip->name }}" zip="{{ $zip->zipcode }}"></weather>

@endforeach







                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
