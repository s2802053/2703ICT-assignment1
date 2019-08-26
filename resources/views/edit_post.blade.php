@extends('layouts/master')

@section('title')
    {{ $title }}
@endsection
    
@section('style')

@endsection

@section('content')
<div class="create-post">
            <form method="get" action="/edit_post" name="editPost">
                <input type="hidden" name="id" value="{{$post->id}}">
                <div id="container">
                    <div class="topRow">
                        <span id="username">Username</span>
                        <br>
                        <input type="text" placeholder="Enter username" name="username" value="{{$post->name}}"> 
                    </div>
                    <div class="topRow">
                        <span>Title</span>
                        <br>                   
                        <input type="text" placeholder="Enter title" name="title" value="{{$post->title}}"> 
                    </div>
                </div>
                <div id="bottomRow">
                    Message
                    <br>
                    <input type="text" placeholder="Enter message" name="message" value="{{$post->message}}">
                </div>
                <button type="submit">Edit post</button>
            </form>
        </div>
@endsection
