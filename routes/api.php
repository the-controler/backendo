<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
/*
Route::group([
    'middleware' => 'api',
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
    Route::post('resetPassword', 'ChangePasswordController@process');


});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register','App\Http\Controllers\UserControler@register');

Route::post('login','App\Http\Controllers\UserControler@login');
//Gestion
Route::get('getrole','App\Http\Controllers\UserControler@getrole');
// Get all Users
Route::get('getUser', 'App\Http\Controllers\UserControler@getUser');
// Get all Reservations
Route::get('reservations', 'App\Http\Controllers\ReservationController@getReservation');
// Add Reservation
Route::post('addReservation', 'App\Http\Controllers\ReservationController@addReservation');

// Update Reservation
Route::put('updateReservation/{id}', 'App\Http\Controllers\ReservationController@updateReservation');

// Delete Reservation
Route::delete('deleteReservation/{id}', 'App\Http\Controllers\ReservationController@deleteReservation');

// Get Specic Reservation detail
Route::get('Reservation/{id}', 'App\Http\Controllers\ReservationController@getReservationById');

// Get last inserted Client id
Route::get('last/getClientId', 'App\Http\Controllers\ClientController@getClientId');
// Get last inserted Anivv id
Route::get('last/getAnnivId', 'App\Http\Controllers\AnniversaireController@getAnnivId');
// Get last inserted res anniv basic id
Route::get('last/basicreservaniv', 'App\Http\Controllers\ReservationController@basicreservaniv');
// Get last inserted res anniv pro id
Route::get('last/proreservaniv', 'App\Http\Controllers\ReservationController@proreservaniv');
// Get last res made table:
Route::get('last/res', 'App\Http\Controllers\ReservationController@lastres');
// Get last client table:
Route::get('last/cli', 'App\Http\Controllers\ClientController@lastcli');
// Get last anniv made table:
Route::get('last/aniv', 'App\Http\Controllers\AnniversaireController@lastaniv');
// Get last package selected table:
Route::get('last/pack', 'App\Http\Controllers\PackageController@lastpachage');

///////////////////////////////////////////////////////////////////////////////////////////////

    // Get all Traiteurs
Route::get('traiteurs', 'App\Http\Controllers\TraiteurController@getTraiteur');
// Add Traiteur
Route::post('addTraiteur', 'App\Http\Controllers\TraiteurController@addTraiteur');

// Update Traiteur
Route::put('updateTraiteur/{id}', 'App\Http\Controllers\TraiteurController@updateTraiteur');

// Delete Traiteur
Route::delete('deleteTraiteur/{id}', 'App\Http\Controllers\TraiteurController@deleteTraiteur');

// Get Specic Traiteur detail
Route::get('Traiteur/{id}', 'App\Http\Controllers\TraiteurController@getTraiteurById');

Route::post('file_tr','App\Http\Controllers\TraiteurController@file');

////////////////////////////////////////////////////////////////////////////////////

// Get all Clients
Route::get('clients', 'App\Http\Controllers\ClientController@getClient');
// Add Client
Route::post('addClient', 'App\Http\Controllers\ClientController@addClient');

// Update Client
Route::put('updateClient/{id}', 'App\Http\Controllers\ClientController@updateClient');

// Delete Client
Route::delete('deleteClient/{id}', 'App\Http\Controllers\ClientController@deleteClient');

// Get Specic Client detail
Route::get('Client/{id}', 'App\Http\Controllers\ClientController@getClientById');

// Get last inserted Client id
Route::get('last/getClientId', 'App\Http\Controllers\ClientController@getClientId');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Orchestres
Route::get('orchestres', 'App\Http\Controllers\OrchestreController@getOrchestre');
// Add Orchestre
Route::post('addOrchestre', 'App\Http\Controllers\OrchestreController@addOrchestre');

// Update Orchestre
Route::put('updateOrchestre/{id}', 'App\Http\Controllers\OrchestreController@updateOrchestre');

// Delete Orchestre
Route::delete('deleteOrchestre/{id}', 'App\Http\Controllers\OrchestreController@deleteOrchestre');

// Get Specic Orchestre detail
Route::get('Orchestre/{id}', 'App\Http\Controllers\OrchestreController@getOrchestreById');

Route::post('file_or','App\Http\Controllers\OrchestreController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Salles
Route::get('salles', 'App\Http\Controllers\SalleController@getSalle');
// Add Salle
Route::post('addSalle', 'App\Http\Controllers\SalleController@addSalle');

// Update Salle
Route::put('updateSalle/{id}', 'App\Http\Controllers\SalleController@updateSalle');

// Delete Salle
Route::delete('deleteSalle/{id}', 'App\Http\Controllers\SalleController@deleteSalle');

// Get Specic Salle detail
Route::get('Salle/{id}', 'App\Http\Controllers\SalleController@getSalleById');

Route::post('file_sa','App\Http\Controllers\SalleController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Cameramans
Route::get('cameramans', 'App\Http\Controllers\CameramanController@getCameraman');
// Add Cameraman
Route::post('addCameraman', 'App\Http\Controllers\CameramanController@addCameraman');

// Update Cameraman
Route::put('updateCameraman/{id}', 'App\Http\Controllers\CameramanController@updateCameraman');

// Delete Cameraman
Route::delete('deleteCameraman/{id}', 'App\Http\Controllers\CameramanController@deleteCameraman');

// Get Specic Cameraman detail
Route::get('Cameraman/{id}', 'App\Http\Controllers\CameramanController@getCameramanById');

Route::post('file_ca','App\Http\Controllers\CameramanController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Tartes
Route::get('tartes', 'App\Http\Controllers\TarteController@getTarte');
// Add Tarte
Route::post('addTarte', 'App\Http\Controllers\TarteController@addTarte');

// Update Tarte
Route::put('updateTarte/{id}', 'App\Http\Controllers\TarteController@updateTarte');

// Delete Tarte
Route::delete('deleteTarte/{id}', 'App\Http\Controllers\TarteController@deleteTarte');

// Get Specic Tarte detail
Route::get('Tarte/{id}', 'App\Http\Controllers\TarteController@getTarteById');

Route::post('file_ta','App\Http\Controllers\TarteController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Zianas
Route::get('zianas', 'App\Http\Controllers\ZianaController@getZiana');
// Add Ziana
Route::post('addZiana', 'App\Http\Controllers\ZianaController@addZiana');

// Update Ziana
Route::put('updateZiana/{id}', 'App\Http\Controllers\ZianaController@updateZiana');

// Delete Ziana
Route::delete('deleteZiana/{id}', 'App\Http\Controllers\ZianaController@deleteZiana');

// Get Specic Ziana detail
Route::get('Ziana/{id}', 'App\Http\Controllers\ZianaController@getZianaById');

Route::post('file_zi','App\Http\Controllers\ZianaController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Voitures
Route::get('voitures', 'App\Http\Controllers\VoitureController@getVoiture');
// Add Voiture
Route::post('addVoiture', 'App\Http\Controllers\VoitureController@addVoiture');

// Update Voiture
Route::put('updateVoiture/{id}', 'App\Http\Controllers\VoitureController@updateVoiture');

// Delete Voiture
Route::delete('deleteVoiture/{id}', 'App\Http\Controllers\VoitureController@deleteVoiture');

// Get Specic Voiture detail
Route::get('Voiture/{id}', 'App\Http\Controllers\VoitureController@getVoitureById');

Route::post('file_vo','App\Http\Controllers\VoitureController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Hotels
Route::get('hotels', 'App\Http\Controllers\HotelController@getHotel');
// Add Hotel
Route::post('addHotel', 'App\Http\Controllers\HotelController@addHotel');

// Update Hotel
Route::put('updateHotel/{id}', 'App\Http\Controllers\HotelController@updateHotel');

// Delete Hotel
Route::delete('deleteHotel/{id}', 'App\Http\Controllers\HotelController@deleteHotel');

// Get Specic Hotel detail
Route::get('Hotel/{id}', 'App\Http\Controllers\HotelController@getHotelById');

Route::post('file_ho','App\Http\Controllers\HotelController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Lebsas
Route::get('lebsas', 'App\Http\Controllers\LebsaController@getLebsa');
// Add Lebsa
Route::post('addLebsa', 'App\Http\Controllers\LebsaController@addLebsa');

// Update Lebsa
Route::put('updateLebsa/{id}', 'App\Http\Controllers\LebsaController@updateLebsa');

// Delete Lebsa
Route::delete('deleteLebsa/{id}', 'App\Http\Controllers\LebsaController@deleteLebsa');

// Get Specic Lebsa detail
Route::get('Lebsa/{id}', 'App\Http\Controllers\LebsaController@getLebsaById');

Route::post('file_le','App\Http\Controllers\LebsaController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Fetetypes
Route::get('fetetypes', 'App\Http\Controllers\FetetypeController@getFetetype');
// Add Fetetype
Route::post('addFetetype', 'App\Http\Controllers\FetetypeController@addFetetype');

// Update Fetetype
Route::put('updateFetetype/{id}', 'App\Http\Controllers\FetetypeController@updateFetetype');

// Delete Fetetype
Route::delete('deleteFetetype/{id}', 'App\Http\Controllers\FetetypeController@deleteFetetype');

// Get Specic Fetetype detail
Route::get('Fetetype/{id}', 'App\Http\Controllers\FetetypeController@getFetetypeById');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Packages
Route::get('packages', 'App\Http\Controllers\PackageController@getPackage');
// Add Package
Route::post('addPackage', 'App\Http\Controllers\PackageController@addPackage');

// Update Package
Route::put('updatePackage/{id}', 'App\Http\Controllers\PackageController@updatePackage');

// Delete Package
Route::delete('deletePackage/{id}', 'App\Http\Controllers\PackageController@deletePackage');

// Get Specic Package detail
Route::get('Package/{id}', 'App\Http\Controllers\PackageController@getPackageById');


///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Mariages
Route::get('mariages', 'App\Http\Controllers\MariageController@getMariage');
// Add Mariage
Route::post('addMariage', 'App\Http\Controllers\MariageController@addMariage');

// Update Mariage
Route::put('updateMariage/{id}', 'App\Http\Controllers\MariageController@updateMariage');

// Delete Mariage
Route::delete('deleteMariage/{id}', 'App\Http\Controllers\MariageController@deleteMariage');

// Get Specic Mariage detail
Route::get('Mariage/{id}', 'App\Http\Controllers\MariageController@getMariageById');


///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Anniversaires
Route::get('anniversaires', 'App\Http\Controllers\AnniversaireController@getAnniversaire');
// Add Anniversaire
Route::post('addAnniversaire', 'App\Http\Controllers\AnniversaireController@addAnniversaire');

// Update Anniversaire
Route::put('updateAnniversaire/{id}', 'App\Http\Controllers\AnniversaireController@updateAnniversaire');

// Delete Anniversaire
Route::delete('deleteAnniversaire/{id}', 'App\Http\Controllers\AnniversaireController@deleteAnniversaire');

// Get Specic Anniversaire detail
Route::get('Anniversaire/{id}', 'App\Http\Controllers\AnniversaireController@getAnniversaireById');


///////////////////////////////////////////////////////////////////////////////////////////////
// Get all fete_de_naissances
Route::get('fete_de_naissances', 'App\Http\Controllers\FeteDeNaissanceController@getfete_de_naissance');
// Add fete_de_naissance
Route::post('addfete_de_naissance', 'App\Http\Controllers\FeteDeNaissanceController@addfete_de_naissance');

// Update fete_de_naissance
Route::put('updatefete_de_naissance/{id}', 'App\Http\Controllers\FeteDeNaissanceController@updatefete_de_naissance');

// Delete fete_de_naissance
Route::delete('deletefete_de_naissance/{id}', 'App\Http\Controllers\FeteDeNaissanceController@deletefete_de_naissance');

// Get Specic fete_de_naissance detail
Route::get('fete_de_naissance/{id}', 'App\Http\Controllers\FeteDeNaissanceController@getfete_de_naissanceById');


///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Funeraires
Route::get('funeraires', 'App\Http\Controllers\FuneraireController@getFuneraire');
// Add Funeraire
Route::post('addFuneraire', 'App\Http\Controllers\FuneraireController@addFuneraire');

// Update Funeraire
Route::put('updateFuneraire/{id}', 'App\Http\Controllers\FuneraireController@updateFuneraire');

// Delete Funeraire
Route::delete('deleteFuneraire/{id}', 'App\Http\Controllers\FuneraireController@deleteFuneraire');

// Get Specic Funeraire detail
Route::get('Funeraire/{id}', 'App\Http\Controllers\FuneraireController@getFuneraireById');


///////////////////////////////////////////////////////////////////////////////////////////////
// Get all PackBasics
Route::get('pack_basics', 'App\Http\Controllers\PackBasicController@getPackBasic');
// Add PackBasic
Route::post('addPackBasic', 'App\Http\Controllers\PackBasicController@addPackBasic');

// Update PackBasic
Route::put('updatePackBasic/{id}', 'App\Http\Controllers\PackBasicController@updatePackBasic');

// Delete PackBasic
Route::delete('deletePackBasic/{id}', 'App\Http\Controllers\PackBasicController@deletePackBasic');

// Get Specic PackBasic detail
Route::get('PackBasic/{id}', 'App\Http\Controllers\PackBasicController@getPackBasicById');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Diners
Route::get('diners', 'App\Http\Controllers\DinerController@getDiner');
// Add Diner
Route::post('addDiner', 'App\Http\Controllers\DinerController@addDiner');

// Update Diner
Route::put('updateDiner/{id}', 'App\Http\Controllers\DinerController@updateDiner');

// Delete Diner
Route::delete('deleteDiner/{id}', 'App\Http\Controllers\DinerController@deleteDiner');

// Get Specic Diner detail
Route::get('Diner/{id}', 'App\Http\Controllers\DinerController@getDinerById');

Route::post('file_D','App\Http\Controllers\DinerController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
/*// Get all Mariages
Route::get('mariages', 'App\Http\Controllers\MariageController@getMariage');
// Add Mariage
Route::post('addMariage', 'MariageController@addMariage');

