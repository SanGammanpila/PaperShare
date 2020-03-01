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
                        <h3 class="text-capitalize"> {{$user->name}} </h3> 
                        <small class="text-muted">{{$user->user_university->name}}</small>
                    </div>
                    <a href="/profile/edit" class="text-secondary">Edit</a>
                </div>
        <hr>
        
        <div class="container">
                    <div class="row p-2">
                        <div class="row">
                        <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Faculty </th>
                                        
                                        <td>{{$user->user_faculty->name}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telephone </th>
                                        <td>{{$user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"> Address</th>
                                        <td>{{$user->address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">About</th>
                                        <td>{{$user->about}}</td>
                                    </tr>
        
                                </tbody>
                                </table>
        
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
@endsection