<?php
namespace app\Repositories\Eloquent;

use App\Models\Rdv;
use App\Repositories\Interfaces\RdvInterface;
use Illuminate\Support\Facades\DB;
class EloquentRdv implements RdvInterface{



    public function RdvByDateTime(string $date, string $time){
       return Rdv::where('date', $date)
                ->where('time',$time)
               //->take(10)
               ->get();

    }
    public function nbRdvbyDate($date){
       return Rdv::where('date', $date)->count();
    }
    public function getRdvCount($id)
    {
       // return $this->rdv()->where('approved', 1)->count();
       return Rdv::where('user_id', $id)->count();
    }
    public function all(){
        $rdv= DB::table('rdvs')
        ->join('users', 'users.id', '=', 'rdvs.user_id')
        ->select( 'rdvs.*', 'users.firstName','users.lastName','users.email')
        ->get();
        return $rdv;
       // return Rdv::all();
    }
    public function allDates(){
        //return Rdv::all('date');
        return Rdv::distinct()->get(['date']);
    }
    public function allTimes($date){
        return Rdv::where('date',$date)->get('time');
       // return Rdv::all('time');
    }

    public function getById(int $id){
        return Rdv::where('id',$id)->first();
    }
    public function getByUserId(int $user_id){
        return Rdv::where('user_id',$user_id)->first();
    }
    public function save(Rdv $Rdv){
        return $Rdv->save();
    }
    public function update(Rdv $rdv){
        return Rdv::find($rdv->get('id'))->first()
        ->update([
            'date'=>$rdv->get('date'),
            'time'=>$rdv->get('time'),
            'user_id'=>$rdv->get('user_id'),

        ]);
    }
    public function delete(int $id){
        return Rdv::where('id',$id)->delete();
    }



}
