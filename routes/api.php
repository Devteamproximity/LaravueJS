<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

// Route::post('/login', [UserController::class, 'login']);

Route::get('/login', [UserController::class, 'index']);

Route:: post('admin/upload',[EtablissementController::class, 'upload']);


Route:: post('admin/delateImage',[EtablissementController::class, 'delateImage']);

//  Ajouter un  etalissement

Route:: post('admin/addEtablissement',[EtablissementController::class, 'addEtablissement']);

//  Recuperer tous les etalissements 

Route:: get('admin/getAllEtablissement',[EtablissementController::class, 'getAllEtablissement']);

//  supprimer  un  etalissement

Route:: post('admin/delateEtablissement',[EtablissementController::class, 'delateEtablissement']);

// Modifier un etablissement 

Route:: post('admin/updateEtablissement',[EtablissementController::class, 'updateEtablissement']);

