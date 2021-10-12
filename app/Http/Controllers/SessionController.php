<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function addSession( Request $request) {

       

        $this->validate($request, [

            'AnneeScolaire' => 'required',
            'dateDebut' => 'required',
            'dateFin' => 'required'
            
        ]);

        dd($request);

        $data = Session::Create([

            'libelle_sess' => $request->AnneeScolaire,
            //'codeEtab_sess'=>$request->PrenomAdmin,
            'datedeb_sess'=>$request->dateDebut,
            'datefin_sess'=>$request->dateFin,
         ]);

         return response()->json($data);


          //dd($request);




    }
}
