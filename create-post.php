<?php
    
    include('include/db.php');



    
        
         
    if(!isset($_POST['sendPost'])){
        header("Location:create.php");
    }else{
        $author = $_POST['user'];
        $title = $_POST['title'];
        $newPost = $_POST['newPost'];
        if(empty ($title) || empty ($newPost)){
            header("location:create.php?error=1");
        }else{
            
         
            $sql = "INSERT INTO posts (title, body, author) VALUES ('$title','$newPost','$author')";
    
            $statement = $connection->prepare($sql);
            $statement->execute();
    
           header("Location:index.php");
        }
    }
      
    ?>


