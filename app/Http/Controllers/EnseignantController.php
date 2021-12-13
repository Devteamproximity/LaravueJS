<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\TestMail;
use App\Models\Classe;
use App\Models\Session;
use App\Models\Student;
use App\Models\Matieres;
use App\Models\Enseignants;
use App\Models\Etablissement;
use App\Models\Matiere;
use App\Models\Parents;
use App\Models\Presences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Xml\Tests;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getAllasseTeacherBylocale(Request $request){

        $datas=Matieres::with('Classe')->where('enseignants_id',$request->id)->get();

        return  $datas ;


     }

    public function DoAppelByTeacher(Request $request){


        // On recupere le jour , la classe, la matiere et les dates: classeName contient id de la claase

        $Classe = Classe::where('id',$request->classeName)->first();

        $libelleClasse = $Classe->libelleClasse;

        $codeEtab = $Classe->codeEtabClasse;

        // Recuperons le nom de l'ecole grace a son codeEtab

        $Ecoles = Etablissement::where('codeEtab', $codeEtab)->first('libelleEtab');

        $nomEcole = $Ecoles->libelleEtab;

        $sessionEncour = $Classe->sessionClasse;

        $matiere = $request->matiere;

        $datetime = $request->dateJour;

        $duree = $request->duree;

        $date = date('Y-m-d', strtotime($datetime));

        $heure = date('H:i:s', strtotime($datetime));

        // Recuperer les ID des eleves absents

        $Eleves = $request->checkBoxs;

        foreach ($Eleves as  $Ideleve)


        {


            // Enregistrer les absents dans la table presence

            $this->validate($request, [

                'classeName' => 'required',
                'matiere' => 'required',
                'dateJour' => 'required',
                'duree' => 'required'

            ]);

             // Recuperons le nom de l'enfant frace a son id

            $Eleves = Student::where('id', $Ideleve)->first();

            $nomEleve=$Eleves->nom;

            $prenomEleve=$Eleves->prenom;

            $data = Presences::Create([

                'student_id' =>$Ideleve,
                'user_id'=>1,
                'classe_id'=>$request->classeName,
                'dateHeure'=>$datetime,
                'date'=>$date ,
                'heure'=>$heure,
                'duree'=>$request->duree,
                'matiere'=>$matiere,
                'session'=>$sessionEncour,
                'codeEtab'=>$codeEtab,

             ]);

             $Idsparent = Student::where('id',$Ideleve)->first('parent_id');

             $InfosParent = Parents::where('id', $Idsparent->parent_id)->first();

             $idParent = $InfosParent->id;

             $nomParent =  $InfosParent->nomParent;

             $emailParent = $InfosParent->emailParent;


             // Envoyons le mail aux parents de eleves absents

             // Regroupons les infos utiles pour le mails qui partira

             $infosMails = [

                'nomEcole'=> $nomEcole   ,
                'heureCour' =>$heure,
                'duree'=>$duree,
                'matiere'=>$matiere,
                'dateCour'=>$date,
                'nomEleve'=>$nomEleve,
                'prenomEleve'=>$prenomEleve,
                'nomParent'=>$nomParent
             ];

            //  $arr=json_encode(array(
            //     "phone"=>"693333162",
            //     "body"=>"Hello Vishal"
            // ));
            // $url="https://eu16.chat-api.com/instance375008/message?token=2czlurhv79jir2xo";


            //     $ch=curl_init();
            //     curl_setopt($ch,CURLOPT_URL,$url);
            //     curl_setopt($ch,CURLOPT_POST,true);
            //     curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            //     curl_setopt($ch,CURLOPT_POSTFIELDS,$arr);
            //     curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            //         'Content-type:application/json',
            //         'Content-length:'.strlen($arr)
            //     ));
            //     $result=curl_exec($ch);
            //     curl_close($ch);
            //     echo $result;

              Mail::to($emailParent)->send(new TestMail($infosMails));

            //  $telParent = $InfosParent->telParent;
            //  $nomParent = $InfosParent->nomParent;


        }





        // Envoyer le mail aux parents de ces enfants

        // Mail::to('test@mail.test')->send(new TestMail());

        // return
    }

    public function getEploiTempsTeacherForAclasse(Request $request){

        // Recuperer l'id de la classe

        $idclasse = $request->classe_id;

        // Recuperer le code de l'ecole

        $codeEtab  = $request->codeEtab;

        // Recuperer la session en cour

        $sessionEncour  = $request->session;

        // Recuperer les eleves d'une classes

         // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

         $Data = Classe::where('codeEtabClasse', $codeEtab)->where('sessionClasse', $sessionEncour)->where('id', $idclasse)->first();

        return response()->json($Data);
   }

     public function getEleveclasseByTeacher(Request $request){

          // Recuperer l'id de la classe

          $idclasse = $request->classe_id;

          // Recuperer le code de l'ecole

          $codeEtab  = $request->codeEtab;

          // Recuperer la session en cour

          $sessionEncour  = $request->session;

          // Recuperer les eleves d'une classes

           // $EleveData = Student::with('user)->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('id', 'desc')->get();

           $EleveData = Student::with('user','classe')->where('codeEtab', $codeEtab)->where('session', $sessionEncour)->where('classe_id', $idclasse)->orderBy('nom', 'asc')->orderBy('prenom', 'asc')->get();

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

        $sessiondata = Session::where('codeEtab_sess', $codeEtab)->where('encours_sess', 1)->orderBy('id', 'desc')->first();

        // Recuperons le libelle  de la session en cour

        $sessionEncour = $sessiondata['libelle_sess'];

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
