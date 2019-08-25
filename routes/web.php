<?php
    include "../includes/db_defs.php";
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
    
    // (id, author, title, message, date, icon)
    $sql = "select post.*, user.name from post, user where post.author = user.id";
    $posts = DB::select($sql);

    return view('post_list')->withTitle("Home")->withPosts($posts);
});

Route::get('/post/{id}', function ($id) {
    // comment page for post
    // retrieve post and associated comments from db
    // return POST view

    $postSql = "select * from post where post.id = $id";
    $posts = DB::select($postSql);
    $post = $posts[0];

    $commentsSql = "select * from comment where comment.post_id = $id";
    $comments = DB::select($commentsSql);

    return view('post')->withTitle("Viewing comments for post $id")->withPost($post)->withComments($comments);
});

Route::get('/recent', function () {
    // view recent posts
    // retrieve posts from db where date is in last week
    // return POST_LIST view

    $query = "select post.*, user.name from post, user where post.author = user.id AND timestamp > DATE('now', '-7 day');";
    $result = DB::select($query);
    return view('post_list')->withTitle("Recent Posts")->withPosts($result);
});

Route::get('/users', function(){
    // view all unique users
    // retrieve distinct usernames from table
    // return USER_LIST view

    $query = "select * from user";
    $users = DB::select($query);
    return view('users')->withUsers($users)->withTitle("Users");
});

Route::get('user_posts/{userId}', function($userId){
    // view all posts of a user
    // retrieve posts for username from db
    // return POST_LIST view
    $query1 = "select post.*, user.name from post, user where post.author = '$userId' AND post.author = user.id";
    $posts = DB::select($query1);
    return view('post_list')->withTitle("$userId's posts")->withPosts($posts);
});