@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="ui compact menu">
                <a class="item" href="{{url('/',['lang'=>'laravel'])}}">
                    <img src="https://img.icons8.com/windows/32/000000/laravel.png"/>
                       Laravel
                </a>
                <a class="item" href="{{url('/',['lang'=>'yii'])}}">
                    <img src="https://img.icons8.com/ios-filled/50/000000/yii-framework.png"/>
                       Yii
                </a>
                <a class="item" href="{{url('/',['lang'=>'symfony'])}}">
                  <img src="https://img.icons8.com/color/48/000000/symfony.png"/>
                  Symfony
                </a>
                <a class="item" href="{{url('/',['lang'=>'cakephp'])}}">
                <img src="https://img.icons8.com/cute-clipart/64/000000/cake.png"/>
                CakePHP
                </a>
                <a class="item" href="{{url('/',['lang'=>'django'])}}">
                   <img src="https://img.icons8.com/windows/32/000000/django.png"/>
                   django
                </a>
                <a class="item" href="{{url('/',['lang'=>'flask'])}}">
                <img src="https://img.icons8.com/nolan/64/python.png"/>
                Flask
                </a>
                <a class="item" href="{{url('/',['lang'=>'rails'])}}">
                    <img src="https://img.icons8.com/color/48/000000/ruby-gem.png"/>
                       Rails
                </a>
                <a class="item" href="{{url('/',['lang'=>'asp'])}}">
                    <img src="https://img.icons8.com/nolan/64/asp.png"/>
                       ASP.NET
                </a>
                <a class="item" href="{{url('/',['lang'=>'spring'])}}">
                  <img src="https://img.icons8.com/color/48/000000/spring-logo.png"/>
                  Spring Boot
                </a>
                <a class="item" href="{{url('/',['lang'=>'nodejs'])}}">
                  <img src="https://img.icons8.com/color/48/000000/nodejs.png"/>
                </a>
            </div>

        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="ui fluid action input">
               <button class="ui teal button" id="flip">
                  <i class="pencil alternate icon"></i>
                   Add Post
               </button>
               <input type="text" placeholder="Search...">
               <div class="ui primary button">Search</div>
            </div>
        </div>
    </div>
</div>


<br>

<div class="container" id="panel" style="display:none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="ui form" method="POST" action="{{ route('post.store') }}">
                <textarea placeholder="Tell us more" style="min-height:250px" rows="5" name="content">
                </textarea>
                <br>
                </br>
                <div>
                 <select class="ui dropdown" name='sujet' style='width:200px;'>
                    <option value="laravel">Laravel</option>
                    <option value="yii">Yii</option>
                    <option value="sumfony">Sumfony</option>
                    <option value="cakephp">Cake PHP</option>
                    <option value="django">Django</option>
                    <option value="flask">Flask</option>
                    <option value="rails">Rails</option>
                    <option value="asp">ASP.NET</option>
                    <option value="spring">Spring Boot</option>
                    <option value="nodejs">Node js</option>
                 </select>
                    <br>
                    <button class="ui primary button">publish</button>


                </div>
            </form>
        </div>
    </div>
</div>

<br>

@foreach ($posts as $post)
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <div class="ui comments">
            <div class="comment">
                <div class="content">
                  <a class="ui image label">
                    {{$post->user->name}}
                  </a>
                <div class="metadata">
                    <span class="date">{{$post->created_at}}</span>
                </div>
                <div class="text">
                            {{$post->content}}
                </div>
                <div class="actions">
                    <a class="reply" onclick="buttonComment(<?php echo $post->id; ?>)">Comment</a>
                    <a class="save">Save</a>
                    <a class="hide">Hide</a>
                    <a>
                    <i class="expand icon"></i>
                    Full-screen
                    </a>
                    <a>
                    <i class="sort up icon"></i>
                    Important
                    </a>
                    <a>
                    <i class="sort down icon"></i>
                    Unimportant
                    </a>
          </div>
    </div>
  </div>
</div>

        </div>
    </div>
</div>
<div>
<!-- comment -->
<br>
<div class="container"  id='comments<?php echo $post->id; ?>' style='display:none;'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="ui comments"  >
                <h6 class="ui dividing header">Comments</h6>
                <div class="comment">
                    <div class="content">
                        <a class="author">Matt</a>
                        <div class="metadata">
                            <span class="date">Today at 5:42PM</span>
                        </div>
                        <div class="text">
                            How artistic!
                        </div>
                        <div class="actions">
                            <a class="reply" onclick="replayButton(<?php echo $post->id; ?>)">Reply</a>
                        </div>
                    </div>

                    <div class="comment" id='success<?php echo $post->id; ?>'>

                    </div>

                </div>
                <form class="ui reply form" id="ajaxform<?php echo $post->id; ?>"  method="POST" action="{{ route('ajaxRequest.post') }}">
                    <div class="field">
                    <textarea rows="1" name="comment" id='comment<?php echo $post->id; ?>'></textarea>
                    </div>
                    <div class="ui blue labeled submit icon button" onclick="addComment(<?php echo $post->id; ?>)">
                    <i class="icon edit"></i> Add Comment
                    </div>
                    <div class="ui red labeled submit icon button"  onclick="exitButtonComment(<?php echo $post->id; ?>)">
                    <i class="x icon icon"></i>
                     Exit
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<br>

@endforeach


@endsection

@section('script')

<script>
        $(document).ready(function(){
        $("#flip").click(function(){
            var i = '<?php

                   use Illuminate\Support\Facades\Auth;
                   if(isset( Auth::user()->name)){
                       echo 1;
                   }else{
                       echo 0;
                   }

                   ?>';
            if(i == 1){

                $("#panel").slideToggle("slow");
            }else{
                var url = '<?php
                    $url = url('/login');
                    echo $url;
                    ?>';
                location.href = url;
            }

        });
        });

        function buttonComment(e) {
                var x = 'comments';
                var res = x.concat(e);
                var flag = document.getElementById(res);
                if (flag.style.display === "none") {
                    flag.style.display = "block";
                } else {
                    flag.style.display = "none";
                }
            }

function addComment(e){

      var x = '';
      var res = x.concat(e);
      let comment = $('#comment'+res).val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "/ajaxRequest",
        type:"POST",
        data:{
          comment : comment,
          name : <?php echo  Auth()->user()->id() ; ?>,
          id : <?php echo  Auth()->user()->id() ; ?>,
          id_post : e,
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            $('#success'+res).append(comment);
            $("#ajaxform"+res)[0].reset();
          }
        },
       });
  }

            function exitButtonComment(e) {
                var x = 'comments';
                var res = x.concat(e);
                var flag = document.getElementById(res);

                    flag.style.display = "none";
            }

            function replayButton(e){

            }




</script>

@endsection



