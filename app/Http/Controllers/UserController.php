<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with(['info', 'address', 'interests'])->withCount(['likes', 'hearts', 'dislikes'])->get();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            'phone' => 'unique:users|max:16|required',
            'password' => 'required',
            'email'     => 'string|email',
            'firstname' => 'required|max:25',
            'lastname' => 'required|max:25',
            'dob'       => 'required',
            'gender'    => 'required',
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
