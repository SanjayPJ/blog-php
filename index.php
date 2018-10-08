<!doctype html>
<html lang="en">
<div class="alert alert-warning p-1">
    <?php include "includes/db_connect.php" ?>
</div>
<?php include "includes/header.php" ?>

<body>
    <div class="container mt-3">
        <div class="row">
            <?php include "includes/navigation.php" ?>
            <div class="col-8">
                <?php 
                $query = "SELECT * FROM posts";
                $select_all_post_query = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($select_all_post_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>
                <div class="card p-3 mb-2">
                   <img class="img-responsive mb-2 rounded" src="assets/img/<?php echo $post_image ?>" alt="">
                    <h3><a href=""><?php echo $post_title ?></a></h3>
                    <h6 class="text-muted">By <b><?php echo $post_author ?></b> at <?php echo $post_date ?></h6>
                    <p class="text-muted"><?php echo substr($post_content, 0, 230) ?> ... <a href="">Read More >></a></p>
                </div>
                <?php
                    
                }
            ?>

            </div>
        </div>
    </div>
</body>

</html>
