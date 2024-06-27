<?php
include('connection.php');

$id=$_GET['id'];
$query="DELETE FROM users WHERE id='$id'";
$result=mysqli_query($conn,$query);
if(!$result){
    echo "Deleteion Failed";
}
else
{
    // echo "Data is Deleted";
    // echo "<script>alert('Delete Data from dataBase')";
}
?>
<meta http-equiv = "refresh" content = "0; url=http://localhost/CRUD4/display.php" />
<?php
?>