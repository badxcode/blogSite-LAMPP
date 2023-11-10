<?php include 'header.php';

if (isset($_SESSION['user_data']))
{
    $author_id = $_SESSION['user_data']['0'];
}

$sql = "SELECT * FROM categories";
$query = mysqli_query($config, $sql);


?>

<div class="container">
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <div class="row">
        <div class="col-xl-7 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Publish Blog/Article</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input required type="text" name="blog_title" placeholder="Title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Write your content here:</label>
                            <textarea required name="blog_body" class="form-control" id="blog" rows="2"></textarea>
                        </div>
                        <div class="mb-3">
                            <input required type="file" name="blog_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <select required class="form-control" name="" id="">
                                <option value="">Select Category</option>
                                <?php 
                                    while($cats = mysqli_fetch_assoc($query))
                                    {
                                        echo '<option value="'.$cats['cat_id'].'">'.$cats['cat_name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="add_blog" value="Add" class="btn btn-primary">
                            <a href="index.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

include 'footer.php';

if (isset($_POST['add_blog']))
{
    $title = $_POST['blog_title'];
    $body = $_POST['blog_body'];
    $filename = $_FILES['blog_image']['name'];
    $tmp_name = $_FILES['blog_image']['tmp_name'];
    $size = $_FILES['blog_image']['size'];
    $image_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $allow_type = ['jpg', 'png', 'jpeg'];
    $destination = "./upload/".$filename;

    if(in_array($image_ext, $allow_type))
    {
        if($size <= 200000)
        {
            move_uploaded_file($tmp_name, $destination);
        }
        else 
        {
            echo "Image size should not be greater than 2mb";
        }
    }
    else 
    {
        echo "File type is not allowed.";
    }


}

?>