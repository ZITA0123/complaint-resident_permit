<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use App\Models\User;
use App\Repositories\Eloquent\EloquentRdv;
use App\Repositories\Interfaces\RdvInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;
use Symfony\Contracts\Service\Attribute\Required;

class RdvController extends Controller
{
    //
    public function __construct(EloquentRdv $eloquentRdv)
    {
        $this->rdvRepository=$eloquentRdv;
    }
        private function validateRequest($request){
            $request->validate([
                //'user_id'=>'required',
                'date'=>'required| max:60',
                'time'=>'required|max:60',


           ]);
        }

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $rdv=$this->rdvRepository->all();
           // $rdv= $this->rdvRepository->getRdvUser();
            return response()->json($rdv);
        }
        public function getAllDates()
        {
            $rdv=$this->rdvRepository->allDates();

            return response()->json($rdv);
        }
        public function getAllTimes($date)
        {
            $rdv=$this->rdvRepository->allTimes($date);

            return response()->json($rdv);
        }


        public function getRdv($id){
            $rdv= $this->rdvRepository->getById($id);
            return response()->json($rdv);
        }
        public function getByUserId(int $user_id){

            $rdv= $this->rdvRepository->getByUserId($user_id);
            return response()->json($rdv);
        }
        //all rdv with user
       /* public function  getRdvUsers(){
            $rdv= $this->rdvRepository->getRdvUsers();
            return response()->json($rdv);
        }*/
        public function getuser($id)
        {
            $user=Rdv::find($id)->user;
            return response()->json($user);
        }

        public function save(Request $request)
        {
           $validateData=$this->validateRequest($request);
          // $request->user()->id or Auth::user()->id or $request["user"]["id"]
            $user=Auth::user();
            $user_id=Auth::user()->id;
            //if($user->getRdvCount){
                if($this->rdvRepository->getRdvCount($user_id)>0) {
               return response()->json(['message'=>'User has rdv Already','data'=>null],400);
           }
           $rdv=new Rdv([
            'date'=>$request->get('date'),
            'time'=>$request->get('time'),
            //'user_id'=>$request->get('user_id'),
            'user_id'=>$user_id,


             ]);

            //if($user->rdv->save($rdv)){
                if($this->rdvRepository->save($rdv)){
                 return response()->json($rdv);
             }
               return response()->json(['message'=>'Failed','data'=>null],400);


           // $this->rdvRepository->save($rdv);

        }
    /*
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rdv  $rdv
     * @return \Illuminate\Http\Response
     */

        public function update(Request $request, Rdv $rdv)
        {
            //$validateData=$this->validateRequest($request);
            $rdv=new Rdv([
                'id'=> $request->get('id'),
                'date'=>$request->get('date'),
                'time'=>$request->get('time'),
                //'user_id'=>$request->get('user_id'),
                'user_id'=>$request->get('user_id'),


            ]);
            $this->rdvRepository->update($rdv);
            return response()->json($this->rdvRepository->getById($request->get('id')));
        }


        public function delete($id){
            if($this->rdvRepository->delete(($id))){
                return response()->json(["status"=>'suppression effectuée',200]);
            }
            return response()->json(["status"=>'Erreur suppression ',500]);
        }
}
