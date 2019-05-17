
@extends('layouts.app')
<style type="text/css">
.avatar{
    border-radius: 100%;
    max-width: 100px;
}
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
                @endforeach
                @endif
                @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
                @endif
                
                <div class="col-md-8">
       
                <div class="card">
    
            <div class="card-head">
            <div class="row ">
                <div class="col-md-2">Dashboard</div>
                
                <div class="col-md-8">
               
                <form method="POST" action='{{url("/search")}}'>
              
                {{csrf_field()}}
                <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                Go!  
                </button>
                </span>
                </div>
              
                </form>
                </div>

        </div>
            </div> 
            <hr/>
            <div class="card-body">
                <div class="row no-gutters"> 
                   <div class="col-md-4">
                    @if(!empty($profile))
                     <img src="{{ $profile->profile_pic }}" class="avatar" alt=" ">
                     @else
                     <img src="https://www.pngarts.com/files/3/Girl-Avatar-Transparent-Images.png" class="avatar" alt=" ">
                     @endif
                     @if(!empty($profile))
                     <p class="lead" >{{ $profile->name }}</p>
                     @else
                    <p></p>
                     @endif
                     @if(!empty($profile))
                     <p class="lead">{{ $profile->designation }}</p>
                     @else
                    <p></p>
                     @endif
                   
                  
                   </div>
                   
                   <div class="col-md-8">
                 
                   @if(count($posts) >0)
                    @foreach($posts->all() as $post)
                    <h4 class="text-center" >{{$post->post_title}}</h4>
                    <img src="{{ $post->post_image }}" height="300" width="460" alt="">
                    <p>{{substr( $post->post_body,0,150 )}}</p>
                    <ul class="nav nav-pills">
                    <li role="presentation">
                    <a href='{{url("/view/{$post->id}")}}'> 
                 <div>   <span class="fa fa-eye ","p-2" style="width: 100px;">
  VIEW</span></div>
                    </a>
                    </li>
                    
                    <li role="presentation">
                    <a href='{{url("/edit/{$post->id}")}}'>
                   <div> <span class="fa fa-pencil-alt","p-2" style="width:100px;"> EDIT</span></div>
                    </a>
                    </li>
                    <li role="presentation">
                    <a href='{{url("/delete/{$post->id}")}}'>
                  <div>  <span class="fa fa-trash","p-2" style="width:100px;">  DELETE</span></div>
                    </a>
                    </li>
                    </ul>
                    <div>
                    <cite style="float:left" >Posted on:{{date('M j,YH:i',strtotime($post->updated_at))}}</cite>
                    </div><hr/>
                    @endforeach
                   @else
                   <p>no post available</p>
                   @endif
                
                   {{$posts->links()}}
                   </div>
                   </div>
                   </div>
                </div>
            </div>
             </div>
</div>
@endsection
