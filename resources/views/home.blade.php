@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Logged In</div>

                <div class="card-body">
 
                  You are logged in as 
                  <b>{{Auth()->user()->name}}</b>  <br> <br>
                  <a href="/" class="btn btn-outline-info">Go to Appointment Page</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
