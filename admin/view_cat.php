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
      if(isset($_GET['delete'])){
        $cat_id = $_GET['delete'];
        if(!empty($cat_id)){
          $sql = "DELETE FROM categories WHERE cat_id={$cat_id}";
          if ($conn->query($sql) === TRUE) {
              echo "Record deleted successfully<br>";
          } else {
              echo "Error deleting record: " . $conn->error;
          }
        }
      }
      ?>
    </div>
    
    <?php include "includes/navbar.php" ?>
    <div class="container">
      <h1 class="mb-3">
        view category
      </h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">cat_id</th>
      <th scope="col">cat_title</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
          $sql = "SELECT * FROM categories";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  ?>
                  <tr>
      <td><?php echo $row['cat_id']; ?></td>
      <td><?php echo $row['cat_title']; ?></td>
      <td><a href="edit_cat.php?edit=<?php echo $row['cat_id']; ?>">edit</a></td>
       <td><a href="?delete=<?php echo $row['cat_id']; ?>">delete</a></td>
    </tr>
                  <?php
              }
          }
        ?>
    
  </tbody>
</table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>