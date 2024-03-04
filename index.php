<?php include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/68939498b9.js" crossorigin="anonymous"></script>
<title>EMP Reg</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
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

    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-5 mb-5">
                <strong>Emp Reg</strong>
            </h1>
        </div>
        <div class="main row justify-content-center">
            <form action="" id="emp-form" class="row justify-content-center" autocomplete="off" method="post">
                <div class="col-7 mb-3">
                    <label for="FirstName">First name</label>
                    <input type="text" class="form-control mt-2" placeholder="First Name" id="first" name="first">
                </div>
                <div class="col-7 mb-3">
                    <label for="FirstName">Last name</label>
                    <input type="text" class="form-control mt-2" placeholder="Last name" id="last" name="last">
                </div>
                <div class="col-7 mb-3">
                    <label for="FirstName">Email</label>
                    <input type="email" name="email" class="form-control mt-2" placeholder="Email" id="email">
                </div>
                <div class="col-7 mb-3">
                    <label for="FirstName">Password</label>
                    <input type="password" class="form-control mt-2" placeholder="Password" id="pass" name="pass">
                </div>
                <div class="col-7 mb-3">
                    <input type="submit" class=" btn col-2 btn-primary" id="save_btn" value="Submit" name="save_btn">
                </div>            
            </form>
        </div>
    </div>
    <?php 
    if (isset($_POST['save_btn'])){
        $fname = $_POST['first'];
        $lname = $_POST['last'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
    
        $query = "INSERT INTO users (fname,lname,email,pwd) VALUES ('$fname','$lname','$email','$pass')";
        $data = mysqli_query($con, $query);
        if($data) {
          ?>
           <script type="text/javascript">
           alert("data saved successs");
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

    <div class="container mt-5 col-7">
        <table class="table table-dark mb-3">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th> 
                <th scope="col">Actions</th> 
              </tr>
            </thead>
         <?php
         $query="SELECT * FROM users";
         $data=mysqli_query($con,$query);
         $result=mysqli_num_rows($data);
         if($result){
          while($row=mysqli_fetch_array($data)){
          ?>
          <tr>
          <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['pwd']; ?></td>
            <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
          </tr>
          <?php
         }
        }
        else{
          ?>
          <tr>
            <td>
              no records found
            </td>
          </tr>
          <?php
        }
         ?>
          </table>
    </div>
</body>
</html>
