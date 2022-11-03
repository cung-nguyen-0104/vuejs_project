<?php
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\CountryController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeeDataController::class, 'countries']);
Route::get('/employees/{country}/states', [EmployeeDataController::class, 'states']);
Route::get('/employees/{state}/cities', [EmployeeDataController::class, 'cities']);
Route::get('/employees/departments', [EmployeeDataController::class, 'departments']);

Route::post('/employees', [EmployeeController::class, 'store']);
Route::get('/employees', [EmployeeController::class, 'index']);
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);
Route::get('/employees/{employee}', [EmployeeController::class, 'show']);
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);

// Route::apiResource('employees', EmployeeController::class);

Route::get('/countries', [CountryController::class, 'index']);
Route::get('/countries/{country}', [CountryController::class, 'show']);
Route::put('/countries/{country}', [CountryController::class, 'update']);
Route::post('/countries', [CountryController::class, 'store']);
Route::delete('/countries/{country}', [CountryController::class, 'destroy']);
