<?php
    
    include('include/header.php');
    include('include/db.php');
?>

<?php
    $sql = "SELECT id, first_name, last_name FROM users";
    $users = database($sql, $connection, 'fetchAll');  

?>
  <main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
        <div class="blog-post">


    <h4>Create post</h4>
        <div class="blog-post">
            <form action='create-post.php' method='POST' onsubmit='return validationPost()'>
        
                <select id ="soflow" name = "user">
                    <?php foreach($users as $u){ ?>
                        <option id= 'authorPost' value="<?php echo $u['id'] ?>">
                        <?php echo $u['first_name'] . " " . $u['last_name']; ?>
                            
                        </option>
                    <?php } ?>
        
    
                <input type = 'text'id='titlePost' class="form-control" name='title' placeholder='Title'><br>
                <textarea name='newPost' id='bodyPost' class="form-control" cols='50' rows='5' placeholder = 'Your post'></textarea><br>
    


                    <?php

                        if(isset($_GET['error']) && $_GET['error'] == 1){
         
                            echo "<div id='alertPost'class='alert alert-danger' id='alertPost'><p>Please fill in all the required fields</p></div>";
                        }
                
                    ?>
    
                <input type='submit' class="btn btn-success" name='sendPost' value='send'>

            </form>

        </div><!-- /.blog-post -->

    </div><!-- blog-main-->  



</div><!-- /.row -->
   
   <?php
        include("include/sidebar.php");
    ?>
    
</main>

    
<?php 
   
    include('include/footer.php');

?>