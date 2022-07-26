@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              @if(Session::has('message'))
              <div class="alert alert-success">
                {{Session::get('message')}}
              </div>
              @endif

              <div class="card-header" >
                     Appointment ({{$bookings->count()}})
                 </div>
 
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>

                          <th scope="col">Time</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Status</th>
                          <th scope="col">Prescription</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>
                             {{$booking->user_id}}                             
                          </td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->doctor->name}}</td>
                          <td>
                            @if($booking->status==1)
                            checked
                            @endif


                          {{}}

                          </td>
                          <td> 

                       <!-- Button trigger modal -->
                       @if(!App\Prescription::where('date',date('Y-m-d'))->where(
                        'doctor_id',auth()->user()->id)->where('user_id',$booking
                        ->user->id)->exists())
                       <button type="button" class="btn btn-primary" data-toggle="modal" 
                       data-target="#exampleModal{{$booking->user_id}}">
                        Write Prescription
                        </button>
                         @include('prescription.form') 
                              
                          @else
                          <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn
                          btn-secondary">View prescription</a>
                          @endif

                          </td>
                          </tr>
                          @empty
                          <td>There is no any appointments !</td>
                          @endforelse



                      </tbody>
                    </table>
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
