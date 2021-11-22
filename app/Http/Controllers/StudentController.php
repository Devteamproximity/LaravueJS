<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\User;
use App\Models\Parents;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

     public function getStudentByTeacherForAppel(Request $request)  {

       $datas = Student::with('user')->where('classe_id',$request->classeName)->orderBy('nom', 'asc')->get();

       return response()->json( $datas);

     }

     public function getEleveAndParentInfos(Request $request){

           // Recuperer l'id de la classe

           $idEleve = $request->id;



           // Recuperer le code de l'ecole

           $codeEtab  = $request->codeEtab;

           // Recuperer la session en cour

           $sessionEncour  = $request->session;

           // Recuperer les eleves d'une classes

            // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

            $EleveData = Student::with('parent','user','classe')->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('id', $idEleve)->orderBy('nom', 'asc')->get();

                return response()->json($EleveData[0]);

     }

     public function getEleveAndParentInfosTeacher(Request $request){

        // Recuperer l'id de la classe

        $idEleve = $request->id;



        // Recuperer le code de l'ecole

        $codeEtab  = $request->codeEtab;

        // Recuperer la session en cour

        $sessionEncour  = $request->session;

        // Recuperer les eleves d'une classes

         // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

         $EleveData = Student::with('parent','user','classe')->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('id', $idEleve)->orderBy('nom', 'asc')->get();

        return response()->json($EleveData[0]);


  }

    public function getEleveclasse(Request $request)
    {

        // Recuperer l'id de la classe

        $idclasse = $request->classeId['id'];

        // Recuperer le code de l'ecole

        $codeEtab  = $request->classeId['codeEtabClasse'];

        // Recuperer la session en cour

        $sessionEncour  = $request->classeId['sessionClasse'];

        // Recuperer les eleves d'une classes, on couple avec la table user pour pouvoir recuperer les photos

        // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

         $EleveData = Student::with('user')->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

        return response()->json($EleveData);

    }

    public function SearchParent(Request $request)

    {

        // dd($request->telSeach);

        $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

        // Recuperons les datas de la session en cour

        $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

        // Recuperons le libelle  de la session en cour

        $sessionEncour = $sessiondata[0]['libelle_sess'];

        // Recuperons le parent grace a son telephone

        $parent = Parents::where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('telParent', $request->telSeach)->get();

        return response()->json($parent);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inscripEleve(Request $request)

    {


        // Recuperer le code etablissement

        $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

        // Recuperons les datas de la session en cour

        $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

        // Recuperons le libelle  de la session en cour

        $sessionEncour = $sessiondata[0]['libelle_sess'];

        if ($request->imageLogo == '') {

            if($request->sexe='M'){

                $request->imageLogo = 'elevedefaultfille.png';

            }

            else {

                $request->imageLogo = 'elevedefaultgarcon.png';

            }

            $request->imageLogo = 'elevedefault.png';
        }


        $this->validate($request, [

            'nom' => 'required',
            'Prenom' => 'required',
            'matricule' => 'required',
            'sexe' => 'required',
            'classe' => 'required',
            'login' => 'required',
            'pass' => 'required',
            'dateNaiss' => 'required',
            'lieuNaiss' => 'required',
            'sexe' => 'required',

        ]);


        //  Inscrivez l'enfant dans la table eleve de la bd

        $dataUser =  User::Create([

            'nom' => $request->nom,
            'prenom' => $request->Prenom,
            'datenaiss' => $request->dateNaiss,
            'lieunaiss' => $request->lieuNaiss,
            'genre' => $request->sexe,
            'email' => $request->email,
            'login' => $request->login,
            'password' => $request->pass,
            'type' => 'Eleve',
            'photo' => $request->imageLogo

        ]);

        // id de l'eleve nouvelement inscrit dans user

        $idElev = $dataUser->id;

        // id de sa classe

        $idclasse = $request->classe;  // Car c'est l'id qui arrive dans la value cote  vuejs


        // Enregistrer dans la table students

        $dataStudents  =  Student::Create([
            'user_id' => $idElev,
            'parent_id' => $request->idParent,
            'classe_id' => $idclasse,
            'nom' => $request->nom,
            'prenom' => $request->Prenom,
            'dateNaiss' => $request->dateNaiss,
            'lieuNaiss' => $request->lieuNaiss,
            'sexe' => $request->sexe,
            'email' => $request->email,
            'classe' => $request->classe,
            'nationalite' => $request->natio,
            'codeEtab' => $codeEtab,
            'session' => $sessionEncour,
            'matricule' => $request->matricule,
            'doublant' => $request->redoubl

        ]);
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
