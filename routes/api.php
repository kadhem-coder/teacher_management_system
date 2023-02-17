<?php
use App\Http\Controllers\api\teacher\TeacherController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/' , function(){
//     return 1;
// });
//Route::get('/' ,[TeacherController::class , "index"]);

Route::controller(TeacherController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'create');
    Route::get('/{id}', 'showbyId');
    Route::post('/{id}', 'UpdatebyId');
    Route::post('/{id}', 'Delete');

    
   // Route::post('/orders', 'store');
});