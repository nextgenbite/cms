@extends('layouts.blog-home')
@section('content')
<div class="col-lg-6">
    <!-- Featured blog post-->
    <div class="card mb-4 shadow-sm">
        <a href="post.html"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
        <div class="card-body">
            <div class="small text-muted">January 1, 2021</div>
            <h2 class="card-title">Featured Post Title</h2>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
            <a class="btn btn-primary" href="#!">Read more →</a>
        </div>
    </div>
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        @foreach ( $post_latest as $post)
        <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4 shadow-sm">
                <a href="#!"><img class="card-img-top" src="{{$post->photo->file}}" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">{{$post->created_at->diffForhumans()}}</div>
                    <h2 class="card-title h4">{{$post->title}}</h2>
                    <p class="card-text">{{$post->body}}</p>
                    <a class="btn btn-primary" href={{URL::to('post', $post->id)}}>Read more →</a>
                </div>
            </div>

        </div>
        @endforeach
        

        
    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />


       
        <div class="pagination justify-content-center my-4">
           
            {{$post_latest->render()}}
            
        </div>
    </nav>
</div>
@endsection