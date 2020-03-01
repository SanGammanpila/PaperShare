@extends('layouts.main')
@section('title')
    Edit Resources
@endsection

@section('body')
<div class="container">
        <h1><span class="badge badge-danger">TODO</span></h1>
        <div>
            <p>Authors</p>
                <div class="input-group mb-3">
                    <input type="text" id="author_id" class="form-control" placeholder="Author's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" onclick="addAuthor()" type="button" id="button-addon2">Add</button>
                    </div>
                </div>

            <p>Current Authors</p>
            <form action="">
                <div id="authors">
                    @forelse ($authors as $author)
                        <div class="input-group mb-3">
                            <input type="text" value="{{$author->name}}" readonly class="form-control text-capitalize">
                            <input value="{{$author->id}}" type="hidden" name="authors[]">
                            <div class="input-group-append">
                                <button class="btn btn-outline-danger" type="button" onclick="removeAuthor()">Remove</button>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>

                <button type="submit">Update</button>
            </form>

        </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection