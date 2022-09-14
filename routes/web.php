<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\AddWarehouseController;
use App\Http\Controllers\ListAllWarehouseController;

use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\ListAllRoomController;

use App\Http\Controllers\AddRackController;
use App\Http\Controllers\ListAllRackController;

use App\Http\Controllers\AddBoxController;
use App\Http\Controllers\ListAllBoxController;

use App\Http\Controllers\AddFileController;
use App\Http\Controllers\ListAllFileController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home',[HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/{id}',[DashboardController::class,'show']);
Route::post('/dashboard',[DashboardController::class,'store']);

//Route::post('/room',[DashboardController::class,'room']);/////////////////////////
//Route::post('/rack',[DashboardController::class,'rack']);/////////////////////////
//Route::post('/box',[DashboardController::class,'box']);/////////////////////////

Route::get('/addwarehouse',[AddWarehouseController::class,'index']);
Route::post('/addwarehouse',[AddWarehouseController::class,'store']);
Route::get('/addwarehouse/{id}',[AddWarehouseController::class,'show']);

Route::get('/listallwarehouse',[ListAllWarehouseController::class,'index']);
Route::get('/listallwarehouse/{id}',[ListAllWarehouseController::class,'show']);
Route::get('/delete/{id}',[ListAllWarehouseController::class,'destroy']);
Route::get('/edit/{id}',[ListAllWarehouseController::class,'edit']);
Route::put('/update',[ListAllWarehouseController::class,'update']);

Route::get('/addroom',[AddRoomController::class,'index']);
Route::post('/addroom',[AddRoomController::class,'store']);
Route::get('/addroom/{id}',[AddRoomController::class,'show']);

Route::get('/listallroom',[ListAllRoomController::class,'index']);
Route::get('/listallroom/{id}',[ListAllRoomController::class,'show']);
Route::get('/delete/{id}',[ListAllRoomController::class,'destroy']);

Route::get('/addrack',[AddRackController::class,'index']);
Route::post('/addrack',[AddRackController::class,'store']);

Route::post('/room',[AddRackController::class,'room']);/////////////////////////

Route::get('/addrack/{id}',[AddRackController::class,'show']);

Route::get('/listallrack',[ListAllRackController::class,'index']);
Route::get('/listallrack/{id}',[ListAllRackController::class,'show']);
Route::get('/delete/{id}',[ListAllRackController::class,'destroy']);

Route::get('/addbox',[AddBoxController::class,'index']);
Route::post('/addbox',[AddBoxController::class,'store']);

Route::post('/room',[AddBoxController::class,'room']);/////////////////////////
Route::post('/rack',[AddBoxController::class,'rack']);/////////////////////////

Route::get('/addbox/{id}',[AddBoxController::class,'show']);


Route::get('/listallbox',[ListAllBoxController::class,'index']);
Route::get('/listallbox/{id}',[ListAllBoxController::class,'show']);
Route::get('/delete/{id}',[ListAllBoxController::class,'destroy']);

Route::get('/addfile',[AddFileController::class,'index']);
Route::post('/addfile',[AddFileController::class,'store']);

Route::post('/room',[AddFileController::class,'room']);/////////////////////////
Route::post('/rack',[AddFileController::class,'rack']);/////////////////////////
Route::post('/box',[AddFileController::class,'box']);/////////////////////////

Route::get('/addfile/{id}',[AddFileController::class,'show']);

Route::get('/listallfile',[ListAllFileController::class,'index']);
Route::get('/listallfile/{id}',[ListAllFileController::class,'show']);
Route::get('/delete/{id}',[ListAllFileController::class,'destroy']);




