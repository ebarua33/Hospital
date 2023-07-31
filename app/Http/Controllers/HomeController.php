<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }
    public function index(){
        if(Auth::id()){
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
            return view('user.home', compact('doctor'));
        }

    }

    public function appointment(Request $request){
        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->number;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->message = $request->message;
        $data->status = 'In Progress';
        if(Auth::user())
        {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back();

    }

    public function myappointment(){
        if(Auth::id()){
            $user_id = Auth::user()->id;
            $appoint = appointment::where('user_id', $user_id)->get();
            return view('user.myappointment', compact('appoint'));
        }
        else{
            return redirect()->back();
        }
    }
    public function cancelAppoint($id){
        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
