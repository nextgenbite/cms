@extends('layouts.admin')


@section('content')
@if(Session::has('deleted_user'))


<p class="alart alart-bg-danger">{{session('deleted_user')}}</p>


@endif
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Post link</th>
            <th>Comments</th>
            <th>Created at</th>
            <th>Update</th>
        
        </tr>
    </thead>
    <tbody>
        @if($posts)


        @foreach($posts as $post)

      <tr>
          <td>{{$post->id}}</td>
          <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }} " alt=""></td>
          <td><a href="{{URL::to('admin/posts/'. $post->id. '/edit')}}">{{$post->title}}</a></td>
          <td>{{$post->user->name}}</td>
          <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>

          <td><a href="{{URL::to('home/post', $post->slug)}}">View Post</a></td>
          <td><a href="{{URL::to('admin/comments/show', $post->id)}}">View Comments</a></td>
          <td>{{$post->created_at->diffForhumans()}}</td>
          <td>{{$post->updated_at->diffForhumans()}}</td>

      </tr>

        @endforeach

        @endif
           
            
           
       
       
    </tbody>
</table>
@endsection


