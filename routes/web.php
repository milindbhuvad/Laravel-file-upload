<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUplaodController;

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

Route::get('/upload', function () {
    return view('upload');
});
Route::post('/upload', [FileUplaodController::class, 'upload']);
Route::post('/files-upload', [FileUplaodController::class, 'multiple_uploads']);
