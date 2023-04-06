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

/* tag section routes */
Route::post('/create_tag', [testController::class, 'create']);
Route::get('/get_tag', [testController::class, 'get']);
Route::post('/edit_tag', [testController::class, 'edit']);
Route::post('/delete_tag', [testController::class, 'del']);

/* category section routes */
Route::post('/upload', [testController::class, 'upload']);
Route::post('/delete_image', [testController::class, 'deleteImage']);
Route::post('/add_category', [testController::class, 'addCategory']);
Route::get('/get_category', [testController::class, 'getCategory']);
Route::post('/edit_category', [testController::class, 'editCategory']);