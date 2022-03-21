@extends('dashboard.layouts.main')

@section('contentAdmin')

    <div class="row">
        <div class="card col-lg-8 card-primary">
            <div class="card-header">
                <h5>Welcome</h5>
            </div>
            <div class="card-body col-lg-8">
                <h2>{{ Auth::user()->name }} :)</h2>
            </div>
        </div>
    </div>

@endsection