<?php
include 'config.php';

$categories = "SELECT * FROM categories";
$query1 = mysqli_query($config, $categories);

$recent_post = "SELECT * FROM blog ORDER BY publish_date DESC LIMIT 5";
$query2 = mysqli_query($config, $recent_post);

?>

<div class="col-lg-4">
    <div class="card">
        <div class="card-body d-flex right-section">
            <div id="categories">
                <h6>Categories</h6>
                <ul>
                    <?php 
                        while($cats=mysqli_fetch_assoc($query1))
                        {

                    ?>  
                    <li>
                        <a class="fw-bold text-success" href="category.php?id=<?= $cats['cat_id'] ?>"><?= $cats['cat_name'] ?></a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
            <div id="posts">
                <h6>Recent Posts</h6>
                <ul>
                    <?php 
                        while ($post = mysqli_fetch_array($query2)){
                        
                    ?>
                    <li>
                        <a class="fw-bold text-primary" href="single_post.php?id=<?= $post['blog_id'] ?>"><?= $post['blog_title'] ?></a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>