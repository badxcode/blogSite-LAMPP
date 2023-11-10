<?php 
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['user_data']))
{
    header('location: admin/index.php');
}
?>
<div class="container">
    <div class="row">
        <div class="col-xl-5 col-md-4 m-auto mt-5 p-5 bg-info">
            <form action="" method="POST">
                <p class="text-center">Blog! Log in to your account.</p>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="login_btn" class="btn btn-primary" value="Login" required>
                </div>
                <?php 
                    if(isset($_SESSION['error']))
                    {
                        $error = $_SESSION['error'];
                        echo "<p class='bg-danger p-2 text-white'>".$error."</p>";
                        unset($_SESSION['error']);
                    }
                ?>
            </form>
        </div>
    </div>
</div>
<?php include 'footer.php'; 

if (isset($_POST['login_btn'])) // checking if login-btn in pressed
{
    //echo 'pressed';

    $username = $_POST['username'];
    //$pass = sha1($_POST['password']);
    $pass = $_POST['password'];

    //echo $username."<br>".$pass;

    $sql = "SELECT * FROM user WHERE username='{$username}' AND password='{$pass}'";
    $query = mysqli_query($config, $sql);
    $data = mysqli_num_rows($query);

    if ($data)
    {
        $result = mysqli_fetch_assoc($query); // the data from the query
        $user_data = array($result['user_id'], $result['username'], $result['role']);
        $_SESSION['user_data'] = $user_data;
        header("location: admin/index.php");
    }
    else 
    {
        $_SESSION['error'] = "Invalid email/password";
        header("location: login.php");
    }
}

?>