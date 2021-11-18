<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Session;
use App\Models\Student;
use App\Models\Matieres;
use App\Models\Enseignants;
use Illuminate\Http\Request;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function getEleveclasseByTeacher(Request $request){

          // Recuperer l'id de la classe

          $idclasse = $request->classe_id;

          // Recuperer le code de l'ecole

          $codeEtab  = $request->codeEtab;

          // Recuperer la session en cour

          $sessionEncour  = $request->session;

          // Recuperer les eleves d'une classes

           // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

           $EleveData = Student::where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

          return response()->json($EleveData);
     }


     public function getInfosTeacher(Request $request) {

        $this->validate($request,[
            'id'=>'required'
        ]);

        // RECUPERONS LES INFOS DE LA TABLE ENSEIGNANT

        $Ecole = Enseignants::where('user_id',$request->id)->first();

        // id du prof dan la table enseignant

        $idProf = $Ecole->id;


        // Prenons le codeEtab

        $codeEtab = $Ecole->codeEtab;

        //  Prenons  la session

        $sessionEncour = $Ecole->session;

        $Datas = Matieres::with('Classe')->where('enseignants_id', $idProf)
                                        ->where('codeEtab', $codeEtab)
                                        ->where('session',$sessionEncour)->orderBy('id', 'desc')->get();

        return  response()->json($Datas);

     }
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

        if ($request->imageLogo == '') {

            $request->imageLogo = 'elevedefault.png';
        }


         if($request->type==''){

           $request->type=1; // titulaire enseigant par default

         }

        $user = User::Create([

            'nom' => $request->nomAdmin,
            'prenom'=>$request->PrenomAdmin,
            'email'=>$request->emailAdmin,
            'login'=>$request->loginAdmin,
            'telephone'=>$request->telAdmin,
            'password'=>bcrypt( $request->passAdmin),
            'photo'=>$request->imageLogo,
            'type'=>'Enseignant',

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
            'type'=>$request->type,
            'codeEtab'=>$codeEtab,
            'session'=>$sessionEncour,
            'nationalite'=>$request->natio

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
    public function getAllEnseignant(Request $request)

    {

         //  Recuperons le code etab

        $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

        // Recuperons les datas de la session en cour

        $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

        // Recuperons le libelle  de la session en cour

        $sessionEncour = $sessiondata[0]['libelle_sess'];

        // Recuperons tous les enseignants

        $Datas = Enseignants ::where('session',$sessionEncour)->where('codeEtab',$codeEtab)->get();

        return  response()->json($Datas);

    }


    public function  getAllEnseignantAffectMatieres(Request $request){

         //  Recuperons le code etab

         $codeEtab = $request['codeEtabClasse'];

         // Recuperons les datas de la session en cour

         $sessionEncour = $request['sessionClasse'];

         // Recuperons tous les enseignants de cette classe avec leurs matieres

           $Datas = Matieres::with('Enseignants')->where('classe_id',$request->id)->where('codeEtab',$codeEtab)->where('session',$sessionEncour )->get();


         return  response()->json($Datas);

    }

    public function getAllEnseignantAffect(Request $request)

    {

         //  Recuperons le code etab

        $codeEtab = $request['codeEtabClasse'];

        // Recuperons les datas de la session en cour

        $sessionEncour = $request['sessionClasse'];

        // Recuperons tous les enseignants

         // $Datas = Matieres::with('Enseignants')->where('id', $request->id)->get();

          $Datas = Enseignants::where('session',$sessionEncour)->where('codeEtab',$codeEtab)->get();


        return  response()->json($Datas);

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
