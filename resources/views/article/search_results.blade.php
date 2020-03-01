@extends('layouts.main')
@section('title')
    Search Results
@endsection

@section('body')

<div class="container">
        {{$results->links()}}

    @forelse ($results as $article)
    <br>
    <div class="card ">
        <div class="card-body">

            {{-- Title --}}
            <a href="/articles/{{$article->id}}"> <h3 class="font-weight-bold text-capitalize"  >{{$article->title}}</h3> </a>
            <div class="article_header">
                {{-- Date --}}
                <div class="font-italic"> {{$article->created_at}}</div>
                {{-- Authors --}}
                <div>

                    @forelse ($article->authors as $author)
                    <a class="" href="/users/{{$author->id}}"> {{$author->name}} </a>,
                    @empty
                    <p>Authors Unknown!</p>
                    @endforelse
                </div>
                

                <hr>
                <div>

                    @forelse ($article->categories as $cat)
                    {{$cat->name}} | 
                    @empty
                    
                    @endforelse
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-outline-dark">Add Bookmark</button>
            <hr>
            <div class="">
                {{-- Abstract --}}
                <h4>Abstract</h4>
                {{$article->abstract}}
                
           
            </div>
        </div>
        <hr>   
    </div>
    
    @empty
    Sorry No results found. 
    @endforelse
    {{$results->links()}}
</div>

@endsection