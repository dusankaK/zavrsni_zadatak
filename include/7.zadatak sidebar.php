<?php 
    include_once('include/db.php');
?>
<?php 
    $sql = 'SELECT * FROM posts ORDER BY posts.created_at DESC LIMIT 5';
    $limitPosts = database($sql, $connection, 'fetchAll');
?>


<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">

                <h4>Latest posts</h4>

                <?php 
                    foreach ($limitPosts as $post) {
                        
                    

                ?>
                 <p><a href =single-post.php?id=<?php echo $post['id'] ?>><?php echo $post['title'] ?></a></p>

             <?php } ?>
                
</aside><!-- /.blog-sidebar -->