<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleCategory;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $user = User::find(Auth::id());
        $categories = Category::all();
        $types = DB::select('SELECT * FROM article_type');
        return view('article.create',compact('categories','types','user'));
    }

    public function show($article_id)
    {
        $article = Article::find($article_id);
        return view('article.show',compact('article'));
    }

    public function edit($article_id)
    {
        $article = Article::find($article_id);
        $categories = Category::all();
        $types =DB::select('SELECT * FROM article_type');

        return view('article.edit',compact('article','types','categories'));        
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'article_type' => 'required',
        ]);
        
        $article = new Article;
        $article->title = $request->input('title');
        $article->article_type = $request->input('article_type');
        $article->abstract = $request->input('abstract');
        $article->save();
        
        DB::table('article_authors')->insert(
            ['article_id' => $article->id,
             'author_id' => Auth::id()
            ]
        );
        
        
        return redirect('/articles/edit/'.$article->id);
    }
    public function update(Request $request,$article_id)
    {
        $this->validate($request,
        [
            'title' => 'required',
            'article_type' => 'required',
        ]);
        
        $article = Article::find($article_id);
        $article->title = $request->input('title');
        $article->article_type = $request->input('article_type');
        $article->abstract = $request->input('abstract');
        $article->update();
        
        return redirect('/articles/'.$article_id);
    }

    public function editResources($article_id)
    {
        $article = Article::find($article_id);
        $images = $article->images;
        $docs = $article->documents;

        return view('article.edit_resources',compact('article_id','docs','images'));
    }
    
    public function editAuthors($article_id)
    {
        $authors = Article::find($article_id)->authors;
        return view('article.edit_authors',compact('authors'));
    }

    public function search(Request $request)
    {
        $results = Article::where('title','like','%'.$request->input('title').'%')->paginate(10);
        return view('article.search_results',compact('results'));
        // return 123;
        //return 'searchasd';
    }
}
