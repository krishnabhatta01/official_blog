<?php

use App\Http\Controllers\testController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/app/create_tag', [testController::class, 'create']);
Route::get('/app/get_tag', [testController::class, 'get']);
Route::post('/app/edit_tag', [testController::class, 'edit']);
Route::post('/app/delete_tag', [testController::class, 'del']);
Route::post('/app/upload', [testController::class, 'upload']);

