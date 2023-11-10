<?php include 'header.php' ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h5 class="mb-2 text-gray-800">Categories</h5>
    <!-- DataTales Example -->
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                <a href="add_cat.php">
                    <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
                </a>
            </div>
            <div>
                <form class="navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Category Name</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM categories";
                            $query = mysqli_query($config, $sql);
                            $rows = mysqli_num_rows($query);

                            if($rows)
                            {
                                while($rows = mysqli_fetch_assoc($query))
                                {
                                   echo '<tr>
                                            <td>'.$rows['cat_id'].'</td>
                                            <td>'.$rows['cat_name'].'</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-success">Edit</a>
                                            </td>
                                            <td>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="catID" value="'.$rows['cat_id'].'">
                                                    <input type="submit" name="deleteCat" class="btn btn-sm btn-danger" value="Delete">
                                                </form>
                                            </td>
                                         </tr>';
                                }
                            }
                            else 
                            {
                                echo '<tr><td colspan=4>No Records Found</td></tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>

<?php 
include 'footer.php';

if (isset($_POST['deleteCat']))
{
    $id = $_POST['catID'];
    $sql = "DELETE FROM categories WHERE cat_id='{$id}'";
    $query = mysqli_query($config, $sql);

    if($query)
    {
        $msg = ["Category has been deleted successfully.", "alert-success"];
        $_SESSION['msg'] = $msg;
        header('location: categories.php');

    }
    else 
    {
        $msg = ["Failed to delete category, please try again.", "alert-danger"];
        $_SESSION['msg'] = $msg;
        header('location: categories.php');
    }
}

?>