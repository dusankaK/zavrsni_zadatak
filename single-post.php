<?php 
    include('include/header.php');
    include('include/db.php');
?>


<?php
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT c.id, c.author as comment_author, c.text, p.title, p.body, p.author, p.created_at FROM posts as p LEFT JOIN comments AS c ON p.id = c.post_id WHERE p.id = $id";

    
    

    $singlePost = database($sql, $connection, 'fetchAll');

?>
<main role="main" class="container">

<div class="row">

    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <a href="#"><h2 class="blog-post-title"><?php echo $singlePost[0]['title']; ?></h2></a>
            <p class="blog-post-meta"><?php echo $singlePost[0]['created_at']. " "; ?> by <a href="#"><?php echo " " . $singlePost[0]['author']; ?></a></p>

            <p><?php echo $singlePost[0]['body']; ?></p>
            <hr>
        </div>

       <h4><span>Insert comment</span></h4> 
        <form action ='create-comment.php' method='POST'>
           <label>Name:</label><br>
           <input class="form-control" type ='text' name ='name'><br>
           <label>Comment:</label><br>
           <textarea class="form-control" name ='comment' cols ='50', rows='5'></textarea><br>
           <input type='hidden' name='id' value = "<?php echo $_GET['id']?>">

           <?php 
           if(isset($_GET['error']) && $_GET['error'] == 1){
            echo "<div class='alert alert-danger'><p>Please fill in all the required fields</p></div>";
           }
            ?>
           <input class="btn btn-success" type ='submit' name='submit' value ='send'><br>
       </form>
       <br>


    
            
            <button id ="showHide" class="btn btn-default">Hide comments</button><br><br/>

    <div id ="showHideComm">

        <h3>Comments</h3>
                <?php 

                    $comments = database($sql, $connection, 'fetchAll');

                    foreach ($comments as $comment) {
                ?>
                    
                    <p><?php echo $comment['comment_author'] ?><p>

                    <ul>
                     <li><?php echo $comment['text']; ?></li>

                    <form action='delete-comment.php' method='POST'>
                    <input type ='hidden' name='post_id' value = "<?php echo $_GET['id'] ?>">
                    <input type = 'hidden' name='comment_id' value ="<?php echo $comment['id'] ?>">

                    <input type ='submit' name='deleteComm' value='delete'  class='btn-danger btn-sm' id='delete'>
                    </form>


                    </ul>
             <hr>
                    
                <?php } ?>
    </div><!-- blog. showHideComm-->

        <?php

        } else {
            echo "post id is not passt by url";
        } ?>

        

    </div><!-- /.blog-main -->

    <?php
        //dodavanje sidebar-a 
        include('include/sidebar.php');
    ?>

    </div><!-- /.row -->
</main><!-- /.container -->

<script src ='main.js'>
</script>

    
<?php 
    //dodavanje footer-a
    include('include/footer.php'); 
?>