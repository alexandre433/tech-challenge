<?php

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

Route::resources([
    'genres' => GenreController::class,
    'movies' => MovieController::class,
    'actors' => ActorController::class,
]);

Route::group(
    [
        'prefix' => 'actors',
        'name' => 'actors',
    ],
    function () {
        Route::get('{actor}/appearances', 'ActorController@appearances')->name('actors.appearances');
    }
);

Route::group(['prefix' => 'genres'], function () {
    Route::get('{genre}/actors', 'GenreController@actors')->name('genres.actors');
});
