@extends('layouts.blog-home')
@section('content')
 <!-- Page content-->
 <div class="col-lg-6">
    <!-- Post content-->
    <article>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">{{$posts->title}}</h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Posted {{$posts->created_at->diffForhumans()}}</div>
            <!-- Post categories-->
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
        </header>
        <!-- Preview image figure-->
        <figure class="mb-4"><img class="img-fluid rounded" src="{{$posts->photo->file}}" alt="..." /></figure>
        <!-- Post content-->
        <section class="mb-5">
            <p class="fs-5 mb-4">{{$posts->body}} </p>
            
        </section>
    </article>
    <!-- Comments section-->

    <section class="mb-5">
        <div class="card bg-light">
            <div class="card-body">
                @if(Auth::check())
                <!-- Comment form-->
                {!! Form::open(['method'=>'POST', 'action'=> 'PostCommentsController@store']) !!}


              <input type="hidden" name="post_id" value="{{$posts->id}}">


             <div class="form-group">
                 {!! Form::label('body', 'Body:') !!}
                 {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
             </div>

             <div class="form-group">
                 {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
             </div>
        {!! Form::close() !!}
        @endif
                <!-- Comment with nested comments-->
                <div class="d-flex mb-4">
                    @if(count($comments) > 0)
                    <!-- Parent comment-->
                    @foreach ($comments as $comment)
                    <div class="flex-shrink-0"><img height="64px" class="rounded-circle" src="{{$comment->photo}}" alt="..." /></div>
                    <div class="ms-3">
                        <div class="fw-bold">{{$comment->author}}</div><small>{{$comment->created_at->diffForhumans()}}</small>
                       <p>{{$comment->body}}</p>
                       @if(count($comment->replies) > 0)


                       @foreach($comment->replies as $reply)
           
           
                             @if($reply->is_active == 1)
                        <!-- Child comment 1-->
                        <div class="d-flex mt-4">
                            <div class="flex-shrink-0"><img height="64px" class="rounded-circle" src="{{$reply->photo}}" alt="..." /></div>
                            <div class="ms-3">
                                <div class="fw-bold">{{$reply->author}}</div>
                               <p>{{$reply->body}}</p>
                            </div>
                        </div>
                        @endif

                        @endforeach
         
               @endif
         
  
                        <div class="comment-reply-container">
  
  
                            <button class="toggle-reply btn btn-primary pull-right">Reply</button>
  
  
                            <div class="comment-reply col-sm-6">
  
  
                                    {!! Form::open(['method'=>'POST', 'action'=> 'CommentRepliesController@CreateReply']) !!}
                                         <div class="form-group">
  
                                             <input type="hidden" name="comment_id" value="{{$comment->id}}">
  
                                             {!! Form::label('body', 'Body:') !!}
                                             {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
                                         </div>
  
                                         <div class="form-group">
                                             {!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
                                         </div>
                                    {!! Form::close() !!}
  
                            </div>
  
                      </div>
                      @endforeach

                    @endif
                    
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){


            $(this).next().slideToggle("slow");




        });




    </script>

