<?php
session_start();
echo "Welcome ".$_SESSION['user_name'];
?>

<html>
    <head>
        <title>Display</title>
        <style>

            body{
                background: #D071f9;
            }table{
                background-color: white;
            }
            .Update{
                background-color: green;
                color:white;
                cursor: pointer;
                border:0;
                outline:none;
                border-radius: 2px;
                height:20px;
                width:55px;
                font-weight: bold;
            }
            .Delete{
                background-color: red;
                color:white;
                cursor: pointer;
                border:0;
                outline:none;
                border-radius: 2px;
                height:20px;
                width:55px;
                font-weight: bold;
            }

        </style>
    </head>




<?php
include("connection.php");
error_reporting(0);
$Query="SELECT * FROM users";
$data=mysqli_query($conn,$Query);

$total=mysqli_num_rows($data);
// echo $total;

if($total !=0)
{
    ?>
    <h2 align="center"><mark>Displaying All Record's</mark></h2>

    <table align="center" border="1" cellspacing="7" width="100%">
        <tr>
        <th width="5%">Id</th>
        <th width="5px">Image</th>
        <th width="10%">Fname</th>
        <th width="10%">Lname</th>
        <th width="5%">Gender</th>
        <th width="15%">email</th>
        <th width="10%">Phno</th>
        <th width="5%">Caste</th>
        <th width="15%">Language</th>
        <th width="10%">Add</th>
        <th width="10%">Operations</th>
        </tr>

       <!-- id and fname and etc take from database.-->
    <?php
    while($result=mysqli_fetch_assoc($data)){
        echo "<tr>
        <td>".$result['id']."</td>
        <td><img src='".$result['img_source']."' height='100px' width='100px'></td>
        <td>".$result['fname']."</td>
        <td>".$result['lname']."</td>
        <td>".$result['gender']."</td>
        <td>".$result['email']."</td>
        <td> ".$result['phno']."</td>
        <td>".$result['caste']."</td>
        <td>".$result['language']."</td>
        <td>".$result['address']."</td>


        <td><a href='update.php? id=$result[id]'><input type='submit' value='Update' class='Update'></a>
        <a href='delete.php? id=$result[id]'><input type='submit' value='Delete' class='Delete' onclick='return checkdelete()'></a></td>
        </tr>
        ";
    }
}
else
{
    echo "No record found";
}
?>
</table>
<script>

    function checkdelete(){
        return confirm('Are you sure you want to delete this record');
    }

</script>
</html>
