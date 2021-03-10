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
             @csrf
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
                    <button type="submit" class="ui primary button">publish</button>


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
                    <a class="reply">Comment</a>
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="ui comments" id='comments' style="display:none;">
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
                            <a class="reply">Reply</a>
                        </div>
                    </div>
                </div>
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
                   $flag = Auth::user()->name;
                   if($flag){
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

        $(document).ready(function(){
        $("#buttonComment").click(function(){
                $("#comments").slideToggle("slow");
        });
        });
</script>

@endsection

