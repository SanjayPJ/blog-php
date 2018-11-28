<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>BLOG</title>
  </head>
  <body>
    <?php include "includes/db.php" ?>
    <?php include "includes/navbar.php" ?>
    <div class="container">
      <h1 class="mt-3">BLOG</h1>
      <hr>
      <div class="row">
        <div class="col-8">
          <?php
            $sql = "SELECT * FROM posts";
            if(isset($_GET['s'])){
              $search = $_GET['s'];
              $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
              ?>
              <h4 class="mb-3 text-muted">Search result for '<?php echo $search ?>'</h4>
              <?php
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $post_title = $row['post_title'];
                  $post_author = $row['post_author'];
                  $post_date = $row['post_date'];
                  $post_content = $row['post_content'];
                  $post_title = $row['post_title'];
                  $post_image = $row['post_image'];
                  ?>
                  <div class="card p-3 mt-2">
                    <?php if ($post_image) {?>
                      <img class="mb-2 rounded" src="images/<?php echo $post_image ?>" alt="">
                    <?php }?>
                    <h2><?php echo $post_title ?></h2>
                    <small class="text-muted mb-2">By <?php echo $post_author; ?> / <?php echo $post_date; ?></small>
                    <p class="text-muted text-justify"><?php echo substr($post_content, 0, 300); ?>...</p>
                    <a href="" class="btn btn-secondary btn-sm">Read more</a>
                  </div>
                  <?php 
                }
            } else {
                echo "<h4>0 results<h4>";
            }
          ?>
        </div>
        <?php include "includes/sidebar.php" ?>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>