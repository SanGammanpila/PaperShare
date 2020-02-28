<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // $article = Article::find(1);
        // // dd($article->categories);
        // // foreach ($article->categories as $c) {
        // //     echo $c->name.'<br>';
        // // }
        // // return $articles;

        // $category = Category::find(1);

        // // dd($category->articles);

        // foreach ($category->articles as $a) 
        // {
        //     echo $a->title;
        // }

        // foreach(Article::find(1)->comments as $cmt)
        // {
        //     echo $cmt->body;
        // }
        // foreach(Article::find(1)->resources as $r)
        // {
        //     echo $r->type.' ::: '.$r->url.'<br>';
        // }


        // foreach(Article::find(1)->authors as $a)
        // {
        //     echo $a->name;
        // }

        // if ($re) {
        //     # code...
        // }


        $articles = Article::paginate(10);
        return view('article.index',compact('articles'));
        
    }

    public function create()
    {
        return view('article.create');
    }

    public function show($article_id)
    {
        $article = Article::find($article_id);
        return view('article.show',compact('article'));
    }

    public function edit($article_id)
    {
        $article = Article::find($article_id);
        return view('article.edit',compact('article'));        
    }
}
