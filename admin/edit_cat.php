<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>admin</title>
  </head>
  <body>
    <div class="container">
       <?php include "../includes/db.php" ?>
    <?php
    //do the job here
    if(isset($_GET['edit'])){
      $cat_id = $_GET['edit'];
      if(!empty($cat_id)){
        $sql = "SELECT cat_title FROM categories WHERE cat_id={$cat_id}";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        $cat_title = $row['cat_title'];
      }
      }
    }else{
      header('Location: view_cat.php');
    }
    if(isset($_POST['cat_title'])){
      if(!empty($_POST['cat_title'])){
        $cat_title = $_POST['cat_title'];
        $sql = "UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id=$cat_id";
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully<br>";
            header('Location: view_cat.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
      }
    }
    ?>
    </div>
   
    <?php include "includes/navbar.php" ?>
    <div class="container">
      <h1 class="mb-3">
        edit category
      </h1>
      <form action="" method="post">
        <input name="cat_title" value="<?php if(isset($cat_title)){ echo($cat_title); } ?>" type="text" class="form-control" placeholder="category name">
        <button name="submit" type="submit" class="btn btn-secondary mt-2">update category</button>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>