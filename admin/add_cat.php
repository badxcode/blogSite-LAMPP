<?php include 'header.php' ?>

<div class="container">
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <div class="row">
        <div class="col-xl-6 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Add Category</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <input type="text" name="cat_name" placeholder="Category Name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <input type="submit" name="add_cat" value="Add" class="btn btn-primary">
                            <a href="categories.php" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

include 'footer.php';

if (isset($_POST['add_cat']))
{
    //echo $_POST['cat_name'];

    $cat_name = $_POST['cat_name'];

    $sql1 = "SELECT * FROM categories WHERE cat_name='{$cat_name}'";
    $query1 = mysqli_query($config, $sql1);
    $row = mysqli_num_rows($query1);

    if ($row)
    {
        $msg = ["Category name already exist.", "alert-danger"];
        $_SESSION['msg'] = $msg;
        header('location: add_cat.php');
    }
    else 
    {
        $sql2 = "INSERT INTO categories(cat_name) VALUES('$cat_name')";
        $query2 = mysqli_query($config, $sql2);

        if($query2)
        {
            $msg = ["Category has been added successfully.", "alert-success"];
            $_SESSION['msg'] = $msg;
            header('location: add_cat.php');
        }
        else 
        {
            $msg = ['Failed to add category, please try again.', "alert-danger"];
            $_SESSION['msg'] = $msg;
            header('location: add_cat.php');
        }
    }
}

?>