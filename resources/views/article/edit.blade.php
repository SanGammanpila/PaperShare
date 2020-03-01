@extends('layouts.main')

@section('body')
<div class="container">

        {{-- <form>
                <div class="form-group">
                  <label >Title</label>
                  <input type="text" class=" form-control" placeholder="Title" read-only >
                </div>
                <div class="form-group">
                  <label >Abstract</label>
                  <textarea class="form-control" placeholder="Abstract" name="abstract" id="" cols="60"></textarea>
                </div>
                <div class="form-group">
                  <label >Article Type</label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                      @foreach ($types as $type)
                      <option value="1">{{$type->name}}</option>
                      @endforeach
                </select>
                </div>
                
                <div id="div_authors" class="form-group">

                <div class="input-group mb-3">
                    <input name="authors[]" type="text" class="form-control" placeholder="Author's username">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button">Add</button>
                    </div>
                </div>
                </div>

                <div class="form-group">
                    Add Documents
                </div>
                <div class="form-group">
                    Add Images
                </div>
        </form>   --}}



    <form action="/articles/update/{{$article->id}}" method="POST">

            @csrf
        <h1>Edit Article</h1>
        <div>
            <fieldset disabled>
                <div class="form-group">
                    <label for="disabledTextInput">Author</label>
                    <input name = "author" type="text" id="disabledTextInput" class="form-control" placeholder="">
                </div>
            </fieldset>
            <label class="col-lg col-form-label">Title of the Article</label>
        <input value="{{$article->title}}" name="title" class="form-control" id="title" placeholder="Title">                
             <p>
                <label class="col-lg col-form-label">Article Type</label>
                <select name="article_type" class="custom-select mr-sm-2">
                    @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </p>
        </div>
        
        
        <div class="tab">Abstract
            <div class="form-group">
                <textarea name="abstract" id="abstract" placeholder="Abstract" class="form-control" rows="14">{{$article->abstract}}</textarea>
            </div>
        </div>
            </div>
            {{-- <div style="overflow:auto;"> --}}
             {{-- <div style="float:right;"> --}}
                 <div class="container">
                     <button class="btn btn-primary" type="submit">Update</button>

                 </div>
            {{-- </div> --}}
        </form>
       <br>
       <hr>
        <div class="container">
            <a href="/articles/edit/authors/{{$article->id}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Authors</a>
            <a href="/articles/edit/resources/{{$article->id}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Add Resources</a>
        </div>
        <br>
    </div>
</div>





@endsection