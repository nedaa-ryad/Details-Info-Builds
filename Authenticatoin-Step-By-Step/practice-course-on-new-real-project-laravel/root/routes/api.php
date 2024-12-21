<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// the route into browser >> http://localhost:8000/api/user
// xxxxxx > the wrong if write the route into browser >> http://localhost:8000/user
Route::get('/', function() {
    return "hello from api";
});