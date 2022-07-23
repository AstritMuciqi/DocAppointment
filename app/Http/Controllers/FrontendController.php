<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
class FrontendController extends Controller
{
    
    public function index()
    {
      date_default_timezone_set('Australia/Melbourne');
      if(request('date')){
       $doctors =$this->findDoctorsBasedOnDate(request('date'));
       return view('Welcome',compact('doctors'));

      }
    //   dd(date('Y-m-d'));
      $doctors =Appointment::Where('date',date('Y-m-d'))->get();
    //   return $doctors;
      return view('Welcome',compact('doctors'));
    
    }

public function show($doctorId, $date)
{
    
    $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
    $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
    $user = User::where('id',$doctorId)->first();
    $doctor_id = $doctorId; 

    return view('appointment',compact('times','date','user'));
}

public function findDoctorsBasedOnDate($date)
{

$doctors =Appointment::Where('date',$date)->get();
return $doctors;
}




}