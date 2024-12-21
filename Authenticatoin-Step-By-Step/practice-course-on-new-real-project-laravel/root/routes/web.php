<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ArticleController;

// Route >>  is the class used for defining routes,, Class::typeOfRequest [get, post, put\patch, delete]

// ::get() >>  is a static method of the Route class for handling GET requests.

// '/' >> is the URL path that the route responds to and the URL endpoint that the user accesses

// function >> The function contains the logic that determines what response is returned when the path is accessed. In this case, it returns the welcome view.

// >>  we can return Blade templates in two ways in Laravel:
    // [1] :: view() >> helper function that returns a view. In this case, it returns the welcome view.
        //  return view('welcome');

    // [2] :: Using the View facade:
            // use Illuminate\Support\Facades\View;
            // return View::make('greeting', ['name' => 'James']);


// we have 2 ways to import the GeneralController class ::
    // [1] :: [GeneralController::class, 'welcome' ]
    // [2] :: GeneralController::class . '@welcome'




// Route::get('/', [GeneralController::class, 'welcome' ]);
    // OR
Route::get('/', GeneralController::class . '@welcome' );

Route::get('/test', function () {
    return View::make('test', ['name' => 'Nedaa Ryad', 'age' => 20]);
});

Route::post('/create', [ArticleController::class, 'createArticle'])->name('createArticle')->middleware('auth:sanctum');
    // this middle to check if the user is authenticated or not --- this middleware is used to protect the route and to make sure that the user is authenticated before accessing the route


Route::get('/articles', [ArticleController::class, 'getArticles'])->name('articles');

Route::get('/article/{id}', [ ArticleController::class, 'ArticleData' ])->name('articleData');

Route::delete('/article/{id}', [ ArticleController::class, 'deleteArticle' ])->name('deleteArticle');

Route::put('/article/{id}', [ ArticleController::class, 'updateArticle' ])->name('updateArticle');


Route::post('/login', [ GeneralController::class, 'login' ])->name('login');

Route::post('/register', [ GeneralController::class, 'register' ])->name('register');
