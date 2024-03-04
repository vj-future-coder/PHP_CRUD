<?php
include 'connection.php';

$id=$_GET['id'];
$query="Delete from users where id='$id'";
$data=mysqli_query($con,$query);
if($data){
    ?>
    <script type="text/javascript">
        alert "delete successfuly";
        window.open("","_self");
    </script>
    <?php
}

?>