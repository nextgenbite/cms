@extends('layouts.blog-post')
@section('content')
    

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">
     <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$posts->title}} </h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$posts->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{$posts->created_at->diffForhumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$posts->photo->file}}" alt=""> 
                <hr>

                <!-- Post Content -->
                <p>{{$posts->body}}  </p>

                <hr>

                
                <!-- Blog Comments -->
                @if(Auth::check())
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
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

                <hr>
                @endif
                <!-- Posted Comments -->
                @if(count($comments) > 0)


                
        
                <!-- Comment -->
                @foreach ($comments as $comment)
                    
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="64px" class="media-object"  src="{{$comment->photo}} " alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForhumans()}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>

                       
            @if(count($comment->replies) > 0)


            @foreach($comment->replies as $reply)


                  @if($reply->is_active == 1)



                  <!-- Nested Comment -->
                  <div id="nested-comment" class=" media">
                      <a class="pull-left" href="#">
                          <img height="64" class="media-object" src="{{$reply->photo}}" alt="">
                      </a>
                      <div class="media-body">
                          <h4 class="media-heading"{{$reply->author}}>
                              <small>{{$reply->created_at->diffForHumans()}}</small>
                          </h4>
                          <p>{{$reply->body}}</p>
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
      <!-- End Nested Comment -->


              </div>


                 

  </div>
</div>

@endforeach

@endif

</div> <!-- col-md-8-->
           

@endsection
@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){


            $(this).next().slideToggle("slow");




        });




    </script>



@stop
