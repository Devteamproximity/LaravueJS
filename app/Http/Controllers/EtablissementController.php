<?php

namespace App\Http\Controllers;

use App\Models\Pays;
use App\Models\User;
use App\Models\Etablissement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{

    public function create(Request $request)
    {
        $data = Pays::All();
        //var_dump($pays);
        return response()->json($data);
    }

    public function upload(Request $request)
    {



        $this->validate($request, [

            'file' => 'required|mimes:png,jpg,jpeg'

        ]);

        $fileName = time() . '.' . $request->file->extension();

        $request->file->move(public_path('Photos/Logos'), $fileName);

        return $fileName;
    }

    public function addEtablissement(Request $request)

    {


        //dd($request);

        $this->validate($request, [

            'codeEtablissement' => 'required',
            'libelleEtablissement' => 'required',
            'sigleEtablissement' => 'required',
            'sloganEtablissement' => 'required',
            'codeEtablissement' => 'required',
            'libelleEtablissement' => 'required',
            'emailEtablissement' => 'required',
            'dateCreation' => 'required',
            'telephoneEtablissement' => 'required',
            'telephoneEtablissementSecond' => 'required',
            'paysEtablissement' => 'required',
            'villeEtablissement' => 'required',
            //'siteInternetEtablissement' => 'required',
            'directeurEtablissement' => 'required',
            'telephoneDirecteurEtablissement' => 'required',
            'addressEtablissement' => 'required'
            

        ]);


        if ($request->groupe == "Oui") {

            $request->groupe = 1;
        } 
        
        else if ($request->groupe == "Non") {

            $request->groupe = 0;

            $request->groupeName = '';
        }

        // if ($request->mixte == "Oui") {

        //     $request->mixte = 1;
        // } else {

        //     $request->mixte = 0;
        // }

        if($request->siteInternetEtablissement==null){

            $request->siteInternetEtablissement="";
        }

        if($request->imageLogo==null) {

            $request->imageLogo="logodefaut.png";
        }

        //dd($request);

        $data = new Etablissement;
        // $status = "1";
        // $groupstateEtab = "0";
        $datebuildEtab = date('Y-m-d H:i:s');

        // @insertion dans la table Etablissement

        $data = Etablissement::Create([
            'groupnameEtab' => $request->groupeName,
            'groupstateEtab' => $request->groupe,
            'mixteEtab' => $request->mixte,
            'codeEtab' => $request->codeEtablissement,
            'libelleEtab' => $request->libelleEtablissement,
            'sigleEtab' => $request->sigleEtablissement,
            'sloganEtab' => $request->sloganEtablissement,
            'emailEtab' => $request->emailEtablissement,
            'datecreationEtab' => $request->dateCreation,
            'principaltelEtab' => $request->telephoneEtablissement,
            'secondairetelEtab' => $request->telephoneEtablissementSecond,
            'paysEtab' => $request->paysEtablissement,
            'villeEtab' => $request->villeEtablissement,
            'sitewebEtab' => $request->siteInternetEtablissement,
            'directeurEtab' => $request->directeurEtablissement,
            'principalteldirecteurEtab' => $request->telephoneDirecteurEtablissement,
            'adresseEtab' => $request->addressEtablissement,
            'logoEtab' => $request->imageLogo
            // 'createbyEtab'=>$request->createbyEtab,
            // 'typeEtab'=>$request->typeEtablissement
            // 'groupidEtab'=>$request->groupidEtab,
            // 'primaireEtab'=>$request->primaireEtab,
            // 'datebuildEtab'=>$datebuildEtab,
            // 'status'=>$status,
            //'user_id'=> $data->user_id= Auth::user()->id,
        ]);

        //dd($request);





        // insertion dans la table utulisateur (compte)

        // $SaveId =$data->id(); 
        // $user= User::Create([
        //     'nom'=>$request->datebuildEtab,
        //     'prenom'=>$request->datebuildEtab,
        //     'fonction'=>$request->fonction,
        //     'email'=>$request->email,
        //     'telephone'=>$request->telephone,
        //     'telbureau'=>$request->telbureau,
        //     'login'=>$request->login,
        //     'password'=>$request->password,
        // ]);

        //$msg = ' Etablissement cree avec success';

        return response()->json($data);
    }


    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'title' => 'required|string',
    //         'content' => 'required|string'
    //     ]);
    //     if ($request->file('file')) {
    //         /* Multiple file upload */
    //         $files = $request->file('file');
    //         if (!is_array($files)) {
    //             $files = [$files];
    //         }
    //         //loop throu the array
    //         for ($i = 0; $i < count($files); $i++) {
    //             $file = $files[$i];
    //             $filename = $file->getClientOriginalName();
    //             $filename = str_replace(' ', '', $filename);
    //             $file->storeAs('uploads', $filename);
    //         }
    //     }
    //     $data=new Etablissement;
    //     $status="1";
    //     $groupstateEtab="0";
    //     $datebuildEtab=date("d/m/dY");
    //     // @insertion dans la table Etablissement
    //    $data= Etablissement::update([
    //     'codeEtab'=>$request->CodeEtab,
    //     'libelleEtab'=>$request->libelleEtab,
    //     'sigleEtab'=>$request->sigleEtab,
    //     'sloganEtab'=>$request->sloganEtab,
    //     'emailEtab'=>$request->emailEtab,
    //     'principaltelEtab'=>$request->principaltelEtab,
    //     'secondairetelEtab'=>$request->secondairetelEtab,
    //     'paysEtab'=>$request->paysEtab,
    //     'sitewebEtab'=>$request->sitewebEtab,
    //     'directeurEtab'=>$request->directeurEtab,
    //     'principalteldirecteurEtab'=>$request->principalteldirecteurEtab,
    //     'adresseEtab'=>$request->adresseEtab,,
    //     'logoEtab'=>$filename,
    //     'datecreationEtab'=>$request->datecreationEtab,
    //     'createbyEtab'=>$request->createbyEtab,
    //     'typeEtab'=>$request->typeEtab,
    //     'mixteEtab'=>$request->mixteEtab,
    //     'groupstateEtab'=>$groupstateEtab,
    //     'groupidEtab'=>$request->groupidEtab,
    //     'primaireEtab'=>$request->primaireEtab,
    //     'datebuildEtab'=>$datebuildEtab,
    //     'status'=>$status,
    //     ]);
    //     // @insertion dans la table utulisateur (compte)
    //     $user= User::update([
    //         'nom'=>$request->$datebuildEtab,
    //         'prenom'=>$request->$datebuildEtab,
    //         'fonction'=>$request->fonction,
    //         'email'=>$request->email,
    //         'telephone'=>$request->telephone,
    //         'telbureau'=>$request->telbureau,
    //         'login'=>$request->login,
    //         'password'=>$request->password,
    //     ]);

    //    $msg=' Etablissement modifier avec success';
    //    return response()->json($msg);
    // }

    //  Recuperation des ecoles 

    public function getAllEtablissement(){

        $datas = Etablissement::orderBy('id', 'desc')->get();

         return response()->json($datas);
    }

    public function delateEtablissement(Request $request){

        //dd($request->id);

        return Etablissement::where('id', $request->id)->delete();

    }

        //  Editer une ecole 

    public function updateEtablissement (Request $request)
    {

       //dd($request);


        $this->validate($request, [

            'id' => 'required'

        ]);

        if($request->sitewebEtab==null){

            $request->sitewebEtab="";
        }

        if($request->logoEtab==null) {

            $request->logoEtab="logodefaut.png";
        }

        return Etablissement::where('id', $request->id)->update([

            //'groupnameEtab' => $request->groupnameEtab,
            //'groupstateEtab' => $request->groupstateEtab,
            //'mixteEtab' => $request->mixteEtab,
            'codeEtab' => $request->codeEtab,
            'libelleEtab' => $request->libelleEtab,
            'sigleEtab' => $request->sigleEtab,
            'sloganEtab' => $request->sloganEtab,
            'emailEtab' => $request->emailEtab,
            'datecreationEtab' => $request->datecreationEtab,
            'principaltelEtab' => $request->principaltelEtab,
            'secondairetelEtab' => $request->secondairetelEtab,
            'paysEtab' => $request->paysEtab,
            'villeEtab' => $request->villeEtab,
            'sitewebEtab' => $request->sitewebEtab,
            'directeurEtab' => $request->directeurEtab,
            'principalteldirecteurEtab' => $request->principalteldirecteurEtab,
            'adresseEtab' => $request->adresseEtab,
            //'logoEtab' => $request->logoEtab
        ]);
    }
    

    public function delateImage(Request $request)

    {

        $fileName = $request->imageProfil;
        $this->delateFileFromServer($fileName);
        return 'done';
    }

    public function delateFileFromServer($fileName)
    {

        $filePatch = public_path() . '/Photos/admins' . $fileName;

        if (file_exists($filePatch)) {

            unlink($filePatch);
        }

        return;
    }


    public function destroy($id)
    {
        //
    }
}
