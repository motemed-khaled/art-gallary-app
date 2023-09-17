<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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







    Route::group(
        [
            'namespace' => 'App\Http\Controllers',
            'middleware' => 'api',
        ],
        function () {

            // Auth routes
            Route::group(
                [
                    'prefix' => 'auth',
                ],
                function () {
                    Route::post('register', 'AuthController@register');
                    Route::post('login', 'AuthController@login');
                }
            );

          // Categories routes group
            Route::group(
               [
                'prefix' => 'categories',
               ],
               function () {
                Route::get('/', 'CategoryController@index');
                Route::get('/{id}', 'CategoryController@findById');
                Route::post('/', 'CategoryController@create')->middleware(['auth:sanctum','admin']);
                Route::put('/', 'CategoryController@update')->middleware(['auth:sanctum','admin']);
                Route::delete('/{id}', 'CategoryController@delete')->middleware(['auth:sanctum','admin']);
        }
    );

            // Products routes group
            Route::group(
                [
                    'prefix' => 'products',
                ],
                function () {
                    Route::get('/', 'ProductController@index');
                    Route::get('/{id}', 'ProductController@findById');
                    Route::post('/', 'ProductController@create')->middleware(['auth:sanctum','admin']);
                    Route::put('/{id}', 'ProductController@update')->middleware(['auth:sanctum','admin']);
                    Route::delete('/{id}', 'ProductController@delete')->middleware(['auth:sanctum','admin']);
                }
            );

               // Carts routes group
               Route::group(
                [
                    'prefix' => 'carts',
                ],
                function () {
                    Route::get('/', 'CartController@index')->middleware(['auth:sanctum','admin']);
                    Route::post('/add-item', 'CartController@addItem')->middleware(['auth:sanctum']);
                    Route::get('/{id}', 'CartController@show')->middleware(['auth:sanctum']);
                    Route::delete('/remove-item', 'CartController@removeItem')->middleware(['auth:sanctum']);
                }
            );

                // Users routes group
                Route::group(
                    [
                        'prefix' => 'users',
                        'middleware'=>(['auth:sanctum','admin']),
                    ],
                    function () {
                        Route::get('/', 'UserController@index');
                        Route::post('/', 'UserController@createUser');
                        Route::get('/{id}', 'UserController@findById');
                        Route::delete('/{id}', 'UserController@delete');
                    }
                );


        }
    );


