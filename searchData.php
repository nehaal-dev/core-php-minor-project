<?php   
$conn=mysqli_connect("localhost","root","","crud_operation");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <?php  
    
    $data=$_GET['data'];

    $sql="SELECT * FROM picture WHERE id='$data' ";

   $result= mysqli_query($conn,$sql);

   $row=mysqli_fetch_array($result);

   echo  '<div class="container">
<div class="jumbotron bg-light">
  <h1 class="display-4 text-center text-success">  WELCOME    ' . $row['name'] . '</h1>
  <p class="lead text-center text-danger"> Your email id: ' . $row['email'] . '</p>
  <hr class="my-4">
  <p class="lead">
    <a class="btn btn-info btn-lg  " href="search.php" role="button">Back</a>
  </p>
</div>
</div>';
    
    ?>

 



</body>
</html>