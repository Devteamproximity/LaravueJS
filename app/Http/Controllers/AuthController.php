<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    function index( Request $request){


        return $request->path;


    }


    function login(Request $request)
    {

        $this->validate($request, [ 

            'login' => 'required',
            'password' => 'required',

        ]);

       // dd($request);


        if(Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json([
                'msg'=>'Connexion reuissi',
                'userDatas'=>$user
                
            ]);
        }

        else {
            $user = Auth::user();
            return response()->json([
                'msg'=>'Login ou mot de passe incorrect',
            ],401);
        }


        // $login_status = User::where('login', $req->login)->first();
        // if (!is_null($login_status)) {
        //     $password_status = User::where('login', $req->login)->where('password', $req->password);

        //     if (!is_null($password_status)) {
        //         $user = $this->userDetail($req->login);

        //         return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user, "typeaccount" => $user->type]);
        //     } else {
        //         return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
        //     }
        // } else {
        //     return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
        // }


    }
    public function userDetail($login)
    {
        $user = array();
        if ($login != "") {
            $user = User::where("login", $login)->first();
            return $user;
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['msg' => 'Logout Successfull']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
