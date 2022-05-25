<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id_user', 'desc')->
        get();
        return response()->json($user);        }

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
        $users = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
            'matricul' => $request->matricul,
            'nature' => $request->nature,
            'zone' => $request->zone,

            'id_departement' => $request->departement,
            'role' => "user",
            ]);
        if($users){
            return response()->json(["status" => 200]);
        }    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id_user','=',$id);

        join('departements','.users.id_departement','=','departements.id_departement')->get();
        return response()->json($user);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $user = User::where('id_user','=',$id)->firstOrFail();
       
        $user->role = $request->role;
        $user->level = $request->level;

        $user->save();
        return response()->json($request);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id_user','=',$id);

        $user->delete();
        return response()->json($user);    }


        private $status_code    =        200;


        // ------------ [ User Login ] -------------------
        public function userLogin(Request $request) {
  
          $validator          =       Validator::make($request->all(),
              [
                  "email"             =>          "required",
                  "password"          =>          "required"
              ]
          );
  
          if($validator->fails()) {
              return response()->json(["status" => "failed", "validation_error" => $validator->errors()]);
          }
  
  
          // check if entered email exists in db
          $email_status       =       User::where("email", $request->email)->first();
  
  
          // if email exists then we will check password for the same email
  
          if(!is_null($email_status)) {
              $password_status    =   User::where("email", $request->email)->where("password", $request->password)->first();
  
              // if password is correct
              if(!is_null($password_status)) {
                  $user           =       $this->userDetail($request->email);
  
                  return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user]);
              }
  
              else {
                  return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
              }
          }
  
          else {
              return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
          }
      }
      public function userDetail($email) {
          $user  = array();
          if($email != "") {
              $user = User::where("email", $email)->join('departements','.users.id_departement','=','departements.id_departement')->get();
           
              return $user;
          }
      }
  
  }
  

