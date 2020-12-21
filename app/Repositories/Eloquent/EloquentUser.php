<?php
namespace app\Repositories\Eloquent;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

class EloquentUser implements UserInterface{

    //$plaintess = User::find(1)->plaintes;
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
    public function update(User $user){
        return User::find($user->get('id'))
        ->update([
            'first_name'=>$user->get('first_name'),
            'last_name'=>$user->get('last_name'),
            'email'=>$user->get('email'),
            'password'=>$user->get('password')
        ]);
    }
    public function delete(int $id){
        return User::where('id',$id)->delete();
    }



}
