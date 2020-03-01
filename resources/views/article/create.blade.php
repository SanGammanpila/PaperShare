@extends('layouts.main')

@section('title')
    New Article
@endsection

@section('body')

<div class="container">        

    <div id="articleForm" class="shadow p-3 mb-5 bg-white rounded">
   
        <form action="/articles/store" method="POST">

            @csrf
        <h1>Create A new Article</h1>
        <div>
            <fieldset disabled>
                <div class="form-group">
                    <label for="disabledTextInput">Author</label>
                    <input name = "author" type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->name}}">
                </div>
            </fieldset>
            <label class="col-lg col-form-label">Title of the Article</label>
            <input name="title" class="form-control" id="title" placeholder="Title">                
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
                <textarea name="abstract" id="abstract" placeholder="Abstract" class="form-control" rows="14"></textarea>
            </div>
        </div>
            </div>
            <div style="overflow:auto;">
             <div style="float:right;">
             <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </div>
    </form>

</div>
</div>
</body>

@endsection