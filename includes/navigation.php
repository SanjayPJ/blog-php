<div class="col-4">
    <h3>BLOG</h3>
    <form method="get" action="search.php">
        <div class="input-group mb-3 mt-3">
            <input name="s" type="text" value="<?php echo htmlspecialchars($_GET['s'])?>" class="form-control" aria-describedby="button-addon2">

            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
            </div>
        </div>
    </form>
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
    <?php include "includes/widget.php" ?>
</div>
