<?php

namespace App\Http\Controllers;

use App\Models\Versements;
use Illuminate\Http\Request;

class VersementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getAstudentDatailsFinancesInfos(Request $request) {

        $tranche1 = Versements::where('classe_id',$request->classe_id)->where('student_id',$request->id)->where('motif','tranche1')

        ->where('codeEtab',$request->codeEtab)->where('session',$request->session)->sum('montantverser');

        $tranche2 = Versements::where('classe_id',$request->classe_id)->where('student_id',$request->id)->where('motif','tranche2')

        ->where('codeEtab',$request->codeEtab)->where('session',$request->session)->sum('montantverser');

        $ape = Versements::where('classe_id',$request->classe_id)->where('student_id',$request->id)->where('motif','APE')

        ->where('codeEtab',$request->codeEtab)->where('session',$request->session)->sum('montantverser');

        $datas = [

            'tranche1'=>  $tranche1,
            'tranche2'=>  $tranche2,
            'ape'=>  $ape
        ];


        return response()->json($datas);

     }


     public function getAstudentFinancesInfos(Request $request){


        $datas = Versements::where('classe_id',$request->classe_id)->where('student_id',$request->id)
        ->where('codeEtab',$request->codeEtab)->where('session',$request->session)->orderBy('id', 'desc')->get();

        return response()->json($datas);

     }
    public function addVersement( Request $request)

    {

        // Traiteme de la date

        $datetamp =  date('d m Y h:i:s');
        $splitDateStamp = explode(" ",$datetamp);
        $j =  $splitDateStamp[0];  $m =  $splitDateStamp[1];  $a= $splitDateStamp[2];

        // Traitement de l'heure

        $timetamp = date('h:i:s');
        $splitTimeStamp = explode(":",$timetamp);
        $heure = $splitTimeStamp[0];
        $min = $splitTimeStamp[1];
        $sec= $splitTimeStamp[2];

        $codeEtab = $request['EleveInfos']['codeEtab'];

        $matricule = $request['EleveInfos']['matricule'];

       //  Code du versement

        $code = $codeEtab.$matricule.$j.$m.$a.$heure.$min.$sec;

        $session = $request['EleveInfos']['session'];

        $idClasse = $request['EleveInfos']['classe_id'];

        $idEleve = $request['EleveInfos']['id'];

        $this->validate($request, [

            'date' => 'required|date',
            'deposant' => 'required',
            'montantverse' => 'required|numeric',
            'motif' => 'required',
            'mode' => 'required'
        ]);


        $data = Versements::create([
            'classe_id'=>$idClasse,
            'student_id'=>$idEleve,
            'codeEtab'=>$codeEtab,
            'session'=>$session,
            'date'=>$request->date ,
            'code'=>$code,
            'mode'=>$request->mode,
            'motif'=>$request->motif,
            'deposant'=>$request->deposant,
            'receptionneur'=>$request->percepteur,
            'montantverser'=>$request->montantverse,

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
