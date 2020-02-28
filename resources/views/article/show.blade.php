<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{-- Article Name --}}
    <title>{{$article->title}}</title>
</head>
<body>
    <div class="container">

        <h2>{{$article->title}}</h2>
        @forelse ($article->authors as $author)
        <a class="" href=""> {{$author->name}} | </a>
        @empty
        <p>No Authors!</p>
        @endforelse
        <small class="text-muted">{{$article->created_at}}</small>
        <h4>Abstract</h4>
        {{$article->abstract}}
        
        <div>
            {{-- images --}}
            <hr>
        @forelse ($article->images as $image)
        <a href="">
            <img  src="/storage/images/{{$image->url}}" class="preview img-thumbnail"> 
        </a>
        @empty
        No Images
        @endforelse
    </div>
    
    <div>
        {{-- links --}}
    </div>
    
    <div>
        {{-- documents --}}
        @forelse ($article->documents as $doc)
            {{$doc->url}}
        @empty
           <p>No Documents For this Article</p> 
        @endforelse
    </div>

    {{-- Comments --}}
        <div class="jumbotron jumbotron-fluid">
                {{-- <div class="container shadow-sm p-3 mb-5 bg-white rounded"> --}}
                <div class="container">
                    <div class=""> <h3>Comments </h3></div>
                
                    <div class="form-group">
                            <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Comment</span>
                                    </div>
                                    <textarea class="form-control" aria-label="With textarea"></textarea>
                                </div>
                    </div>
                    <button id="add" onclick="addComment()" class="btn btn-dark">Comment</button>      
                
                    <div id="comments">

                            @forelse ($article->comments as $comment)
                            <div class="shadow-sm rounded p-3 mb-2 bg-light">
                                    <h5>{{$comment->user['name']}}</h5>
                                    <p><i class="fas  fa-comment-alt "></i> {{$comment->body}}</p>
                                    <p><small class="text-muted">{{$comment->created_at}}</small></p>
                                    {{-- <button type="button" comment_id = {{$comment->comment_id}} , onclick='deleteComment(this.getAttribute("comment_id"))' class="btn btn-link text-danger">Delete</button> --}}
                            </div>
                                @empty
                                <p>No Comments yet :(</p>
                                @endforelse
{{-- 

                        @if (count($comments)>0)
                        @foreach ($comments as $comment)
                        <div class="shadow-sm rounded p-3 mb-2 bg-light">
                            <h5>{{$comment->name}}</h5>
                            <p><i class="fas  fa-comment-alt "></i> {{$comment->comment_body}}</p>
                            <p><small class="text-muted">{{$comment->comment_date}}</small></p>
                            <button type="button" comment_id = {{$comment->comment_id}} , onclick='deleteComment(this.getAttribute("comment_id"))' class="btn btn-link text-danger">Delete</button>
                        </div>
                        @endforeach
                        @endif --}}
                    </div>
                </div>


















    </div>
    </body>
    </html>