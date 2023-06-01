<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('/get', [SanctumApiConrollerV1::class, 'index']);
//});

//Route::get('/', [TaskController::class, 'index'])->name('tasks');
//
//Route::get('/task/create', [TaskController::class, 'create'])->name('create_task');
//
//Route::post('/task/save', [TaskController::class, 'store'])->name('save_task');
//
//Route::get('/task/show/{taskId}', [TaskController::class, 'show'])->name('task_show');
//
//Route::get('/task/edit/{taskId}', [TaskController::class, 'edit'])->name('edit_task');
//
//Route::put('/task/update/{taskId}', [TaskController::class, 'update'])->name('update_task');
//
//Route::delete('/task/delete/{taskId}', [TaskController::class, 'destroy'])->name('delete_task');
//
/***********************************************************************************************************************/



//PASSPORT -------------------------------------------------------------------------------------------------------------
Route::post('login', [App\Http\Controllers\Api\V1\PassportControllerV1::class, 'loginApi']);
Route::post('register', [App\Http\Controllers\Api\V1\PassportControllerV1::class, 'registerApi']);
Route::middleware('auth:api')->group(function () {
    Route::get('user', [App\Http\Controllers\Api\V1\PassportControllerV1::class, 'details']);
    Route::apiResource('products', App\Http\Controllers\Api\V1\PassportControllerV1::class);
});

//JWT ------------------------------------------------------------------------------------------------------------------
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', [\App\Http\Controllers\Api\V1\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\Api\V1\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\Api\V1\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\Api\V1\AuthController::class, 'me']);
});
    Route::get('/posts', [App\Http\Controllers\Api\V1\Posts::class, 'index'])->middleware('jwt.auth');


