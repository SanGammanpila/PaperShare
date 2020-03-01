@extends('layouts.main')
@section('title')
{{$user->name}}
@endsection    
@section('body')
    
        <div class="container">
               @include('inc.subnav')
            <div class="container p-5 shadow mb-5 bg-white rounded">
                <div class="row">
                    <div class="col-sm-3">
                            <div style="font-size: 0.8rem;">
                            <img class="profile_photo" src="/storage/{{$user->profile_photo}}" alt="" srcset="">
                            <i class="fas fa-user-circle fa-10x"></i>
                            </div>
                    </div>
                    <div class="col-sm-8">
                        <form action="/profile/update" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                          <input type="text" value="{{$user->name}}" class="form-control text-capitalize" name="name">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="university" id="">
                                @foreach ($universities as $university)
                                <option value="{{$university->id}}">{{$university->name}}</option>                                     
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Profile Photo</label>
                            <input class="form-control" type="file" name="profile_photo" id="">
                        </div>
                    </div>
                </div>
        <hr>
        
        <div class="container">
            <label>Faculty</label>
            <select class="form-control" name="faculty" id="">
                @foreach ($faculties as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                @endforeach
            </select>
            <br>
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" type="text" value="{{$user->phone}}" class="form-control" name="">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input name="address" type="text" value="{{$user->address}}" class="form-control" name="">
            </div>
            <div class="form-group">
                <label>About</label>
                <input name="about" type="text" value="{{$user->about}}" class="form-control" name="">
            </div>
        </div>
        <button type="submit">Update</button>
    </form>

            </div>
        </div>
@endsection