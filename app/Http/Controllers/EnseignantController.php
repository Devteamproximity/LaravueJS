<?php

namespace App\Http\Controllers;

use App\Models\Enseignants;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEnseignant( Request $request)

    {

    
         //  Recuperons le code etab 

         $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

         // Recuperons les datas de la session en cour 
 
         $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();
 
         // Recuperons le libelle  de la session en cour 
         
         $sessionEncour = $sessiondata[0]['libelle_sess'];

        // dd( $codeEtab);

        $this->validate($request, [

            'nomAdmin' => 'required',
            'PrenomAdmin' => 'required',
            'telAdmin' => 'required',
            'sexe' => 'required',
            'emailAdmin' => 'required|email',
            'loginAdmin' => 'required',
            'passAdmin' => 'required',
            'CpassAdmin' => 'required',
        ]);

       
        // Enregistrer dans la table User

        $user = User::Create([

            'nom' => $request->nomAdmin,
            'prenom'=>$request->PrenomAdmin,
            'email'=>$request->emailAdmin,
            'login'=>$request->loginAdmin,
            'telephone'=>$request->telAdmin,
            'password'=>bcrypt( $request->passAdmin),
            'photo'=>$request->imageLogo,
            'type'=>'Enseignant'
         ]);

          
        // Enregistrer dans la table Enseignant

        $user = Enseignants::Create([

            'user_id' => $user->id,
            'nom' => $request->nomAdmin,
            'prenom'=>$request->PrenomAdmin,
            'tel'=>$request->telAdmin,
            'email'=>$request->emailAdmin,
            'sexe'=>$request->sexe,
            'matricule'=>$request->matricule,
            'situation'=>$request->situation,
            'salaire'=>$request->salaire,
            'dateEmbauche'=>$request->embauche,
            'type'=>$request->type

         ]);

        
    }

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
        //
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
