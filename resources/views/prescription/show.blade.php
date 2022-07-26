@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
             

              <div class="card-header" >
              <p>Date:{{$prescription->date}}</p>
                    <p>Patient:{{$prescription->user->name}}</p>
                    <p>Doctor:{{$prescription->doctor->name}}</p>
                    <p>Disease:{{$prescription->name_of_disease}}</p>
                    <p>Symptoms:{{$prescription->symptoms}}</p>
                    <p>Medicine:{{$prescription->medicine}}</p>
                    <p>Proedure to use medicine:{{$prescription->procedure_to_use_medicine}}</p>
                    <p>Feedback:{{$prescription->feedback}}</p>
                    <p>Doctor signature:{{$prescription->signature}}</p>
                </div>
 
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($bookings)>0)
<!-- Modal -->
<div class="modal fade" id="exampleModal {{$booking->date}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="{{route('prescription')}}" method="post">@csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prescription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="app">
      
      <input type="hidden" name="user_id" value="{{$booking->user_id}}">
      <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
      <input type="hidden" name="date" value="{{$booking->date}}">


       <div class="form-group">
         <label>Disease</label>
        <input type="text" name="name_of_disease" class="form-control" required="">
       </div>

       <div class="form-group">
         <label>Symptoms</label>
        <input type="text" name="symptoms" class="form-control" required="">
        <textarea name="symptoms" class="form-control"  placeholder="symptoms" required=""> </textarea>
       </div>

       <div class="form-group">
        <label>Medicine</label>
        <add-btn></add-btn>
       </div>

       <div class="form-group">
         <label>Procedure to use medicine</label>
        <textarea name="procedure_to_use_medicine" class="form-control"  placeholder="symptoms" required=""> </textarea>
    </div>

       <div class="form-group">
         <label>Feedback</label>
        <textarea name="feedback" class="form-control"  placeholder="symptoms" required=""> </textarea>
       </div>

       <div class="form-group">
         <label>Signature</label>
        <input type="text" name="signature" class="form-control" required="">
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
</form>
  </div>
</div>
@endif
@endsection
