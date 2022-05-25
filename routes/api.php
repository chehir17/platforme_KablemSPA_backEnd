<?php

use Illuminate\Http\Request;

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

Route::get('/cnq', 'SuiviclientController@cnq_mon');
Route::get('/ppm1', 'SuiviclientController@ppm1');
Route::get('/ppm2', 'SuiviclientController@ppm2');
Route::get('/ppm3', 'SuiviclientController@ppm3');
Route::get('/ppm4', 'SuivifournisseurController@ppm4');

Route::resource('/suiviClients', 'SuiviclientController');
Route::resource('/scrap', 'ScrapController');
Route::resource('/dmpp', 'DmppController');
Route::resource('/piece', 'PieceController');

Route::resource('/rapportnc', 'RapportncController');
Route::resource('/ac_ap', 'AcApController');
Route::resource('/fournisseur', 'FournisseurController');


Route::resource('/departements', 'DepartementController');
Route::resource('/client', 'ClientController');
Route::resource('/lot', 'LotController');
Route::resource('/ligne', 'LigneController');
Route::resource('/user', 'UserController');
Route::resource('/op', 'OperateurController');
Route::resource('/planActions', 'PlanactionController');
Route::resource('/action', 'ActionController');

Route::resource('/suiviFournisseurs', 'SuivifournisseurController');
Route::resource('/suiviSuperControles', 'SupercontroleController');

/// 
Route::get('/bydep_retard', 'PlanactionController@bydep_retard');
Route::get('/actionOnRetard', 'PlanactionController@actionOnRetard');
Route::get('/actionDone', 'PlanactionController@actionDone');

Route::get('/bydep', 'PlanactionController@bydep');
Route::get('/bydep1', 'PlanactionController@bydep1');
Route::put('/status/{id}', 'PlanactionController@update1');

Route::get('/byuser/{id}', 'PlanactionController@byuser');
Route::get('/index100', 'PlanactionController@index100');


Route::resource('/articles', 'ArticleController');
Route::resource('/lots', 'LotController');
Route::post("/user-login", "UserController@userLogin");

/////

Route::get('/ar_for_add', 'ArticleController@getforadd');
Route::get('/sf_for_add', 'SuivifournisseurController@getforadd');

Route::resource('/addNotif', 'NotificationController');
Route::get('/affiche', 'NotificationController@afficheToResponsable');
