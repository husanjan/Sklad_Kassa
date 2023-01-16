<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Spr\SprAccountsController;
use App\Http\Controllers\Spr\SprEdsController;
use App\Http\Controllers\Spr\SprSafesController;
use App\Http\Controllers\Spr\SprShkafsController;
use App\Http\Controllers\Spr\SprQatorsController;
use App\Http\Controllers\Spr\SprCellsController;
use App\Http\Controllers\Fonds\FondEmissionsController;
use App\Http\Controllers\Ajax\AjaxController;
use App\Http\Controllers\OstatkiSafeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();




Route::group([ 'middleware' => ['auth', 'activity']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Создать Изменит Удалить роуте Ползователь роль
    Route::resource('roles', RoleController::class);
    //Создать Изменит Удалить роуте Ползователь
    Route::resource('users', UserController::class);
    //Создать Изменит Удалить роуте Справочник счетов
    Route::resource('spraccounts', SprAccountsController::class);
    //Создать Изменит Удалить роуте Справочник единиц
    Route::resource('spreds', SprEdsController::class);
    //Создать Изменит Удалить роуте Харинилише
    Route::resource('sprsafes', SprSafesController::class);
    //Создать Изменит Удалить роуте Шкаф
    Route::resource('sprshkafs', SprShkafsController::class);
    //Создать Изменит Удалить роуте Ячейка
    Route::resource('sprcell', SprCellsController::class) ;

    //Создать Изменит Удалить роуте Фонд эмиссион
    Route::resource('fondemission', FondEmissionsController::class);
    Route::resource('fondwornou', App\Http\Controllers\Fonds\WornouController::class);
    Route::resource('fondunusable', App\Http\Controllers\Fonds\UnusableController::class);
    Route::resource('fondcanceled', App\Http\Controllers\Fonds\CanceledController::class);

    Route::resource('korshoyam_tanga', App\Http\Controllers\Fonds\korshoyam_tangaController::class);

    Route::resource('farsuda_tanga', App\Http\Controllers\Fonds\Farsuda_tangaController::class);
    Route::resource('botilshuda_tanga', App\Http\Controllers\Fonds\Botilshuda_tangaController::class);
    Route::resource('oborot_tanga', App\Http\Controllers\OborotsCoinController::class);
    //Создать Изменит Удалить роуте Катор
    Route::resource('sprqators', SprQatorsController::class);
    //Создать Изменит Удалить роуте Банк справочник
    Route::resource('bank_spr', App\Http\Controllers\Spr\SprBankController::class);
    //Создать Изменит Удалить роуте Банк справочник
    Route::resource('oborot_spr', App\Http\Controllers\Aborot\AborotController::class);
    //Катор ажакс роуте
    Route::post('qatorTable',[SprCellsController::class, 'qatorTable'])->name('qatorTable.post');
    //Ajax HomeController
    Route::post('OborotTable',[HomeController::class, 'OborotTable'])->name('OborotTable.post');
    Route::post('OborotTangaTable',[HomeController::class, 'OborotTangaTable'])->name('OborotTangaTable.post');
    Route::post('FondTable',[HomeController::class, 'FondTable'])->name('FondTable.post');
    Route::post('FondTableTanga',[HomeController::class, 'FondTableTanga'])->name('FondTableTanga.post');
    Route::post('oborotInsert',[HomeController::class, 'oborotInsert'])->name('oborotInsert.post');
    //Inserrt Oborot Tanga 
    Route::post('oborotInsertTanga',[HomeController::class, 'oborotInsertTanga'])->name('oborotInsertTanga.post');
    Route::post('InsertTanga',[HomeController::class, 'InsertTanga'])->name('InsertTanga.post');

    Route::get('fetch_data',[HomeController::class, 'fetch_data']);
    Route::post('FondInsert',[HomeController::class, 'FondInsert'])->name('FondInsert.post');
    //Ячейка ажакс роуте
    Route::post('cellsTable',[SprCellsController::class, 'cellsTable'])->name('cellsTable.post');
    //Шкаф ажакс роуте
    Route::post('shkafTable',[SprQatorsController::class, 'shkafTable']) ->name('shkafTable.post');
    //Создать Изменит Удалить роуте Фонд эмиссион
    Route::resource('ostatkisafe',OstatkiSafeController::class);

});


