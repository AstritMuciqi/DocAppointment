@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid">
        </div>

        <div style="margin-top:40px" class="col-md-6"> 
            <h2>Create an account & Book you appointment</h2>
            <p>Mobile apps allow providers to effectively streamline communication between patients, providers, and their caregivers and allows for 24/7 management of a patient's condition along with the ability to personalize healthcare per patient.</p>
                @if(!(auth()->check()))
                <div class="mt-5">
                    <a href="{{url('/register')}}">
                    <button class="btn btn-success">Register as Patient
                    </button> 
                    </a>
                        <a href="{{url('login')}}"><button class="btn btn-secondary">Login</button>
                    </a>
                </div>
                @endif
        </div>
    </div>
    <hr>
    <!--Date picker component -->
    <find-doctor></find-doctor>
</div>
@endsection