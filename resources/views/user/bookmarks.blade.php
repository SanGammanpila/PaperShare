@extends('layouts.main')
@section('title')
    Bookmarks
@endsection

@section('body')

<div class="container">  
		{{-- My papers --}}
		<div class="shadow p-3 mb-5 bg-white rounded">

            @forelse ($bookmarks as $bookmark)
                
            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tile</th>
                        <th scope="col"></th>
                        
                        </tr>
                    </thead>
                    <tbody>
                                                            
                        @foreach ($bookmarks as $bookmark)
                                <tr>
                                        <th scope="row">{{$loop->index + 1}}</th>
                                        <td><a href="/papers/{{$bookmark->paper_id}}">{{$bookmarks[$loop->index]->title}}</a></td>
                                        <td><a class="text-danger" href="#">Delete</a></td>
                                </tr>
                        @endforeach
                        {{-- {{$bookmarks->links()}} --}}
                    </tbody>
                    </table>
            @empty
            <h3>
                    You Don't have bookmarks.
               </h3>

            @endforelse
			
		</div>

	</div>
@endsection