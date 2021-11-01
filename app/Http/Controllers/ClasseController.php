<?php

namespace App\Http\Controllers;
use App\Models\Classe;
use App\Models\Session;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function getClasseEtablissement (Request $request)  {

        $codeEtab = $request[0]['codeEtab'];

        // Recuperer les informations sur ecole et session en cour 

        $EtabSession = Session::with('Etablissement')->where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->get();

        // Recuperer tous les classes de cet ecole pour cette session en cour 

        $ClasseData = Classe::where('codeEtabClasse', $codeEtab)->orderBy('id', 'desc')->get();

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
