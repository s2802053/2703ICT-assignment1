<?php
    include "../includes/db_defs.php";
    use Illuminate\Http\Request;
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
    $posts = get_all_posts();

    return view('post_list')->withTitle("Home")->withPosts($posts)->withShowCreateForm(true);
});

Route::get('/post/{id}', function ($id) {
    // comment page for post
    // retrieve post and associated comments from db
    // return POST view

    $post = get_post($id);
    $comments = get_comments($id);

    return view('post')->withTitle("Viewing comments for post $id")
        ->withPost($post)->withComments($comments);
});

Route::get('/recent', function () {
    // view recent posts
    // retrieve posts from db where date is in last week
    // return POST_LIST view

    $posts = get_recent_posts();
    return view('post_list')->withTitle("Recent Posts")->withPosts($posts)->withShowCreateForm(false);
});

Route::get('/users', function(){
    $users = get_all_users();
    return view('users')->withUsers($users)->withTitle("Users");
});

Route::get('user_posts/{userId}', function($userId){
    // view all posts of a user
    // retrieve posts for username from db
    // return POST_LIST view
    $posts = get_user_posts($userId);
    return view('post_list')->withTitle("Posts")->withPosts($posts)->withShowCreateForm(false);
});

Route::get('/add_post', function(Request $request){
    $input = $request->all();
    // check if username is already a user
    $user = get_user($input['username']);
    if ($user){
        $newPostId = add_post($user->id, $input['title'], $input['message']);
    } else {
        // create a new user
        $newUserId = add_user($input['username']);
        $newPostId = add_post($newUserId, $input['title'], $input['message']);
    }

    if ($newPostId){
        return redirect("/post/$newPostId");
    } else {
        die('Error adding item');
    }
});

Route::get('/add_comment', function(Request $request){
    $input = $request->all();
    $user = get_user($input['username']);
    $id = $input['id'];
    if ($user){
        add_comment($user->id, $input['message'], $id);
    } else {
        // create a new user
        $newUserId = add_user($input['username']);
        add_comment($newUserId, $input['message'], $id);
    }
    return redirect("/post/$id");
});

Route::get('/test', function(){
    $user = get_user("joe burton");
    if ($user){
        dump($user->id);
    } else {
        dump("No user");
    }
});

Route::get('/deleteComment/{postId}/{commentId}', function($postId, $commentId){
    del_comment($commentId);
    return redirect("/post/$postId");
});

Route::get('/deletePost/{postId}', function($postId){
    del_post($postId);
    return redirect('/');
});

Route::get('/editPost/{postId}', function($postId){
    $post = get_post($postId);
    return view('edit_post')->withTitle("Edit post")->withPost($post);
});

Route::get('/edit_post', function(Request $request){
    $input = $request->all();
    $id = $request['id'];
    update_post($id, $request['title'], $request['message']);
    return redirect("/post/$id");
});