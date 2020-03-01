
    @extends('layouts.main')

    @section('title')
    {{$article->title}}
    @endsection

    @section('body')
    <div class="container">

            <h2 class="text-capitalize">{{$article->title}}</h2>
            by @forelse ($article->authors as $author)
            <a class="" href="/users/{{$author->id}}">{{$author->name}}</a> ,
            @empty
            <p>Authors Unknown!</p>
            @endforelse
            <small class="text-muted">{{$article->created_at}}</small>
            <hr>
            <h4>Abstract</h4>
            {{$article->abstract}}
            
            <div>
                {{-- images --}}
                <hr>
            @forelse ($article->images as $image)
            <a href="">
                <img  src="/storage/{{$image->url}}" class="preview img-thumbnail"> 
            </a>
            @empty
            No Images
            @endforelse
        </div>
        <div>
            {{-- links --}}
        </div>
        
        <hr>
        <div>
            {{-- documents --}}
            @forelse ($article->documents as $doc)
            <a class="font-weight-bold" href="/documents/download/{{$doc->id}}">{{$doc->name}}</a> <br>
            <p>{{$doc->description}}</p>
            @empty
               <p>No Documents For this Article</p> 
            @endforelse
        </div>
    <hr>
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
                                        <textarea id="comment_body" class="form-control" aria-label="With textarea"></textarea>
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
                        </div>
                    </div>
        </div>
        </div>
    @endsection

@section('scripts')
<script>

function commentElement(name,comment)
{
    var newcomment ='<div class="shadow-sm rounded p-3 mb-2 bg-success"><h5>'
        newcomment +=name;
        newcomment +='</h5><p><i class="fas  fa-comment-alt "></i>'
        newcomment +=comment
        newcomment +='</p></div>';
    
    return newcomment;
}

function addComment()
{
    var comment_body = $('#comment_body').val();
    console.log(comment_body);
    if (comment_body != null) 
    {
        $.ajax({
        type: 'POST',
        url: '/comments/store/{{$article->id}}',
        data: {
                "_token": "{{csrf_token()}}",
                "comment_body": comment_body                
              },
        success:function(data){
            console.log(data);
           $('#comments').prepend(commentElement('name',data['body']));
        }
        });

    }
    else
        alert('asdf');           

}

</script>
@endsection