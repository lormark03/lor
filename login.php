<?php
session_start();
$connection = mysqli_connect("localhost","root","","system");


if(isset($_POST['login']))
{
    $email=$_POST['emailtype'];
    $password=$_POST['passwordtype'];

    $query= "SELECT * FROM register WHERE  username='$email' AND password='$password'";
    $query_run = mysqli_query($connection, $query);
    $user=mysqli_fetch_array($query_run);

    if($user['usertype']=="admin")
    {
        $_SESSION['success'] = 'Added';
        header('Location:index.php');


    }
    else if($user['usertype']=="user")
    {
        $_SESSION['success'] = 'Added';
        header('Location:student.php');


    }

    else

    {

        $_SESSION['status'] = 'email or password invalid';
        header('Location:login.php');

    }

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <form  method="POST">
                                        <div class="form-group">
                                            <input type="email" name="emailtype" class="form-control "
                                                placeholder="Enter Email Address...">
                                        </div><br>
                                        <div class="form-group">
                                            <input type="password" name="passwordtype" class="form-control "
                                            placeholder="Password">
                                        </div>
                                        <br>
                                        <button type="submit"  name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>  
                                    </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
S
