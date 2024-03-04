<?php
include 'connection.php';
$id = $_GET['id']; 
$select = "SELECT * FROM users WHERE id='$id'"; 
$data = mysqli_query($con, $select);
$row = mysqli_fetch_array($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>EMP Reg</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VJ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-primary" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">view Data</a>
      </li>
    </ul>
  </div>
</nav>

<div class="main row justify-content-center mt-3" >
    <form action="" id="emp-form" class="row justify-content-center" autocomplete="off" method="post">
        <div class="col-7 mb-3">
            <label for="FirstName">First name</label>
            <input type="text" value="<?php echo $row['fname']; ?>" class="form-control mt-2" placeholder="First Name" id="first" name="first">
        </div>
        <div class="col-7 mb-3">
            <label for="FirstName">Last name</label>
            <input type="text" value="<?php echo $row['lname']; ?>" class="form-control mt-2" placeholder="Last name" id="last" name="last">
        </div>
        <div class="col-7 mb-3">
            <label for="FirstName">Email</label>
            <input type="email" value="<?php echo $row['email']; ?>" name="email" class="form-control mt-2" placeholder="Email" id="email">
        </div>
        <div class="col-7 mb-3">
            <label for="FirstName">Password</label>
            <input type="password" value="<?php echo $row['pwd']; ?>" class="form-control mt-2" placeholder="Password" id="pass" name="pass">
        </div>
        <div class="col-7 mb-3">
            <button class="btn col-2 btn-primary" id="update_btn" name="update_btn">Update</button>
        </div>            
    </form>
</div>
<?php 
    if (isset($_POST['update_btn'])){
        $fname = $_POST['first'];
        $lname = $_POST['last'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    
        $update = "UPDATE users SET fname='$fname',lname='$lname',email='$email',pwd='$pass' WHERE id='$id'";
        $data = mysqli_query($con, $update);
        if($data) {
          ?>
           <script type="text/javascript">
           alert("data updated successs");
           window.open("http://localhost/phpdemo/view.php","_self");
           </script>
          <?php
        } else {
          ?>
          <script type="text/javascript">
          alert("plz try again");
          </script>
          <?php
        }
    }
    ?>
</body>
</html>
