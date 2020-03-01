@extends('layouts.main')
@section('title')
    Edit Resources
@endsection

@section('body')
<div class="container">

    <div>
        <h3>Current Images</h3>
        @forelse ($images as $image)
        {{-- <div> --}}
            <img class="preview" src="/storage/images/{{$image->url}}" alt="" srcset="">
            <button>Remove</button>
        {{-- </div> --}}
        @empty
            
        @endforelse
    </div>
    <hr>

    <h3>New Images</h3>
    <button>New Image</button>
    <br>
    <hr>

        <div id="new_images">
        <form action="/resources/add/{{$article_id}}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group">
                    <label >Image</label>
                    <input class="form-control" type="file" name="img_resource" id="">
                </div>
            <button type="submit">Update Images</button>
        </form>
<br>
</div>
@endsection