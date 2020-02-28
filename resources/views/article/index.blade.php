<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <title>Articles</title>
</head>
<body>
<div class="container">

    @forelse ($articles as $article)
    {{$loop->index}}
    <div class="card ">
        <div class="card-body">

            {{-- Title --}}
            <a href="/articles/{{$article->id}}"> <h3 class="font-weight-bold text-capitalize"  >{{$article->title}}</h3> </a>
            <div class="article_header">
                {{-- Date --}}
                <p class="small font-italic"> {{$article->created_at}} </p> 
                <br>
                {{-- Authors --}}
            @forelse ($article->authors as $author)
            <a class="" href=""> {{$author->name}} | </a>
                @empty
                <p>No Authors!</p>
                @endforelse
            </div>
            <hr>
            <div class="">
                {{-- Abstract --}}
                <h4>Abstract</h4>
                {{$article->abstract}}
                
                {{-- Resources --}}
                <h4>Resources</h4>
                @forelse ($article->resources as $resource)
                {{$resource->type}} : <a href="#">{{$resource->url}}</a>  <br>    
                @empty
                <p>No Resources Available for this article</p>
                @endforelse
            </div>
        </div>
        <hr>   
    </div>
        @empty
        <p>That's all the articles we have.</p>
        @endforelse
        
        {{$articles->links()}}
    </div>
    </body>
    </html>