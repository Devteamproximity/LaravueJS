<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Classe;
use App\Models\Session;
use App\Models\Student;
use App\Models\Enseignants;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function getAllTimetableTeacher(Request $request) {

        // Recuperons l'id de cet enseigant dans la table enseignant car les donnes qui arrivent viennent de user

            $dataProf = Enseignants::where('user_id',$request->id)->first();

            $data = Enseignants::with('classe')->where('id',$dataProf->id)->get();

            return response()->json($data[0]['classe']);

     }
     public function getAllTimetable(){

        $data = Classe::All();

         return response()->json($data);
     }



     public function getAllasseByATeacher(Request $request) {

        // RECUPERONS LES INFOS DE LA TABLE ENSEIGNANT

        $Enseignants = Enseignants::with('classe')->where('user_id',$request->id)->first();

        // id du prof dans  la table enseignant

        $idProf = $Enseignants->id;


        // Prenons le codeEtab

        $codeEtab = $Enseignants->codeEtab;

        //  Prenons  la session

        $sessionEncour = $Enseignants->session;

        // Recuperons les classes de cet enseigants

        $Datas =   Classe::with('eleves')->where('codeEtabClasse', $codeEtab)->where('sessionClasse',$sessionEncour )->orderBy('id', 'desc')->get();

        return response()->json($Datas);



   }


    public function getAcllasseTeacher (Request $request) {

         // RECUPERONS LES INFOS DE LA TABLE ENSEIGNANT

         $Enseignants = Enseignants::with('classe')->where('user_id',$request->id)->first();

         // id du prof dan la table enseignant

         $idProf = $Enseignants->id;


         // Prenons le codeEtab

         $codeEtab = $Enseignants->codeEtab;

         //  Prenons  la session

         $sessionEncour = $Enseignants->session;

         // Recuperons les classes de cet enseigants

         $Datas =   Enseignants::with('Classe')->where('id', $idProf)->where('codeEtab', $codeEtab)->where('session',$sessionEncour )->orderBy('id', 'desc')->get();

         return response()->json($Datas[0]['classe']);



    }

    public function getClasseEtablissement (Request $request)  {

        $codeEtab = $request[0]['codeEtab'];

        // Recuperer les informations sur la session en cour

        $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

        $sessionEncour = $sessiondata[0]['libelle_sess'];


        // Recuperer tous les classes et les eleves de chaque de classe de cette ecole pour cette session en cour


        //$ClasseData = Classe::where('codeEtabClasse', $codeEtab)->where('sessionClasse', $sessionEncour)->orderBy('id', 'desc')->get();

        $ClasseData = Classe::with('eleves')->where('codeEtabClasse', $codeEtab)->where('sessionClasse', $sessionEncour)->orderBy('id', 'desc')->get();

        //  dd($ClasseData);

       // $ClasseData = Classe::All();

        return response()->json($ClasseData);


    }
    public function Addclasse ( Request $request)

    {

        //dd($request);

        //  Recuperons le code etab

           $codeEtab = $request['EcoleInfos'][0]['codeEtab'];

        // Recuperons les datas de la session en cour

           $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();


        // Recuperons le libelle  de la session en cour

           $sessioEncour = $sessiondata[0]['libelle_sess'];


        $request->validate([
            'sigleClasse' => 'required|string',
            'MontantScol'=>'required|string',
            'FraisInscrip'=>'required|string',
            'MontantScolAffect'=>'required|string'
        ]);


        $ClasseData = Classe::create([

            'libelleClasse' => $request->sigleClasse,
            'inscription_Classe'=>$request->FraisInscrip,
            'scolarite_Classe'=>$request->MontantScol,
            'scolariteaff_Classe'=>$request->MontantScolAffect,
            'codeEtabClasse'=>$codeEtab,
            'sessionClasse'=>$sessioEncour,
            'emp_Classe'=>$request->imageEmploiTmp
        ]);


       return response()->json($ClasseData);

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
        $request->validate([
            'libelleClasse' => 'required|string',
            'codeEtabClasse' => 'required|string'
        ]);

        $status="1";
        $date=date("d/m/dY");
        $data= Classe::create([
            'libelleClasse'=>$request->libelleClasse,
            'codeEtabClasse'=>$request->codeEtabClasse,
            'statutClasse'=>$status,
            'datecreaClasse'=>$date,
            'sessionClasse'=>$request->sessionClasse,
            'sectionClasse'=>$request->sectionClasse,
            'inscription_Classe'=>$request->inscription_Classe,
            'scolarite_Classe'=>$request->scolarite_Classe,
            'scolariteaff_Classe'=>$request->scolariteaff_Classe,
            'reinscription_Classe'=>$request->reinscription_Classe,
            'type_Classe'=>$request->type_Classe,
            'niveau_Classe'=>$request->niveau_Classe,
            'cycle_Classe'=>$request->cycle_Classe,
            'libellecycle_Classe'=>$request->libellecycle_Classe,
            'principale_Classe'=>$request->principale_Classe,
            'order_Classe'=>$request->order_Classe,
            'mixte_Classe'=>$request->mixte_Classe,
            'emp_Classe'=>$request->emp_Classe,
            'primaireEtab'=>$request->primaireEtab,
            'createby_Classe'=>$request->createby_Classe,
            //'user_id'=> $data->user_id= Auth::user()->id,
            ]);

            $msg=' classe crée avec success';
             return response()->json($msg);
        }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'libelleClasse' => 'required|string',
            'codeEtabClasse' => 'required|string',
            'inscription_Classe'=>'required|string',
            'scolarite_Classe'=>'required|string'
        ]);

        // $status="1";
        // $data= Classe::update([
        //     'libelleClasse'=>$request->libelleClasse,
        //     'codeEtabClasse'=>$request->codeEtabClasse,
        //     'statutClasse'=>$status,
        //     'datecreaClasse'=>$request->datecreaClasse,
        //     'sessionClasse'=>$request->sessionClasse,
        //     'sectionClasse'=>$request->sectionClasse,
        //     'inscription_Classe'=>$request->inscription_Classe,
        //     'scolarite_Classe'=>$request->scolarite_Classe,
        //     'scolariteaff_Classe'=>$request->scolariteaff_Classe,
        //     'reinscription_Classe'=>$request->reinscription_Classe,
        //     'type_Classe'=>$request->type_Classe,
        //     'niveau_Classe'=>$request->niveau_Classe,
        //     'cycle_Classe'=>$request->cycle_Classe,
        //     'libellecycle_Classe'=>$request->libellecycle_Classe,
        //     'principale_Classe'=>$request->principale_Classe,
        //     'order_Classe'=>$request->order_Classe,
        //     'mixte_Classe'=>$request->mixte_Classe,
        //     'emp_Classe'=>$request->emp_Classe,
        //     'primaireEtab'=>$request->primaireEtab,
        //     'createby_Classe'=>$request->createby_Classe,
        //     ]);

            $msg=' classe crée avec success';
             return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
