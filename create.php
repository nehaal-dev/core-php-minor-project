
<?php 
$conn=mysqli_connect("localhost","root","","crud_operation");

if(isset($_POST['save'])){

    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Pass=$_POST['pass'];

    $file_name=$_FILES['image']['name'];
    $file_tmp=$_FILES['image']['tmp_name'];

    move_uploaded_file($file_tmp,"upload/".$file_name);


$sql="INSERT INTO picture(name,email,password,image) VALUES('$Name','$Email','$Pass','$file_name' )";

$query=mysqli_query($conn,$sql);

if($query){
    echo "image inserted succesfully into database";
}else{
    echo "failed";
}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>IMAGE CRUD- Create User</h1>
</head>
<body>
    <form action=""  method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" > <br><br>
        Email: <input type="email" name="email" > <br><br>
        Password: <input type="password" name="pass"> <br><br>

        Image:  <input type="file"  name="image"> <br><br>
        <button  name="save" class="btn btn-primary">Submit</button>
    </form>
</body>
</html>