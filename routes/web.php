<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // home page
    // retrieve all posts from database
    // return POST_LIST view 
    $title = "Home";
    
    // (id, author, title, message, date, icon)
    $posts = array();
    $posts[] = array("id"=>"1", "date"=>"3:42pm 23 Aug 2019", "author"=>"Joe", "title"=>"Post #1", "message"=>"Message of post #1", "icon"=>"C:/xampp/htdocs/2703ICT-assignment1/public/default-icon.png");
    $posts[] = array("id"=>"2", "date"=>"3:42pm 23 Aug 2019", "author"=>"Joe", "title"=>"Post #2", "message"=>"Message of post #2", "icon"=>"C:/xampp/htdocs/2703ICT-assignment1/public/default-icon.png");
    $posts[] = array("id"=>"3", "date"=>"3:42pm 23 Aug 2019", "author"=>"Joe", "title"=>"Post #3", "message"=>"Message of post #3", "icon"=>"C:/xampp/htdocs/2703ICT-assignment1/public/default-icon.png");

    return view('post_list')->withTitle($title)->withPosts($posts);
});

Route::get('/post', function () {
    // comment page for post
    // retrieve post and associated comments from db
    // return POST view

    $title = "Post";
    
    // (id, author, title, message, date, icon)
    $post = array("id"=>"1", "date"=>"3:42pm 23 Aug 2019", "author"=>"Joe", "title"=>"Post #1", "message"=>"Message of post #1", "icon"=>"{{asset('./default-icon.png')}}");
    $comments = array();
    $comments[] = array("id"=>"1", "author"=>"Steve", "message"=>"This is comment #1");
    $comments[] = array("id"=>"2", "author"=>"Steve", "message"=>"This is comment #2");
    $comments[] = array("id"=>"3", "author"=>"Steve", "message"=>"This is comment #3");

    return view('post')->withTitle($title)->withPost($post)->withComments($comments);
});

Route::get('/recent', function () {
    // view recent posts
    // retrieve posts from db where date is in last week
    // return POST_LIST view
});

Route::get('/users', function(){
    // view all unique users
    // retrieve distinct usernames from table
    // return USER_LIST view

    $users = array("user1", "user2", "user3", "user4", "user5");

    return view('users')->withUsers($users)->withTitle("Users");
});

Route::get('user/posts', function(){
    // view all posts of a user
    // retrieve posts for username from db
    // return POST_LIST view
});