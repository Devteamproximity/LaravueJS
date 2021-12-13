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
use App\Http\Controllers\DevoirsController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AbsencesController;
use App\Http\Controllers\CahierController;
use App\Http\Controllers\TrimestreController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\VersementsController;

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

  Route::post('locale/getAllasseTeacherBylocale', [EnseignantController::class, 'getAllasseTeacherBylocale']);

  Route::post('locale/Addclasse', [ClasseController::class, 'Addclasse']);


  // Recuperer toutes les sessions d'une ecole

  Route::post('locale/getSessionEtablissement', [SessionController::class, 'getSessionEtablissement']);

  // Recuperer tous les trimestres de la session  en cour d'une ecole

  Route::post('locale/getTrimestreEtablissement', [SessionController::class, 'getTrimestreEtablissement']);

  // Recuperer toutes les classe de la session  en cour d'une ecole

  Route::post('locale/getClasseEtablissement', [ClasseController::class, 'getClasseEtablissement']);

  Route::post('parent/updateMessagesParent', [MessageController::class, 'updateMessagesParent']);

  Route::post('parent/getMessagesParent', [MessageController::class, 'getMessagesParent']);


  Route::post('parent/getMessagesTeacher', [MessageController::class, 'getMessagesTeacher']);



  // Recuperer toutes les infos d'une ecole

  Route::post('locale/getEtabinfos', [EtablissementController::class, 'getEtabinfos']);


  Route::post('locale/getstatsEtab', [EtablissementController::class, 'getstatsEtab']);

  // Ajouter une session a une ecole

  Route::post('locale/addSession', [SessionController::class, 'addSession']);


  // clotruer une session cloturerSession

  Route::post('locale/cloturerSession', [SessionController::class, 'cloturerSession']);


  Route::post('locale/addVersement', [VersementsController::class, 'addVersement']);

  Route::post('locale/getAstudentFinancesInfos', [VersementsController::class, 'getAstudentFinancesInfos']);

  Route::post('locale/getAstudentDatailsFinancesInfos', [VersementsController::class, 'getAstudentDatailsFinancesInfos']);


  /* ROUTES POUR LES PARENTS */


  // Ajouter un parent a une ecole

  Route::post('locale/addParent', [ParentController::class, 'addParent']);

  Route::post('parent/getInfosParent', [ParentController::class, 'getInfosParent']);

  // Recuperer les parents d'une ecole

  Route::post('locale/getParent', [ParentController::class, 'getParent']);


  /* Routes pour les enseignants  */

  // Faire l'appel pour une classe

  Route::post('teacher/DoAppelByTeacher', [EnseignantController::class, 'DoAppelByTeacher']);

  // Ajouter un enseigant  a une ecole

  Route::post('locale/addEnseignant', [EnseignantController::class, 'addEnseignant']);

  // Recuperer les enseignants  d'une ecole

  Route::post('locale/getAllEnseignant', [EnseignantController::class, 'getAllEnseignant']);


  // Recuperer les enseignants  d'une ecole pour affectation

  Route::post('locale/getAllEnseignantAffect', [EnseignantController::class, 'getAllEnseignantAffect']);

  // Recuperer les enseignants  de l'ecole  avec enseigant respectifs

  Route::post('locale/getAllEnseignantAffectMatieres', [EnseignantController::class, 'getAllEnseignantAffectMatieres']);

  // Recuperer les enfants d'un parent dans le compte admin

  Route::post('locale/getAllStudentofeParentByLocal', [ParentController::class, 'getAllStudentofeParentByLocal']);



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
// Recuperer tous les emplois du temps

Route::post('locale/getAllTimetable', [ClasseController::class, 'getAllTimetable']);

Route::post('teacher/getLibelleMatiereclasseById', [ClasseController::class, 'getLibelleMatiereclasseById']);

Route::post('parent/sendMessageByParent', [MessageController::class, 'sendMessageByParent']);

Route::post('locale/sendMessage', [MessageController::class, 'sendMessage']);

Route::post('locale/getMessageSendByParents', [MessageController::class, 'getMessageSendByParents']);

Route::post('teacher/createDevoir', [DevoirsController::class, 'createDevoir']);

Route::post('teacher/createCahier', [CahierController::class, 'createCahier']);



// RECUPERER LA BOITE D"ENVOI DE L"ADMIN

Route::post('locale/getMessageEnvoyes', [MessageController::class, 'getMessageEnvoyes']);


