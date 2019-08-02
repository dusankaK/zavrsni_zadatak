<?php 
    include('include/header.php');
    include('include/db.php');
?>


<?php
    if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT c.id, c.author as comment_author, c.text, p.title, p.body, u.first_name, u.last_name, p.created_at FROM posts as p INNER JOIN users as u ON u.id = p.author LEFT JOIN comments AS c ON p.id = c.post_id WHERE p.id = $id";
    
    $singlePost = database($sql, $connection, 'fetchAll');
    $comments = [];
    $count = count($singlePost);
    for ($i = 0; $i < $count; $i++){
        $comments[$i]['id'] = $singlePost[$i]['id'];
        $comments[$i]['comment_author'] = $singlePost[$i]['comment_author'];
        $comments[$i]['text'] = $singlePost[$i]['text'];
    }
?>

<main role="main" class="container">
<div class="row">

    <div class="col-sm-8 blog-main">

        <div class="blog-post">
            <a href="#"><h2 class="blog-post-title"><?php echo $singlePost[0]['title']; ?></h2></a>
            <p class="blog-post-meta"><?php echo $singlePost[0]['created_at']. " "; ?> by <a href="#"><?php echo $singlePost[0]['first_name'] . " " . $singlePost[0]['last_name']; ?></a></p>

            <p><?php echo $singlePost[0]['body']; ?></p>
            <hr>
        

        <form action='delete-post.php' method='POST' onsubmit="return checkDel()">
               <input type ='hidden' name='post_id' value="<?php echo $_GET['id']?>">
               <input  type = 'submit' class="btn btn-primary" name='postDel' value='Delete post'>
               </form>
               <br>
                   
        <h4>Put comment</h4>
        <form action ='create-comment.php' method='POST' onsubmit="return validationComm()">
           <label>Name:</label><br>
           <input class="form-control" type ='text' name ='name' placeholder="name"><br>
           <label>Comment:</label><br>
           <textarea class="form-control" name ='comment' cols ='50', rows='5' placeholder="comment"></textarea><br>
           <input type='hidden' name='id' value = "<?php echo $_GET['id']?>">

           <?php 
           if(isset($_GET['error']) && $_GET['error'] == 1){
            echo "<div id='alertComm' class='alert alert-danger'><p>Please fill in all the required fields</p></div>";
           }
            ?>
           <input class="btn btn-success" type ='submit' name='submit' value ='Send'><br>
       </form>
       <br>

                <?php 
                    echo '<br>';
         
         // sakrij sekciju komentara ako nema komentara, uslov
                if($comments[0]['comment_author'] == "" && $comments[0]['text'] == ""){

                ?> 

                    <h4>There are currently no comments</h4>
                        <style type="text/css">
                        #emptyComm{
                        display:none;
                        }
                    </style>

                <?php } ?>


    
    <div id="emptyComm"><!--div sekcija bez komentara-->
    <button id ="showHide" class="btn btn-default">Hide comments</button><br><br/>

    <div id ="showHideComm">

        <h3>Comments</h3>
                <?php 
                    $comments = database($sql, $connection, 'fetchAll');
                    foreach ($comments as $comment) {
                ?>
                    
                    <p><span><?php echo $comment['comment_author'] ?></span><p>

                    <ul>
                     <li><?php echo $comment['text']; ?></li>

                    <form action='delete-comment.php' method='POST'>
                    <input type ='hidden' name='post_id' value = "<?php echo $_GET['id'] ?>">
                    <input type = 'hidden' name='comment_id' value ="<?php echo $comment['id'] ?>">

                    <input type ='submit' name='deleteComm' value='Delete'  class='btn-danger btn-sm' id='delete'>
                    </form>


                    </ul>
             <hr>
                    
                <?php } ?>
    </div><!-- blog. showHideComm-->
</div><!--div emptyComm-->

        <?php
        //ako id ne postoji
        } else {
            echo "post id is not passt by url";
        } ?>

        
    </div> <!--blog-post-->
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
© 2019 GitHub, Inc.