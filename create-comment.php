<?php
	include('include/db.php');


	if(!isset($_POST['submit'])) {
		header("Location:single-post.php?id=$id");
	}else {
		$name = $_POST['name'];
		$comment = $_POST['comment'];
		$id = $_POST['id'];

		if (empty($name) || empty($comment)) {
			header ("location:single-post.php?error=1&id=$id");
		}else{
			$sql = "INSERT INTO comments(author, text, post_id) VALUES ('$name', '$comment', '$id')";
			$statement = $connection->prepare($sql);
            $statement->execute();
    
           	header("Location:single-post.php?id=$id");
        }
    }
		
	
?>