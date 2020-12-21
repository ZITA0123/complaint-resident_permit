<?php
namespace app\Repositories\Eloquent;
use App\Models\Rdv;
use App\Repositories\Interfaces\RdvInterface;

class EloquentRdv implements RdvInterface{

    //$rdv = User::find(1)->rdv;

    public function RdvByDateTime(string $date, string $time){
       return Rdv::where('date', $date)
                ->where('time',$time)
               //->take(10)
               ->get();

    }
    public function nbRdvbyDate($date){
       return Rdv::where('date', $date)->count();
    }

    public function all(){
        return Rdv::all();
    }
    public function getById(int $id){
        return Rdv::where('id',$id)->first();
    }

    public function save(Rdv $Rdv){
        return $Rdv->save();
    }
    public function update(Rdv $rdv){
        return Rdv::find($rdv->get('id'))
        ->update([
            'first_name'=>$rdv->get('first_name'),
            'last_name'=>$rdv->get('last_name'),
            'email'=>$rdv->get('email'),
            'password'=>$rdv->get('password')
        ]);
    }
    public function delete(int $id){
        return Rdv::where('id',$id)->delete();
    }



}
