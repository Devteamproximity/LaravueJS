<?php

use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Etablissement;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrimestreController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtablissementController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::middleware(['auth'])->group(function () {


Route::post('admin/upload', [EtablissementController::class, 'upload']);

Route::post('admin/delateImage', [EtablissementController::class, 'delateImage']);

//  Ajouter un  etalissement

Route::post('admin/addEtablissement', [EtablissementController::class, 'addEtablissement']);

// Ajouter un admin a une ecole

Route::post('admin/addAdmin', [EtablissementController::class, 'addAdmin']);

//  Recuperer tous les etalissements

Route::get('admin/getAllEtablissement', [EtablissementController::class, 'getAllEtablissement']);

//  supprimer  un  etalissement

Route::post('admin/delateEtablissement', [EtablissementController::class, 'delateEtablissement']);

// Modifier un etablissement

Route::post('admin/updateEtablissement', [EtablissementController::class, 'updateEtablissement']);
//});


Route::post('/login', [AuthController::class, 'login']);


// Route::middleware(['ProtectedPage'])->group(function () {

  /*    ROUTES LIEES A L"ADMIN LOCAL  */

  Route::post('locale/Addclasse', [ClasseController::class, 'Addclasse']);

  // Recuperer toutes les sessions d'une ecole

  Route::post('locale/getSessionEtablissement', [SessionController::class, 'getSessionEtablissement']);

  // Recuperer tous les trimestres de la session  en cour d'une ecole

  Route::post('locale/getTrimestreEtablissement', [SessionController::class, 'getTrimestreEtablissement']);

  // Recuperer toutes les classe de la session  en cour d'une ecole

  Route::post('locale/getClasseEtablissement', [ClasseController::class, 'getClasseEtablissement']);

  // Recuperer toutes les infos d'une ecole

  Route::post('locale/getEtabinfos', [EtablissementController::class, 'getEtabinfos']);

  // Ajouter une session a une ecole

  Route::post('locale/addSession', [SessionController::class, 'addSession']);


  // clotruer une session cloturerSession

  Route::post('locale/cloturerSession', [SessionController::class, 'cloturerSession']);


  /* ROUTES POUR LES PARENTS */


  // Ajouter un parent a une ecole

  Route::post('locale/addParent', [ParentController::class, 'addParent']);

  // Recuperer les parents d'une ecole

  Route::post('locale/getParent', [ParentController::class, 'getParent']);


  /* Routes pour les enseignants  */


  // Ajouter un enseigant  a une ecole

  Route::post('locale/addEnseignant', [EnseignantController::class, 'addEnseignant']);

  // Recuperer les enseignants  d'une ecole

  Route::post('locale/getAllEnseignant', [EnseignantController::class, 'getAllEnseignant']);


  // Recuperer les enseignants  d'une ecole pour affectation

  Route::post('locale/getAllEnseignantAffect', [EnseignantController::class, 'getAllEnseignantAffect']);

  // Recuperer les enseignants  de l'ecole  avec enseigant respectifs

  Route::post('locale/getAllEnseignantAffectMatieres', [EnseignantController::class, 'getAllEnseignantAffectMatieres']);


  /* ROUTES POUR LES MATIERS */


  // Ajouter un libelle

  Route::post('locale/addLibelle', [MatiereController::class, 'addLibelle']);


  // Recuperer tous les  libelles

  Route::post('locale/getLibelles', [MatiereController::class, 'getLibelles']);

  // Ajouter une matiere

  Route::post('locale/addMatiere', [MatiereController::class, 'addMatiere']);

  // Recuperer toutes les classes pour creer des matieres

  Route::post('locale/getClasses', [MatiereController::class, 'getClasses']);


  // Recuperer toutes les matieres d'une  classe precise

  Route::post('locale/getMatieresClasse', [MatiereController::class, 'getMatieresClasse']);


  // Recuperer toutes les matieres d'une  classe precise

  Route::post('locale/affecterTeacher', [MatiereController::class, 'affecterTeacher']);



  /*   ROUTES POUR LES ELEVES    */

  // Recuperer un parent grace a son telephone

  Route::post('locale/SearchParent', [StudentController::class,'SearchParent']);

  // INCRIRE UN ELEVE

  Route::post('locale/inscripEleve', [StudentController::class,'inscripEleve']);

  Route::post('locale/getEleveclasse', [StudentController::class,'getEleveclasse']);


  /* ROUTES POUR LES ENSEIGNANTS */

  // Recuperer toutes les infos de cet enseigants avec ses classes

  Route::post('locale/getInfosTeacher', [EnseignantController::class,'getInfosTeacher']);

  // Recuperer toutes les classes d'un enseignant

  Route::post('teacher/getAcllasseTeacher', [ClasseController::class,'getAcllasseTeacher']);

  // Recuperes les eleves  des classes par un enseignants (ses classes )

  Route::post('locale/getEleveclasseByTeacher', [EnseignantController::class,'getEleveclasseByTeacher']);

  // Recuperes les info eleve et son parent

  Route::post('locale/getEleveAndParentInfos', [StudentController::class,'getEleveAndParentInfos']);









// });





// Route::post('/login', [UserController::class, 'login']);

// Route::get('/login', [UserController::class, 'index']);
