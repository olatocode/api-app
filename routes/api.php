<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\authController;
use App\Http\Controllers\Api\userController;
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
Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);




Route::middleware('auth:sanctum')->group(function () {
// student
Route::post('/students', [studentController::class, 'createStudent']);
Route::get('/students/{id}', [studentController::class, 'getAStudent']);
Route::put('/students/{id}', [studentController::class, 'updateAStudent']);
Route::delete('/students/{id}', [studentController::class, 'deleteAStudent']);
Route::get('/students', [studentController::class, 'getAllStudents']);

// user profile
Route::get('/profile', [userController::class, 'profile']);
Route::post('/logout', [authController::class, 'logout']);
});





