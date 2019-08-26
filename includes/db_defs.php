<?php
function db_open(){
    try {
        $db = new PDO('sqlite:db/database.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        die("Error: " .$e->getMessage());
    }
    return $db;
}

function get_post($id){
    $query = "select post.*, user.name from post, user where post.id = '$id' AND post.author = user.id";
    $posts = DB::select($query);
    return $posts[0];
}

function get_comments($postId){
    $query = "select comment.*, user.name 
            from comment, user, post
            where post.id = $postId AND comment.post_id = post.id AND comment.author = user.id";
    $comments = DB::select($query);
    return $comments;
}

function get_all_posts(){
    $query = "select post.*, user.name 
            from post, user
            where post.author = user.id";
    $posts = DB::select($query);
    return $posts;
}

function get_recent_posts(){
    $query = "select post.*, user.name from post, user where post.author = user.id AND timestamp > DATE('now', '-7 day');";
    $posts = DB::select($query);
    return $posts;
}

function get_user_posts($userId){
    $query = "select post.*, user.name from post, user where post.author = '$userId' AND post.author = user.id";
    $posts = DB::select($query);
    return $posts;
}
function get_all_users(){
    $query = "select * from user";
    $users = DB::select($query);
    return $users;
}

function get_user($username){
    $query = "select * from user where name = '$username'";
    $user = DB::select($query);
    if ($user){
        return $user[0];
    } else {
        return null;
    }
}

function add_user($username){
    $sql = "insert into user (name) values (?)";
    DB::insert($sql, array($username));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

function add_post($username, $title, $message){
    $date = date('Y-m-d');
    $sql = "insert into post (title, author, message, timestamp, iconLink)
        values (?, ?, ?, ?, ?)";
    DB::insert($sql, array($title, $username, $message, $date, "placeholder"));
    $id = DB::getPdo()->lastInsertId();
    return $id;
}

function add_comment($username, $message, $post_id){
    $sql = "insert into comment (author, message, post_id) values (?, ?, ?)";
    DB::insert($sql, array($username, $message, $post_id));
}

function del_comment($id){
    $sql = "delete from comment where id = ?";
    DB::delete($sql, array($id));
}

function del_post($id){
    $sql = "delete from comment where post_id = ?";
    DB::delete($sql, array($id));

    $sql1 = "delete from post where id = ?";
    DB::delete($sql1, array($id));
}

function update_post($id, $title, $message){
    $sql = "update post set title = ?, message = ? where id = ?";
    DB::update($sql, array($title, $message, $id));
}
?>