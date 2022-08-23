<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function adminDoctorAdd(){
        
        return view('admin.addDoctor');
    }

    function doctorData(Request $request){
        $request->validate([
            'dname'       => 'required',
            'dnumber'     => 'required',
            'dspeciality' => 'required',
            'dimage'      => 'required|mimes:png,jpg,jpeg,webp,gif,svg'
        ]);

        $name = $request->post('dname');
        $phone = $request->post('dnumber');
        $speciality = $request->post('dspeciality');

        $image = $request->dimage;
        $imageName = time().'.'.$image->getClientoriginalExtension();
        $request->file('dimage')->move('upload', $imageName);

        $doctorDataSave = new Doctor();

        $doctorDataSave->DoctorName = $name;
        $doctorDataSave->DoctorPhone = $phone;
        $doctorDataSave->DoctorSpeciality = $speciality;
        $doctorDataSave->DoctorImage	 = $imageName;

       $doctorDataSave->save();

       return redirect()->back()->with('message', 'Doctor Added Successfully');

    }

    function deleteDoctor($id){
        $deleteRequest = Doctor::find($id);

        $deleteRequest->delete();

        return redirect()->back();
    }

    function adminAppointmentHandle(){
        $appointmentList = Appointment::all();

        return view('admin.adminAppointment', compact('appointmentList'));
    }

    function adminApproveAppointment($id){
        $appointmentApprove = Appointment::find($id);
        $appointmentApprove->ustatus = 'Approved';
        $appointmentApprove->save();

        return redirect()->back();
    }

    function adminCancelAppointment($id){
        $appointmentCancel = Appointment::find($id);
        $appointmentCancel->ustatus = 'Cancel';
        $appointmentCancel->save();

        return redirect()->back();
    }
}
