<?php

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\V1\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\ImageManipulation;

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

 
Route::get('articles', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Article::all();
});
 
Route::get('articles/{id}', function($id) {
    return Article::find($id);
});

Route::post('articles', function(Request $request) {
    return Article::create($request->all);
});

Route::put('articles/{id}', function(Request $request, $id) {
    $article = Article::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('articles/{id}', function($id) {
    Article::find($id)->delete();

    return 204;
});


Route::post('register', [RegisterController::class,'register']);

Route::post('login', [LoginController::class,'login']);
Route::post('logout', [LoginController::class,'logout']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api resourse




Route::prefix('v1')->group(function(){
    Route::apiResource('album',AlbumController::class);
    Route::get('image',[ImageManipulation::class,'index']);
    Route::get('image/{image}',[ImageManipulation::class,'show']);
    Route::post('image/resize',[ImageManipulation::class,'resize']);
    Route::delete('image/{image}',[ImageManipulation::class,'destroy']);
    Route::get('image/by-album/{album}',[ImageManipulation::class,'byAlbum']);
});