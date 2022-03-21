@extends('dashboard.layouts.main')

@section('contentAdmin')

    <div class="row col-lg-8">
        <div class="card card-outline card-primary col-lg-8">
            <div class="card-header">
                <h3>Welcome</h3>
            </div>
            <div class="card-body">
                <h1>{{ Auth::user()->name }} :)</h1>
            </div>
        </div>
    </div>

@endsection