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
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title"> Company</h5>
                          <p class="card-text"></p>
                          <a href="{{ route('company.index') }}" class="btn btn-primary">View Company List</a>
                        </div>
                      </div>
                      <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title"> Employee</h5>
                          <p class="card-text"></p>
                          <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employee List</a>
                        </div>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
