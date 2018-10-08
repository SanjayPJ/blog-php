<div class="col-4">
  <h3>BLOG</h3>
  <ul class="list-inline">
      <li class="list-inline-item"><a href="/">Home</a></li>
      <?php 
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($select_all_categories)){
            $cat_title = $row["cat_title"];
            echo '<li class="list-inline-item"><a href="/">'. $cat_title .'</a></li>';
        }
      ?>
    </ul>
</div>