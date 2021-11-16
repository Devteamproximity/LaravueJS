<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Session;
use App\Models\Affecter;
use App\Models\ClasseEnseignants;
use App\Models\Matieres;
use App\Models\Enseignants;
use Illuminate\Http\Request;
use App\Models\libelleMatieres;
use App\Models\EnseignantsMatiere;
use App\Models\EnseignantsMatieres;

class MatiereController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLibelles (Request $request)

    {


        //  Recuperons le code etab

        $codeEtab = $request['ClasseInfos']['codeEtabClasse'];


        // Recuperons le libelle  de la session en cour

        $sessioEncour = $request['ClasseInfos']['sessionClasse'];

        $Datas = libelleMatieres ::where('session',$sessioEncour)->where('codeEtab',$codeEtab)->get();

        return  response()->json($Datas);

    }

    public function getClasses (Request $request)

    {

        // Recuperer le code etab et la session en cour

        $codeEtab = $request['ClasseInfos']['codeEtabClasse'];

        // Recuperons la session en cour


        $sessioEncour = $request['ClasseInfos']['sessionClasse'];


        $Datas = Classe ::where('sessionClasse',$sessioEncour)->where('codeEtabClasse',$codeEtab)->get();

        return  response()->json($Datas);

    }

    public function addLibelle (Request $request)

    {

        //  Recuperons le code etab

           $codeEtab = $request['ClasseInfos']['codeEtabClasse'];


        // Recuperons le libelle  de la session en cour

           $sessioEncour = $request['ClasseInfos']['sessionClasse'];

        // Enregistrer le libelle

        $request->validate([
            'libelle' => 'required|string'
        ]);


        $Data = libelleMatieres ::create([

            'libelle' => $request->libelle,
            'codeEtab'=>$codeEtab,
            'session'=>$sessioEncour
        ]);



    }


    public function addMatiere (Request $request)

    {

        //  Recuperons le code etab

            $codeEtab = $request['ClasseInfos']['codeEtabClasse'];

        // Recuperer l'identifiant  de la classe dans laquelle la matiere est ajoute

            $idClasse = $request['ClasseInfos']['id'];

        // Recuperons le libelle  de la session en cour

           $sessioEncour = $request['ClasseInfos']['sessionClasse'];

           // dd($request->matiere);

        // Enregistrer la matiere

        $request->validate([
            'matiere' => 'required|string',
            'coef' => 'required|string',
        ]);


        $Data = Matieres ::create([

            'libelle' => $request->matiere,
            'codeEtab'=>$codeEtab,
            'session'=>$sessioEncour,
            'classe_id'=> $idClasse,
            'coef'=>$request->coef,

        ]);

        return response()->json($Data);

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
    public function getMatieresClasse (Request $request)

    {

         //  Recuperons le code etab

            $codeEtab = $request['ClasseInfos']['codeEtabClasse'];

         // Recuperer l'identifiant  de la classe dans laquelle la matiere est ajoute

             $idClasse = $request['ClasseInfos']['id'];


         // Recuperons le libelle  de la session en cour

            $sessioEncour = $request['ClasseInfos']['sessionClasse'];


        // Recuperons les matieres de cette classe en particulier

            $Datas = Matieres ::where('session',$sessioEncour)->where('codeEtab',$codeEtab)->where('classe_id',$idClasse)->get();


            return  response()->json($Datas);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function affecterTeacher (Request  $request)

    {
        // Je recupere l'id de l'enseigant car c'est l'id qui arrive dans la value


        $idTeacher = $request->Enseignants;

        $request->validate([
             'id' => 'required',

         ]);


          // ici je mets l'id de l'enseigant dans la table matiere

         // Je mets a jour affect dans la table matiere de 0 a 1

          $idMatiere = Matieres:: where('id', $request->id)->update([

            'affected'=>'1',
            'enseignants_id'=>$request->Enseignants
         ]);



         //Ensuite  je rempli la table enseignant-matiere , table qui lie la classe et l'enseignant

         // Allons recuperer l'id de la classe  danslaquelle cette matiere existe

         $Classe = Matieres::Find($request->id);

         $idClasse = $Classe['classe_id'];

         $Data = ClasseEnseignants::create([
             'classe_id' => $idClasse,
             'enseignants_id'=>$request->Enseignants,
             'codeEtab'=>$request->codeEtab,
             'session'=>$request->session,
         ]);



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matieres $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matieres $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matieres $matiere)
    {
        //
    }
}
