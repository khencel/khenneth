<?php

namespace App\Http\Controllers\API\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use App\UserRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::with('roles')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = request()->validate([
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
        ]);
        
        if(request()->role == []){
            return "invalid";
        }

        $userCreated = User::create(
            [
                'email_verified_at' => date("Y-m-d"),
                'api_token' => Str::random(60),
                'is_subscriber' => 1,
            ]+$user);

        $userCreated->roles()->sync(request()->role);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('roles')->find($id);
        $role = Role::all();
        return response()->json([
            'user' => $user,
            'role' => $role
        ]);

        return $user;
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
        $userRole = User::find($id);
       
        $user = request()->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
        ]);

        User::find($id)->update($user);
        $userRole->roles()->sync(request()->role);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        DB::table('role_user')->where('user_id',$id)->delete();
    }

    public function role(){
        return Role::all();
    }

    public function userType(){
        $type = 0;
        if(request()->type == "admin"){
            $type = 1;
        }
        if(request()->type == "user"){
            $type = 3;
        }
        if(request()->type == "consultant"){
            $type = 2;
        }
        return UserRole::with('user.roles')->where('role_id',$type)->get();
    }
}
