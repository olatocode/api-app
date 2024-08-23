<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\studentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/students', [studentController::class, 'createStudent']);
Route::get('/students', [studentController::class, 'getAllStudents']);
Route::get('/students/{id}', [studentController::class, 'getAStudent']);
Route::put('/students/{id}', [studentController::class, 'updateAStudent']);
Route::delete('/students/{id}', [studentController::class, 'deleteAStudent']);




