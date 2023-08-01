<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Reservedroom;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor = new Doctor();
        $image = $request->file;
        $imageName = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imageName);
        $doctor->image = $imageName;
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');

    }

    public function roomReserve(){
        $data = new Room();
        return view('admin.room', compact('data'));
    }

    public function generalac(){
        $data = Room::where('capacity', 'ac')->where('category', 'general')->get();
        return view('admin.generalac', compact('data'));
    }

    public function generalnonac()
    {
        $data1 = Room::where('capacity', 'nonac')->where('category', 'general')->get();
        return view('admin.generalnonac', compact('data1'));
    }
    public function privateac()
    {
        $data2 = Room::where('capacity', 'ac')->where('category', 'private')->get();
        return view('admin.privateac', compact('data2'));
    }
    public function privatenonac()
    {
        $data3 = Room::where('capacity', 'nonac')->where('category', 'private')->get();
        return view('admin.privatenonac', compact('data3'));
    }
    public function vip()
    {
        $data4 = Room::where('category', 'vip')->get();
        return view('admin.vip', compact('data4'));
    }
    public function showappointment(){
        $appointmentdata = Appointment::all();
        return view('admin.showappointment', compact('appointmentdata'));
    }

    public function approved($id){
        $approved = Appointment::find($id);
        $approved->status = 'Approved';
        $approved->save();
        return redirect()->back();
    }

    public function canceled($id)
    {
        $canceled = Appointment::find($id);
        $canceled->status = 'Canceled';
        $canceled->save();
        return redirect()->back();
    }

    public function showdoctor(){
        $doctor = Doctor::all();
        return view('admin.showdoctor', compact('doctor'));
    }

    public function deletedoctor($id){
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function reserve($id){
        $data = Room::find($id);
        return view('admin.gacreservationform', compact('data'));
    }

    public function uploadreservation(Request $request)
    {
        $data = new Reservedroom();
        $data->patient_name = $request->name;
        $data->age = $request->age;
        $data->bgroup = $request->bgroup;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $roomnumber = $request->room;
        $data1 = Room::where('room_number', $roomnumber)->first();
        $data1->decrement('availability');
        $data1->save();
        $data->room_number = $roomnumber;
        $data->date = $request->date;
        $data->save();

        return redirect()->back()->with('message', 'Room Reserved Successfully');
    }

    public function patientlist(){
        $patientdata = Reservedroom::all();
        return view('admin.patientlist', compact('patientdata'));
    }


    public function updatedoctor($id){
        $updatedata = Doctor::find($id);
        return view('admin.updatedoctor',compact('updatedata'));
    }

    public function newupdatedoctor(Request $request, $id)
    {
        $data = Doctor::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room = $request->room;
        $image = $request->file;
        if($image){
            $imageName = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('doctorimage', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        $doctor = Doctor::all();

        return view('admin.showdoctor', compact('doctor'));
    }





}