Route::post('locale/getMessageEnvoyesParent', [MessageController::class, 'getMessageEnvoyesParent']);

  /*   ROUTES POUR LES ELEVES    */

  // Recuperer un parent grace a son telephone

  Route::post('locale/SearchParent', [StudentController::class,'SearchParent']);

  // INCRIRE UN ELEVE

  Route::post('locale/inscripEleve', [StudentController::class,'inscripEleve']);

  // Recuperer tous les eleves d'une classe

  Route::post('locale/getEleveclasse', [StudentController::class,'getEleveclasse']);

  Route::post('locale/getEleveclasseById', [StudentController::class,'getEleveclasseById']);

  Route::post('locale/getAbensesOfEleveclasseById', [AbsencesController::class,'getAbensesOfEleveclasseById']);

   Route::post('locale/getAbensesOfEleveclasseByParent', [AbsencesController::class,'getAbensesOfEleveclasseByParent']);

  // Recuperer tous les eleves d'une classe pour faure l'appel

  Route::post('teacher/getStudentByTeacherForAppel', [StudentController::class,'getStudentByTeacherForAppel']);


  /* ROUTES POUR LES ENSEIGNANTS */

  // Recuperer les emplois du temps de chaque enseigant

  Route::post('locale/getAllTimetableTeacher', [ClasseController::class, 'getAllTimetableTeacher']);

//   Route::post('parent/getAllTimetableByParent', [ClasseController::class, 'getAllTimetableByParent']);

  // Recuperer toutes les infos de cet enseigants avec ses classes

  Route::post('locale/getInfosTeacher', [EnseignantController::class,'getInfosTeacher']);

  Route::post('teacher/delateDevoir', [DevoirsController::class,'delateDevoir']);

  // Recuperer toutes les classes d'un enseignant

  Route::post('teacher/getAllClasseOfTeacher', [ClasseController::class,'getAllClasseOfTeacher']);

  Route::post('teacher/getAcllasseTeacher', [ClasseController::class,'getAcllasseTeacher']);

  Route::post('locale/getAllDevoirsLocal', [DevoirsController::class,'getAllDevoirsLocal']);

  Route::post('locale/getAllCahiersLocal', [CahierController::class,'getAllCahiersLocal']);

  Route::post('parent/getAllDevoirsParentParClasse', [DevoirsController::class,'getAllDevoirsParentParClasse']);

  Route::post('parent/getAllCahierParentParClasse', [CahierController::class,'getAllCahierParentParClasse']);


  Route::post('locale/getAllDevoirsLocalParClasse', [DevoirsController::class,'getAllDevoirsLocalParClasse']);

  Route::post('locale/getAllCahiersLocalParClasse', [CahierController::class,'getAllCahiersLocalParClasse']);

  Route::post('teacher/getAllDevoirsTeacher', [DevoirsController::class,'getAllDevoirsTeacher']);

  Route::post('teacher/getAllCahierByATeacher', [CahierController::class,'getAllCahierByATeacher']);

  Route::post('teacher/updateDevoirsTeacher', [DevoirsController::class,'updateDevoirsTeacher']);

  Route::post('teacher/updateCahierTeacher', [CahierController::class,'updateCahierTeacher']);

  Route::post('teacher/delateCahierTeacher', [CahierController::class,'delateteCahierTeacher']);


  Route::post('teacher/posterCorrectionDevoirsTeacher', [DevoirsController::class,'posterCorrectionDevoirsTeacher']);

  // Recuperer tous les classes d'un enseignant avec les eleves a l'interieur

  Route::post('teacher/getAllasseByATeacher', [ClasseController::class,'getAllasseByATeacher']);

  Route::post('teacher/getEploiTempsTeacherForAclasse', [EnseignantController::class,'getEploiTempsTeacherForAclasse']);





  // Recuperes les eleves  des classes par un enseignants (ses classes )

  Route::post('locale/getEleveclasseByTeacher', [EnseignantController::class,'getEleveclasseByTeacher']);


  Route::post('locale/getEleveclasseByTeacher', [EnseignantController::class,'getEleveclasseByTeacher']);

  // Recuperes les info eleve et son parent dans le compte local

  Route::post('locale/getEleveAndParentInfos', [StudentController::class,'getEleveAndParentInfos']);

  // Recuperes les info eleve et son parent dans le compte teacher

  Route::post('teacher/getEleveAndParentInfosTeacher', [StudentController::class,'getEleveAndParentInfosTeacher']);









// });





// Route::post('/login', [UserController::class, 'login']);

// Route::get('/login', [UserController::class, 'index']);
