<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Chofer;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('verificar-carnet', function(Request $request) {
    $result = Chofer::verificarCarnet($request->query('carnet'));
    return response()->json($result, $result['success'] ? 200 : 400);
});

Route::post('verificar-carnet', function(Request $request) {
    $result = Chofer::verificarCarnet($request->input('carnet'));
    return response()->json($result, $result['success'] ? 200 : 400);
});