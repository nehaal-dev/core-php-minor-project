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
<style>
input {
    width: 50%;
    height: 35px;
    border-radius: 5px;

}

.btn {
    border-radius: 5px;
    border: none;
}

.btn:hover {
    background-color: red;
}
</style>

<body>
    <div class="container mt-5">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="search value here">
            <button class="btn btn-primary" name="submit">Search</button>
        </form>

        <div class="container my-5">
            <table class="table table-bordered">
                <?php 
    if(isset($_POST['submit'])){//jaise hi submit btn set hojaye  input box me jo bhi search krte usko post method k through $search variable  me store kra dete ar isi  variable k basis pr search result perform krte.t
      $Search=$_POST['search'];
      $sql="SELECT * FROM picture  WHERE id like '%$Search%' or name like '%$Search%'  or email like '%$Search%' or password  like '%$Search%' "; //hm jo bhi input box me data enter krte earch k liye wo brabar ho jaye jo data stored h database me.

      $result=mysqli_query($conn,$sql);

     
      if (mysqli_num_rows($result) > 0) {
        echo '<table class="table table-border">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>';
        
        // Fetching all rows instead of just one
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>
                

                      <td><a href="searchData.php?data='.$row['id'].' ">'. $row['id']. '</td>

                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['password'] . '</td>
                    <td><img src="upload/'.$row['image'].' " width="60px" height="50px"></td>
                  </tr>';
        }
        
        echo '  </tbody>
              </table>';
    } else {
        echo '<h2 style="color:red;">Data not found</h2>';
    }
    
    
      }
    ?>









            </table>
        </div>
    </div>
</body>

</html>