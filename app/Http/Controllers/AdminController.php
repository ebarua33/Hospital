<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
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


}
