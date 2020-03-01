@extends('layouts.main')

@section('title')
    My Articles
@endsection

@section('body')
<div class="container">
    @include('inc.subnav')
		{{-- My papers --}}
<div class="shadow p-3 mb-5 bg-white rounded">

<table class="table table-striped">
<thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Tile</th>
        {{-- <th scope="col">Type</th> --}}
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
</thead>
<tbody>
    @forelse ($articles as $article)
    <tr>
        <th scope="row">{{$loop->index+1}}</th>
        <td><a href="/articles/{{$article->id}}"> {{$article->title}}</a></td>
        {{-- <td>{{$article->type}}</td> --}}
        <td>{{$article->created_at}}</td>
        <td>{{$article->updated_at}}</td>
        <td><a href="/articles/edit/{{$article->id}}">Edit</a></td>
        <td><a class="text-danger" href="#">Delete</a></td>
    </tr>
</tbody>
@empty
You Have No Articles Published
@endforelse
</table>
</div>
</div>

    
@endsection
