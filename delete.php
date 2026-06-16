<?php  
session_start();
?>





<?php  

$conn=mysqli_connect("localhost","root","","crud_operation");

$userprofile=$_SESSION['user_name'];
if($userprofile == true){
    

}else{

    header('location:login.php'); //agr session set na hua to usey eapas login ke page pr bhej de.
}


if(isset($_POST['del_img'])){

    $id=$_POST['id'];  
    $image=$_POST['image'];

    $dsql="DELETE FROM picture WHERE id='$id' ";

    $B=mysqli_query($conn,$dsql);

if($B){
    
    unlink("upload/".$image);//new image update hone k bad old wala image delete hojaye upload folder se.
    echo "deleted sucessfully";
    header('location:list.php');
}else{
    echo "deletion failed";
    header('location:list.php');
}


}

 








?>