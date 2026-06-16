<?php  
session_start();
?>


<?php  
$conn=mysqli_connect("localhost","root","","crud_operation");

 $id=$_GET['id'];
 
 $userprofile=$_SESSION['user_name'];
if($userprofile == true){
    

}else{

    header('location:login.php'); //agr session set na hua to usey eapas login ke page pr bhej de.
}


$sql="SELECT * FROM picture WHERE id='$id'  ";
$data=mysqli_query($conn,$sql);

$result=mysqli_fetch_array($data);
 

if(isset($_POST['edit'])){
    $image_id=$_POST['id'];
    $Name=$_POST['name'];
    $Email=$_POST['email'];
    $Pass=$_POST['pass'];

  
    $new_image=$_FILES['image']['name'];
    $old_image=$_POST['image_old'];


//if user enter an image update old image with new image else let it be old image.
if($new_image !=''){   
   $update_filename=$new_image;
}else{
    $update_filename=$old_image; //agr new image null rhta h mtlb hm koi nya image nhi lete/image update nhi k to old wala image hi rhne do.
}

$esql="UPDATE picture SET name='$Name',email='$Email',password='$Pass',image='$update_filename' WHERE id='$image_id'  ";
$A=mysqli_query($conn,$esql);


if($A){
//image succesfully update hone k bad use kro move_uploaded_file($tmp_filename ,$destination ) to particular folder. 
       if($new_image ){
         move_uploaded_file($_FILES['image']['tmp_name'],"upload/".$new_image);
         if (file_exists("upload/". $old_image)) {
          unlink("upload/".$old_image);//new image update hone k bad old wala image delete hojaye upload folder se. 
        }    
       }
       header("Location: list.php");
            exit;        
}else{
    echo "image updation failed";
    header("location:edit.php");
    exit;
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>IMAGE CRUD</h1>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php  echo $result['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $result['name']; ?>"> <br><br>
        Email: <input type="email" name="email"  value="<?php echo $result['email']; ?>" > <br><br>
        Password: <input type="password" name="pass"   value="<?php echo $result['password']; ?>"> <br><br>

        Image: <input type="file" name="image"> <br><br>
        <input type="hidden" name="image_old" value="<?php echo $result['image'];  ?> ">
        <img src="<?php echo "upload/".$result['image']; ?>" width="100px" height="80px">
        <br><br>
        <button name="edit" class="btn btn-primary">Edit</button>
    </form>
</body>
</html>