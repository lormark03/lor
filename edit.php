<?php
$connection = mysqli_connect("localhost","root","","system");

if(isset($_POST['update']))
{
    $id=$_POST['id'];
    $username = $_POST['email'];
    $email = $_POST['username'];
    $password = $_POST['password'];
    $usertype=$_POST['usertype'];
    
    
    $query="UPDATE register set username='$email', email='$username', password='$password' where id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
      $_SESSION['success'] ="Admin Profile Added";
      header('Location: table.php');
    }
	
    else
    {
     $_SESSION['status'] ="Admin Profile Not Added";
     header('Location: table.php');
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-xl">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">

<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit</h1>
                                
                            </div>
                           

                            <form  method="POST">
                             <?php   if(isset($_POST['edit']))
                                {
                                    $id=$_POST['edit_id'];
                                    $query="SELECT * FROM register where id='$id'";
                                    $query_run = mysqli_query($connection, $query);
                                foreach($query_run as $row)
                                    {
                                    ?>
                                    <div class="form-group">
                                        <input type="text" name="id" value="<?php echo $row['id']?>" class="form-control " placeholder="UserName">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" name="username" value="<?php echo $row['email']?>" class="form-control " placeholder="UserName">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" name="username" value="<?php echo $row['lastname']?>" class="form-control " placeholder="UserName">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text"name="email" value="<?php echo $row['username']?>" class="form-control " placeholder="Email Address">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" name="password" value="<?php echo $row['password']?>" class="form-control " placeholder="Password">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" name="usertype" value="<?php echo $row['usertype']?>" class="form-control " >
                                    </div><br>
                                    <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
                                        Update
                                    </button>
                                    <?php
                                    }
                                }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>