@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('response'))
                <div class="alert alert-success">{{session('response')}}</div>
                @endif
            <div class="card">
                <div class="card-header">Post View</div>
               
                <div class="card-body">
                <div class="row no-gutters">  
                   <div class="col-md-4">
                   <div class="list-group">
                   <ul>
                   @if(count($categories)> 0)
                   @foreach($categories->all() as $category)
                  <li class="list-group-item"> <a href='{{url("category/{$category->id}")}}'>{{$category->category}}</a></li>
                 
                   @endforeach
                   @else
                   <p>No category found</p>
                   @endif
                  
                   
                   </div>
                   </div>
            
                <div class="col-md-8">
                   @if(count($posts) >0)
                    @foreach($posts->all() as $post)
                    <h4 class="text-center" >{{$post->post_title}}</h4>
                    <div class="text-center">
                    <img src="{{ $post->post_image }}"   width="440" height="300" alt="">
                    </div>
                    <p>{{ $post->post_body}}</p>
                    <ul class="nav nav-pills">
                    <li role="presentation">
                    <a href='{{url("/like/{$post->id}")}}'>
                   <div> <span class="fa fa-thumbs-up","p-3" style="width=100px;"> Like({{$likeCtr}})</span>
                    </div></a>
                    </li>
                    
                    <li role="presentation">
                    <a href='{{url("/dislike/{$post->id}")}}'>
                   <div> <span class="fa fa-thumbs-down","p-3" style="width=100px;"> Dislike({{$dislikeCtr}})</span>
                    </div></a>
                    </li>
                    <li role="presentation">
                    <a href='{{url("/comment/{$post->id}")}}'>
                   <div> <span class="fa fa-comment","p-3" style="width=100px;"> Comment</span></div>
                    </a>
                    </li>
                    </ul>
                   
                    @endforeach
                   @else
                   <p>no post available</p>
                   @endif
                   <form method="POST" action='{{url("/comment/{$post->id}")}}'>
                   {{csrf_field()}}
                   <div class="form-group">
                   <textarea id="comment" rows="6" class="form-control" name="comment" required autofocus></textarea>
                   </div>
                   <div class="form-group">
                   <button type="submit" class="btn btn-success btn-lg btn-block">POST COMMENT</button>
                   </div>
                   </form>
                   <h3>Comments</h3>
                   @if(count($comments)> 0)
                   @foreach($comments->all() as $comment)
                   <p>{{$comment->comment}}</p>
                   <p>Posted by:{{$comment->name}}</p>
                   <hr/>
                   


                   @endforeach
                   @else
                   <p>no post available</p>
                   @endif
                </ul>
                   
                  
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
