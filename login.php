<?php 
session_start();  // hum session ka use is liye krte ki agr user login na ho usey sara important data na show kro .only login k bad hi show krna.
?>



<?php  
$conn=mysqli_connect("localhost","root","","crud_operation");

if(isset($_POST['login'])){

$Username=$_POST['username'];
$password=$_POST['pass'];

$query="SELECT * FROM picture WHERE name='$Username' && password='$password' ";

$data=mysqli_query($conn,$query);

$total=mysqli_num_rows($data); //ye data ko check krega ki table me exist krta h ki nhi ,agr data h to return k 1 otherwise false o return k.
// echo $total;


if($total == 1){

    //redirect krne se phle ek session bna le aur usey display wali page pr redirect krde, usi session ko.
$_SESSION['user_name']=$Username; // ye $Username variable h jiske through hm login kraye the.,, user_name ye session ka variable h.
    // echo "login Sucessfull";
    header('location:list.php');
    //redirect krne se phle ek session bna le aur usey display wali page pr redirect krde.

}else{
echo "login failed";

}





}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        <form action="" method="post" autocomplete="off"> 
        <div class="form">
            <input type="text" name="username"  class="txt" placeholder="Username">
            <input type="password" name="pass"  class="txt" placeholder="Password">
            <div class="forgetpass"><a href="forget.php" onclick="message()">Forgot Password?</a></div>
            <input type="submit" name="login" class="btn" value="Login">
            <div class="singup">New Member?<a href="create.php">SignUp Here</a></div>
        </div>
    </div>
    </form>
    <script>
        function message(){
            alert("password yaad kro");
        }
    </script>
</body>

</html>

