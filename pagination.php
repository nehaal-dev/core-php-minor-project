<?php  
 include('header.php');
 include('footer.php');

 $conn=mysqli_connect("localhost","root","","crud_operation");

$limit=4;
 

if(isset($_GET['page'])){// ye set h to hme  $page=$_GET['page']; e miega nhi to $page=1 krdo.
    $page=$_GET['page']; 

}else{
$page=1;
}

//$offset=(page no-1)*limit; formula

$offset=($page-1)*$limit;


$sql="SELECT * FROM picture ORDER BY id   LIMIT {$offset},{$limit}  ";
$result=mysqli_query($conn,$sql) or die("query failed");

 
 ?>
<div class="container">
    <div class="row">
        <div class="col md-8">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h1 class=" text-white text-lg-center">Pagination in Table data</h1>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Picture</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php   while($row=mysqli_fetch_array($result)){   ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['name']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['password']; ?></td>
                                <td><img src="<?php echo "upload/".$row['image']; ?>" alt="Pic" width="80px"
                                        height="60px"></td>
                                <td><a href="edit.php?id=<?php echo $row['id'];  ?>" class="btn btn-info">Edit</a></td>
                                <td>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['id'];  ?> ">
                                        <input type="hidden" name="image" value="<?php echo $row['image'];  ?>">
                                        <button type="submit" name="del_img" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                    

                    <?php  
                    $sql1="SELECT * FROM picture";
                    $result1=mysqli_query($conn,$sql1);

if(mysqli_num_rows($result1)>0){

    $total_records=mysqli_num_rows($result1);
    
    $total_page=ceil($total_records/$limit);

echo ' <ul class="pagination admin-pagination">';
if($page>1){ //$page variable me page no pass horha h--> prev wala btn tbhi dikhe jb hm ek se jyada pageno pr ho.
    echo '<li><a  href="pagination.php?page='.($page-1).' ">Prev</a></li>';
}
 
     for($i=1; $i<=$total_page;  $i++){ 
        //page ko active dikhane k liye.
        if( $i== $page){// $i jo ki pagno h wo agr uper link me pass kiye $page ke equal ho jaye to active show kra do.
            $active="active";
        }else{
            $active="";
        }
        echo '<li  class=" '.$active.' " ><a  href="pagination.php?page='.$i.' ">'.$i. '</a></li>' ; 
     }
     if($total_page>$page){//toal jitna page h wo pageno se bada ho to tbhi next wala btn show ho. mean 4 pageno ke aagey next ka btn show nhi ho.
        echo '<li><a href="pagination.php?page='.($page + 1).' ">Next</a></li>';
     }
     
  echo '</ul>';

}
?>
                </div>
            </div>
        </div>
    </div>
</div>

















<!-- <div class="ul">
    <ul style="text-align:center">
    <l1 class="active"><a>1</a></l1>
    <l1><a>2</a></l1>
    <l1><a>3</a></l1>
    <l1><a>4</a></l1>
    </ul>
</div> -->