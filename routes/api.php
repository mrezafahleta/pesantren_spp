<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiStudentsController;
use App\Http\Controllers\Api\ApiUserController;
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

Route::post('login', [ApiAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {


    Route::get('user', [ApiUserController::class, 'getDataUser']);
    Route::get('sppApiStudents', [ApiStudentsController::class, 'getDataStudents']);
    Route::get('sppApiStudent/{student:nim}/detailsiswa', [ApiStudentsController::class, 'student']);

    Route::get('sppApiDetailStudent/{nim}', [ApiStudentsController::class, 'detailStudent']);
});

// Route::get('user', [ApiUserController::class, 'getDataUser']);
// Route::get('sppApiStudents', [ApiStudentsController::class, 'getDataStudents']);
