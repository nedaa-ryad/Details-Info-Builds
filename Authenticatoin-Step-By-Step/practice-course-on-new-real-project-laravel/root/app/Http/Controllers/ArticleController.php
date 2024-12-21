<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function createArticle(Request $request)
    {
        // this will return the user data that sent the request by the token that he has in the header of the request-- this token send when the user login success by logic Login into GeneralController.php --- but I've an error with use ::createToken to create the token but I'll solve this
        dd($request->user());

        // to create a new article
        $article = Article::create([
            'title' => 'Article Title 2',
            'body' => 'Article Body 3'
        ]);

        return $article;
    }

    Public function getArticles()
    {
        $articles = Article::all();

        return $articles;
    }

    public function articleData($id)
    {
        $articleData = Article::find($id);

        return $articleData;
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);

        $article->delete();

        return 'Article Deleted';
    }

    // we use the Request class to get the data that the user sends to the server
    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);

        $title = $request->title;
        $body = $request->body;

        $article->title = $title;
        $article->body = $body;

        $article->save();

        return $article;
    }

}
