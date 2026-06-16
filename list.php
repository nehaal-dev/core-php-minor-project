<?php  
session_start();
echo "Welcome " .$_SESSION['user_name'];

?>


<?php  
$conn=mysqli_connect("localhost","root","","crud_operation");

$userprofile=$_SESSION['user_name'];

if($userprofile == true){


}else{

    header('location:login.php'); //agr session set na hua to usey eapas login ke page pr bhej de.
}

$sql="SELECT * FROM picture";
$result=mysqli_query($conn,$sql);



?>

<table align="center" width=50%  border=2px>

<tr> <th>ID</th><th>Name</th><th>Email</th><th>Password</th><th>Picture</th><th>Edit</th><th>Delete</th></tr>

     <?php   while($row=mysqli_fetch_array($result)){   ?>
        <tr>
            <td><?php  echo $row['id']; ?></td>
            <td><?php  echo $row['name']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['password']; ?></td>

            <td><img src="<?php echo "upload/".$row['image']; ?>" alt="Pic" width="80px" height="60px"></td>

            <td><a href="edit.php?id=<?php echo $row['id'];  ?>" >Edit</a></td>

            <td>
            <form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id'];  ?> ">   <!--isey id milega text/image ko delete krne  ke liye -->
                <input type="hidden" name="image" value="<?php echo $row['image'];  ?>"> <!--ye wale se folder me jo image h wo bhi delete hojayega  table me delete button click krne pr  HUM basically image k nam lete name="image" delete k ke liye-->

             <button type="submit" name="del_img" >Delete</button>
            </form>
        </td></tr>


 <?php  } ?>

  
</table>
 <a href="logout.php"><input type="submit"  name="" value="LogOut"  style="background:blue; color:white;height:35px;width:100px; margin-top:20px; font-size:15px; border:0; border-radius:5px; cursor:pointer;"></a> 
