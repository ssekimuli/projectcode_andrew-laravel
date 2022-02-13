@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     @include('layouts.sideMenu')
        <div class="col-md-8">
            <div class="shadow-sm">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body py-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Ssekimuli Andrew </p>
                    <h1>Manage company <br>
                    and Employees</h1>
                    
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
