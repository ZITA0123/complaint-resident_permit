<?php
namespace app\Repositories\Eloquent;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

class EloquentUser implements UserInterface{

    //$plaintess = User::find(1)->plainte s;
    //$rdv = User::find(1)->rdv;
    public function all(){
        return User::all();
    }
    public function getById(int $id){
        return User::where('id',$id)->first();
    }

    public function save(User $user){
        return $user->save();
    }


   /* public function update(int $id){

        $user= User::where('id',$id)->first();
        return $user
        ->update([
            'firstName'=>$user->get('firstName'),
            'lastName'=>$user->get('lastName'),
            'email'=>$user->get('email'),
            'password'=>$user->get('password'),
            'permission'=>$user->get('permission') ,

            //'email_verified_at'=>null
        ]);
        /*return $user->save();
             $user= User::where('id',$id)->first();
            $user->firstName=$user->get('firstName');
            $user->lastName=$user->get('lastName');
            $user->email=$user->get('email');
            $user->password=$user->get('password');
            $user->permission=$user->get('permission') ;*/


    //}




    public function update(User $user){

       // find:retrieve a model by it primary key

        return User::find($user->get('id'))->first()
        ->update([
            'firstName'=>$user->get('firstName'),
            'lastName'=>$user->get('lastName'),
            'email'=>$user->get('email'),
            'password'=>$user->get('password'),
            'permission'=>$user->get('permission') ,

            //'email_verified_at'=>null
        ]);
    }

    public function delete(int $id){
        return User::where('id',$id)->delete();
    }



}
