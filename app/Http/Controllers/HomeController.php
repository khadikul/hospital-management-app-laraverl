<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function homeRedirect(){
        if(Auth::id()){
            if(Auth::user()->usertype == 0){

                $doctors = doctor::all();
                return view('user.userhome', compact('doctors'));

            }else{

                $doctor = Doctor::all();
                $appointments = Appointment::all();

                //inProgressAppointment Count
                $inProgressAppointmentGet = Appointment::where('ustatus', 'in progress')->get();
                $inProgressAppointmentCount = $inProgressAppointmentGet->count();

                //AppointmentApproved Count
                $approvedAppointmentGet = Appointment::where('ustatus', 'Approved')->get();
                $approvedAppointmentCount = $approvedAppointmentGet->count();

                //CancelAppointment Count
                $cancelAppointmentGet = Appointment::where('ustatus', 'Cancel')->get();
                $cancelAppointmentCount = $cancelAppointmentGet->count();


                return view('admin.admin', compact('doctor', 'appointments', 'inProgressAppointmentCount', 'approvedAppointmentCount', 'cancelAppointmentCount'));
            }
        }else{
            return redirect()->back();
        }
    }

    function aboutUsPage(){
        return view('user.page.about');
    }

    function contactPage(){
        $doctors = doctor::all();
        return view('user.page.contact', compact('doctors'));
    }

    function doctorPage(){

        $allDoctors = Doctor::all();

        return view('user.page.doctorpage', compact('allDoctors'));
    }


    function home(){
        if(Auth::id()){
            return redirect('home');
        }else{
            $doctors = doctor::all();
            return view('user.userhome', compact('doctors'));
    
        }
    }

    function makeAppoinment(Request $request){
        $request->validate([
            'uname'   => 'required',
            'uemail'  => 'required|email',
            'doctor' => 'required',
            'date'    => 'required',
            'number'  => 'required',
            'message' => 'required',
        ]);

        $name = $request->post('uname');
        $email = $request->post('uemail');
        $date = $request->post('date');
        $doctor = $request->post('doctor');
        $number = $request->post('number');
        $message = $request->post('message');

        $appoinment = new Appointment();

        $appoinment->uname = $name;
        $appoinment->uemail = $email;
        $appoinment->udate = $date;
        $appoinment->udooctorName = $doctor;
        $appoinment->unumber = $number;
        $appoinment->umessage = $message;
        $appoinment->ustatus = 'in progress';
        $appoinment->user_id = Auth::user()->id;
        $appoinment->save();

        return redirect()->back()->with('appointmentMessage', 'Appointment Sucess');
    }

    function myAppointment(){
        if(Auth::id()){

            $userId = Auth::user()->id;
            $appoint = appointment::where('user_id', $userId)->get();

            return view('user.myAppointment', compact('appoint'));
        }

        return redirect()->back();
    }

    function cancelAppointment($id){
        $cancelRequest = Appointment::find($id);
        $cancelRequest->delete();

        return redirect()->back();
    }
}
