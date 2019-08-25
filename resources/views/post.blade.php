<?php
    // requires a title string ($title), a post associative 
    // array ($post) and an array of comments ($comments)
?>

@extends('layouts/master')
@section('title')
    {{ $title }}
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/comment.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/post.css')}}">
@endsection

@section('content')
    <div class="post">
        <h4 class="post-author">{{ $post['author'] }}</h4>
        <p class="post-timestamp">{{ $post['date'] }}</p>
        <img src="{{asset('default-icon.png')}}">
        <div class="post-content">
            <h5 class="post-title">{{ $post['title'] }}</h5>
            <p class="post-message">{{ $post['message'] }}</p>
        </div>
    </div>
    Comments:
    @forelse($comments as $comment)
        <div class="comment">
            <h5>{{$comment['author']}}</h5>
            <p>{{$comment['message']}}</p>
        </div>
    @empty
        No comments found.
    @endforelse
@endsection