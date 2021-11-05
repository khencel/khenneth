<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\PasswordValidation;
use App\UserRole;
use App\Schedule;
use App\Attribute;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::find(\Auth::user()->id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $user = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'email' => 'required',
        ]);
        User::find($id)->update($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Schedule::find($id)->delete();
    }

    public function changePassword(){
        request()->validate([
            'password' => ['required',new PasswordValidation],
            'newPassword' => 'required|string|min:8|confirmed'
        ]);

        User::find(\Auth::user()->id)->update([
            'password' => Hash::make(request()->newPassword)
        ]);
    }

    public function consultant(){
        return userRole::with('user')->where('role_id',2)->get();
    }

    public function check(){
        $date = date_create(request()->date);
        $myDate = date_format($date,"F-d-Y");

        $book = request()->validate([
            'mode' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);


        $schedule = Schedule::where('consultant_id',request()->id)
                        ->where('date',$myDate)
                        ->where('time',request()->time)->first();
        if($schedule){
            return 0;
        }
        return 1;
    }

    public function bookNow(){
        
        $date = date_create(request()->date);
        $myDate = date_format($date,"F-d-Y");

        $book = request()->validate([
            'mode' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        Schedule::create([
            'user_id' => \Auth::user()->id,
            'consultant_id' => request()->id, 
            'mode' => request()->mode,
            'date' => $myDate,
            'time' => request()->time,
            'status' => "booked"
        ]);
    }

    public function schedule(){
        if(\Gate::denies('manage-users')){
            return Schedule::with('consultant')->where('user_id',\Auth::user()->id)->get();
        };   
        return Schedule::with('appointmentUser')->where('consultant_id',\Auth::user()->id)->get();
    }

    public function attribute(){
        return Attribute::all();
    }

    public function payment(){
       $user = \Auth::user();
       $user->update(['is_subscriber'=>NOW()]);
    }

    public function cancelBooking(){
        return Schedule::find(request()->schedule_id)->update([
            'status' => 'canceled'
        ]);
    }

    public function userChangeStatus($id){
        $user = User::find($id);
        $user->update([
            'is_subscriber' => $user->is_subscriber?null:now()
        ]);
    }
}
