<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\EloquentUser;
use App\Repositories\Interfaces\UserInterface;

class UserController extends Controller
{
   // var $userRepository;
    public function __construct(EloquentUser $eloquentUser)
{
    $this->userRepository=$eloquentUser;
}
    private function validateRequest($request){
        $request->validate([
            'first_name'=>'required| max:60',
            'last_name'=>'required|max:60',
            'email'=>'required',
            'password'=>'required | max:20'
            /*'password'=>'nullable|max:255'*/

        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=$this->userRepository->all();
        return response()->json($user);
    }


    public function getUser($id){
        $user= $this->userRepository->getById($id);
        return response()->json($user);
    }

    public function save(Request $request)
    {
        $validateData=$this->validateRequest($request);
        $user=new User([
            'first_name'=>$request->get('first_name'),
            'last_name'=>$request->get('last_name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),

        ]);
        $this->userRepository->save($user);
        return response()->json($user);
    }
/*
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Models\User  $user
 * @return \Illuminate\Http\Response
 */

    public function update(Request $request, User $user)
    {
        $validateData=$this->validateRequest($request);
        $this->userRepository->update($user);
        return response()->json($this->userRepository->getById($request->get('id')));
    }


    public function delete($id){
        if($this->userRepository->delete(($id))){
            return response()->json(["status"=>'suppression effectuée',200]);
        }
        return response()->json(["status"=>'Erreur suppression ',500]);
    }
}
