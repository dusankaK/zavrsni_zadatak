<?php 
    include('include/header.php');
    include('include/db.php');
?>

<?php
    $sql ="SELECT id, title, body, author, created_at FROM posts ORDER BY created_at DESC";
    
    $posts = database($sql, $connection, 'fetchAll');
?>

<main role="main" class="container">

<div class="row">

    <div class="col-sm-8 blog-main">
    
    <?php 
        foreach($posts as $post){
    ?>

        <div class="blog-post">
            <a href="single-post.php?id=<?php echo $post['id']; ?>"><h2 class="blog-post-title"><?php echo $post['title']; ?></h2></a>
            <p class="blog-post-meta"><?php echo $post['created_at']. " "; ?> by <a href="#"><?php echo " " . $post['author']; ?></a></p>

            <hr>
            <p><?php echo $post['body']; ?></p>
            
        </div><!-- /.blog-post -->
    <?php } ?>

        

        

        <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

    </div><!-- /.blog-main -->

    <?php
        //dodavanje sidebar-a 
        include('include/sidebar.php');
    ?>

    </div><!-- /.row -->
</main><!-- /.container -->

    
<?php 
    //dodavanje footer-a
    include('include/footer.php'); 
?>