<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use App\Models\Session;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class ParentController extends Controller
{
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

     public function getInfosParent(Request $request){

          // RECUPERONS LES INFOS DE LA TABLE ENSEIGNANT

          $Ecole = Parents::where('user_id',$request->id)->first();

          // id du parent  dans la table enseignant parent

          $idParent = $Ecole->id;

          // Prenons le codeEtab

          $codeEtab = $Ecole->codeEtab;

          //  Prenons  la session

          $sessionEncour = $Ecole->session;

          $Datas = Student::with('parent','Classe','user')->where('parent_id', $idParent)
                                          ->where('codeEtab', $codeEtab)
                                          ->where('session',$sessionEncour)->orderBy('id', 'desc')->get();

          return  response()->json($Datas);

       }



     public function getAllStudentofeParentByLocal(Request $request) {

        // Recuperrons l'id du parent

        $parentId = $request->id;

        $studentsParent = Student::with('classe','user')->where('parent_id', $parentId)
                                                 ->where('session',$request->session)
                                                 ->where('codeEtab',$request->codeEtab)->orderBy('id', 'desc')->get();

        return  response()->json($studentsParent);

    }
    public function addParent( Request $request)
    {


        //dd($request->cni);

        if($request->imageLogo==''){

            $request->imageLogo = 'parentdefault.png';
        }

        // if($request->cni||$request->address||$request->natio==''){

        //     $request->cni =  $request->address = $request->natio= 'RAS';

        // }
         //  Recuperons le code etab

         $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

         // Recuperons les datas de la session en cour

         $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

         // Recuperons le libelle  de la session en cour

         $sessionEncour = $sessiondata[0]['libelle_sess'];


        $this->validate($request, [

            'nomAdmin' => 'required',
            'PrenomAdmin' => 'required',
            'telAdmin' => 'required',
            'sexe' => 'required',
            'emailAdmin' => 'required|email',
            'loginAdmin' => 'required',
            'passAdmin' => 'required',
            'CpassAdmin' => 'required',
            'profession'=>'required',

        ]);

        // Enregistrer dans la table user

        $user = User::Create([
            'nom' => $request->nomAdmin,
            'prenom'=>$request->PrenomAdmin,
            'email'=>$request->emailAdmin,
            'login'=>$request->loginAdmin,
            'telephone'=>$request->telAdmin,
            'password'=>bcrypt( $request->passAdmin),
            'photo'=>$request->imageLogo,
            'type'=>'Parent'
         ]);

        // Enregistrer dans la table parent

         $parent  = Parents::Create([

            'nomParent' => $request->nomAdmin,
            'prenomParent'=>$request->PrenomAdmin,
            'emailParent'=>$request->emailAdmin,
            'telParent'=>$request->telAdmin,
            'user_id'=>$user->id,
            'cniParent'=>$request->cni,
            'nationaliteParent'=>$request->natio,
            'professionParent'=>$request->profession,
            'sexeParent'=>$request->sexe,
            'addressParent'=>$request->address,
            'codeEtab'=>$codeEtab,
            'session'=>$sessionEncour,

        ]);








        // dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getParent (Request $request)
    {

        // dd($request);

        //  Recuperons le code etab

        $codeEtab = $request[0]['codeEtab'];

        // dd($request[0]['codeEtab']);

        // Recuperons les datas de la session en cour

           $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->first();

        // Recuperons le libelle  de la session en cour

           $sessionEncour = $sessiondata['libelle_sess'];

        // Recuperons les parents de cette ecole et et de la session en cour

          $parents = Parents::where('codeEtab', $codeEtab)->where('session',$sessionEncour)->orderBy('id', 'desc')->get();

           // $parents  = Parents::all();

           return response()->json($parents) ;


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