// Update Mariage
Route::put('updateMariage/{id}', 'MariageController@updateMariage');

// Delete Mariage
Route::delete('deleteMariage/{id}', 'MariageController@deleteMariage');

// Get Specic Client detail
Route::get('Client/{id}', 'App\Http\Controllers\ClientController@getClientById');

Route::post('file_or','App\Http\Controllers\OrchestreController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Mariages
Route::get('mariages', 'MariageController@getMariage');
// Add Mariage
Route::post('addMariage', 'MariageController@addMariage');

// Update Mariage
Route::put('updateMariage/{id}', 'MariageController@updateMariage');

// Delete Mariage
Route::delete('deleteMariage/{id}', 'MariageController@deleteMariage');

// Get Specic Client detail
Route::get('Client/{id}', 'App\Http\Controllers\ClientController@getClientById');

Route::post('file_or','App\Http\Controllers\OrchestreController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
// Get all Mariages
Route::get('mariages', 'MariageController@getMariage');
// Add Mariage
Route::post('addMariage', 'MariageController@addMariage');

// Update Mariage
Route::put('updateMariage/{id}', 'MariageController@updateMariage');

// Delete Mariage
Route::delete('deleteMariage/{id}', 'MariageController@deleteMariage');

// Get Specic Client detail
Route::get('Client/{id}', 'App\Http\Controllers\ClientController@getClientById');

Route::post('file_or','App\Http\Controllers\OrchestreController@file');

///////////////////////////////////////////////////////////////////////////////////////////////
*/
