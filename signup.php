<?php 
include 'config.php';
include 'header.php';
session_start();

if (isset($_SESSION['user_data']))
{
    header('location: admin/index.php');
}
?>
<div class="container p-5">
    <div class="row">
        <div class="col-md-5 m-auto bg-info p-4">
            <form action="" method="POST">
                <p class="text-center">Register you account</p>
                <div class="mb-3">
                    <input type="text" name="username" id="name" placeholder="Username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" id="pass" placeholder="Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="c_password" id="re-pass" placeholder="Confirm Password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" name="add_user" class="btn btn-primary" value="Create" onclick="validation()">
                    
                </div>
                <div class="mb-3">
                    <span id="validation"></span>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="script.js"></script>
<?php 
include 'footer.php'; 

if (isset($_POST['add_user']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = '1';
    
    // check if email already exist?

    $sql_username = "SELECT * FROM user WHERE username='$username'";
    $query_username = mysqli_query($config, $sql_username);
    $row = mysqli_num_rows($query_username);

    if ($row >= 1)
    {
        echo "<script> document.getElementById('validation').innerHTML='Username already exist. Use another username.'</script>";
    }
    else 
    {
        $sql = "INSERT INTO user(username, email, password, role) VALUES('$username', '$email', '$pass', '$role')";
        $query = mysqli_query($config, $sql);

        if ($query)
        {
            echo "<script> document.getElementById('validation').innerHTML='Your registration was successful. Login to continue.'</script>";
            //header("location: login.php");
        }
        else 
        {
            echo "<script> document.getElementById('validation').innerHTML='Failed to register, try again.'</script>";
        }
    }
    
}

?>