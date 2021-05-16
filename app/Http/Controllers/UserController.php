<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Eloquent\EloquentUser;
use App\Repositories\Interfaces\UserInterface;
use phpDocumentor\Reflection\Types\Nullable;

class UserController extends Controller
{
   // var $userRepository;
    public function __construct(EloquentUser $eloquentUser)
{
    $this->userRepository=$eloquentUser;
}

    private function validateRequest($request){
        $request->validate([
            'firstName'=>'required| max:60',
            'lastName'=>'required|max:60',
            'email' => 'required|string|email|max:100|unique:users',
            'password'=>'required | max:20',
            //'permission'=>'nullable',
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

    //

    public function getUser($id){
        $user= $this->userRepository->getById($id);
        return response()->json($user);
    }

    public function getRdv($id) //fetch rdv by user_id
    {
        $rdv=$this->userRepository->getById($id)->rdv;
       // $rdv= User::find($id)->rdv;
        return response()->json($rdv);
    }



    public function save(Request $request)
    {
        $validateData=$this->validateRequest($request);

        $user=new User([
            'firstName'=>$request->get('firstName'),
            'lastName'=>$request->get('lastName'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'permission'=>$request->get('permission') ,

        ]);
        $this->userRepository->save($user);
        return response()->json($user);
    }


  /*
    public function update(Request $request,$id)
    {
       // $validateData=$this->validateRequest($request);
        $user=new User([
            'firstName'=>$request->get('firstName'),
            'lastName'=>$request->get('lastName'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'permission'=>$request->get('permission') ,

        ]);
        $this->userRepository->update($id);
        return response()->json($this->userRepository->getById($id));
    }
    */

    public function updatee(Request $request){

        //validations...
        $validateData=$this->validateRequest($request);

        $voiture= new User([
            'id'     => $request->get('id'),
            'marque' => $request->get('marque'),
            'modele' => $request->get('modele'),
            'couleur'=> $request->get('couleur'),
            'photo'  => $request->get('photo')

        ]);

        $this->voitureRepository->update($voiture);


        return response()->json($this->voitureRepository->getById($request->get('id')));
    }



    public function update(Request $request)
    {
       $validateData=$this->validateRequest($request);
        $user=new User([
            'id'     => $request->get('id'),
            'firstName'=>$request->get('firstName'),
            'lastName'=>$request->get('lastName'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'permission'=>$request->get('permission') ,


        ]);
         $this->userRepository->update($user);
        //$this->userRepository->save($user);
        return response()->json($this->userRepository->getById($request->get('id')));
        //return response()->json($this->userRepository->getById($id));

          //$u = User::find($id);

        //$u->fill($request->all())->save();

        //return response()->json($this->userRepository->getById($id));

    }


    public function delete($id){
        if($this->userRepository->delete(($id))){
            return response()->json(["status"=>'suppression effectuée',200]);
        }
        return response()->json(["status"=>'Erreur suppression ',500]);
    }
}
