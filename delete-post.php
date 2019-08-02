<?php 
include("include/db.php");

if(!isset($_POST['postDel'])){
    header("location:index.php");
}else{
    $postId = $_POST['post_id'];
    $sql = "DELETE FROM comments where post_id = {$postId}";
    $statement = $connection->prepare($sql);
    $statement->execute();
  
    $sql = "DELETE FROM posts where id={$postId}";
    $statement = $connection->prepare($sql);
    $statement->execute();
    header("location:index.php");
}
?>