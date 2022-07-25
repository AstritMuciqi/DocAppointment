@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid">
        </div>

        <div class="col-md-6"> 
            <h2>Create an account & Book you appointment</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudant
                ium at delectus quia corporis blanditiis, aperiam distinctio et velit maxime cumque animi molestiae atque 
                unde deserunt ratione cum similique aut exercitationem.</p>
                <div class="mt-5">
                    <a href="{{url('/register')}}">
                    <button class="btn btn-success">Register as Patient
                    </button> 
                    </a>
                        <a href="{{url('login')}}"><button class="btn btn-secondary">Login</button>
                    </a>
                </div>
        </div>
    </div>
    <hr>
    <!--Date picker component -->
    <find-doctor></find-doctor>
</div>
@endsection