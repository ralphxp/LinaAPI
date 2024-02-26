<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class AuthController extends Controller
{
    use HttpResponses;

    public function login()
    {
        return "login controller";
    }

    public function register(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'phone' => 'unique:users|max:16|required',
            'password' => 'required',
            'email'     => 'string|email',
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'dob'       => 'required',
            'gender'    => 'required',
            'avatar'    => "image"
        ]);

        if($validation->fails())
        {
            $responseArr = array();
            $responseArr['message'] = $validation->errors();;
            $responseArr['token'] = '';
            return response()->json($responseArr, 400);
        }
        

        $user = User::create([
            'phone' => $request->phone,
            'password_salt' => $request->password,
            'password' => bcrypt($request->password)
        ]);

        if($user){
            $user->info()->create([
                'firstname' => $request->firstname,
                'lastname'  => $request->lastname,
                'dob'       => $request->dob,
                'gender'    => $request->gender,
                'interestedIn'  => $request->interestedin | "both",
                'lookingFor'  => $request->lookingfor | "a date"
            ]);
            $user->address()->create(['street'=>$request->street]);
            $user->interests()->create(['interestId'=> 2]);
        }

        return response()->json(
            $user
        );
    }
}
