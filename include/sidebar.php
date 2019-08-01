<?php
    include_once('include/db.php');

?>

<?php
    //query za naslove poslednjih pet postova

    $sql = "SELECT * FROM posts ORDER BY posts.created_at DESC LIMIT 5";
    $limitPosts = database($sql, $connection, 'fetchAll');
?>




<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">

            <h4>Latest post</h4>
                
                <?php
                    foreach($limitPosts as $post){
                ?>
                
                <p><a href= single-post.php?id=<?php echo $post['id']; ?>><?php echo $post['title']; ?></p>

                <?php }?>        
            </div>
            
</aside><!-- /.blog-sidebar -->