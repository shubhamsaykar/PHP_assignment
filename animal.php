<?php
error_reporting(0);
include("database.php");
$query="SELECT * FROM animal";
$data = mysqli_query($conn,$query);
$total=mysqli_num_rows($data);
//echo $data;

if($total !=0)
{
    ?>
    <table border="3px">
        <tr>
        <th>Animal_name</th>
        <th>category_name</th>
        <th>description</th>
        <th>life</th>
        </tr>
            
    



    <?php
    while($result=mysqli_fetch_assoc($data))
    {
        echo "
        <tr>
        <td>".$result['Animal_name']."</td>
        <td>".$result['category_name']."</td>
        <td>".$result['description']."</td>
        <td>".$result['life']."</td>
        </tr>
        ";
    }
 
}else{
    //echo "No records found";
    }

?>
</table>

