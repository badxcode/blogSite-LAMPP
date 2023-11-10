<?php 
include 'config.php';
include 'header.php';

$id = $_GET['id'];

if (empty($id))
{
    header('location: index.php');
}

$sql = "SELECT * FROM blog WHERE blog_id='$id'";
$query = mysqli_query($config, $sql);
$post = mysqli_fetch_assoc($query);

?>

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body" >
                    <div id="single-img">
                        <a href="">
                            <img src="upload/<?= $post['blog_image'] ?>" alt="image">
                        </a>
                    </div>
                    <hr>
                    <div>
                        <h5><?= $post['blog_title'] ?></h5>
                        <p><?= $post['blog_body'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'sidebar.php' ?>
    </div>
</div>

<?php include 'footer.php' ?>