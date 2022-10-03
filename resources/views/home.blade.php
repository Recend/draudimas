@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                        <br>
                        <a class="btn btn-warning" href="{{ route('owners.index') }}">Savininkai</a><br>
                        <a class="btn btn-warning mt-3" href="{{ route('cars.index') }}">Automobiliai</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
