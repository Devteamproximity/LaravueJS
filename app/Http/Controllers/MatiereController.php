<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\libelleMatieres;
use App\Models\Matiere;
use App\Models\Session;
use Illuminate\Http\Request;

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

        // Enregistrer la matiere 

        $request->validate([
            'matiere' => 'required|string',
            'coef' => 'required|string',
        ]);

       
        $Data = Matiere ::create([

            'libelle' => $request->matiere,
            'codeEtab'=>$codeEtab,
            'session'=>$sessioEncour,
            'coef'=>$request->coef
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
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
    public function update(Request $request, Matiere $matiere)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matiere  $matiere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        //
    }
}
