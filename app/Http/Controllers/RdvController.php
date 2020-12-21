<?php

namespace App\Http\Controllers;

use App\Models\Rdv;
use app\Repositories\Eloquent\EloquentRdv;
use app\Repositories\Interfaces\RdvInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;

class RdvController extends Controller
{
    //
    public function __construct(EloquentRdv $eloquentRdv)
    {
        $this->rdvRepository=$eloquentRdv;
    }
       /* private function validateRequest($request){
            $request->validate([
                'first_name'=>'required| max:60',
                'last_name'=>'required|max:60',
                'email'=>'required',
                'password'=>'required | max:20'
                /*'password'=>'nullable|max:255'*/

          /*  ]);
        }*/

        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $rdv=$this->rdvRepository->all();
            return response()->json($rdv);
        }


        public function getrdv($id){
            $rdv= $this->rdvRepository->getById($id);
            return response()->json($rdv);
        }

        public function save(Request $request)
        {
           // $validateData=$this->validateRequest($request);
            $rdv=new Rdv([
                'date'=>$request->get('date'),
                'time'=>$request->get('time'),


            ]);
            $this->rdvRepository->save($rdv);
            return response()->json($rdv);
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
            $validateData=$this->validateRequest($request);
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
