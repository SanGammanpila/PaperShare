    @extends('layouts.main')
    @section('title','Articles')
    @section('body')
    <div class="container">
        <br><br>
        {{$articles->links()}}
        <br><br>
            @forelse ($articles as $article)
            {{-- {{$loop->index}} --}}
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
                    <form action="/bookmarks/add/{{$article->id}}" method="post">
                        <div onclick="bookmark()" class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id={{$article->id}}>
                                <label class="custom-control-label" for="{{$article->id}}">Bookmark</label>
                        </div>
                    </form>
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
                <p>That's all the articles we have.</p>
                @endforelse
                
                {{$articles->links()}}
            </div>

<script>
    function bookmark() {
        console.log('bookmark');
    }
</script>

    @endsection