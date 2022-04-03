<?php include "database.php"?>
<html>
<body>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css" >

</head>
<?php

//for count visitor
/*$sql = "SELECT  `visitor_count` FROM `visitor_counter`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $arr=$stmt->fetch(pdo::FETCH_ASSOC);
  echo $arr[0]['visitor_count'];
  ?>*/
?> 

<div class="container">
  <form action="animal.php" method="POST">
  <div class="title">
    Pixel6
</div>
<div class="input_field"> 

</div>

<div class="input_field"> 
<label>Animal Name: <input type="textbox" class="input" name="name1" ></label>
</div>

<div class="input_field"> 
<select name="category">
        <option selected disabled value="not selected">Categories</option>
        <option value="herbivorus">Herbivores</option>
        <option value="omnivores">Omnivores</option>
        <option value="omnivores">Carnivores</option>
        
    </select></div> <br>


    <div class="input_field"> 
<br><label>Image: Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"><br>
  
</br></div>

<div class="input_field"> 
<br><label>Description:</label> 
<textarea rows="9" cols="50" name="comment">  
</textarea> 
</div>

<div class="input_field"> 
<br><label>Life expectancy:<select name="life">
        <option selected disabled value="not selected">Life expectancy</option>
        <option value="fy">0-1 year</option>
        <option value="sy">1-5 year</option>
        <option value="ty">5-10 year</option> 
	<option value="qy">10-15+ year</option>
    </select></label> <br>
</div>




<br>
<div class="input_field"> 
<label>Captcha:</label> 
  <?php 
	$no1=rand(1,10);
	
	$no2=rand(1,10);

	echo $no1."+".$no2;
 
?>

<br>
<input type="hidden" name="no1" value="<?php echo $no1 ?>">
<input type="hidden" name="no2" value="<?php echo $no2 ?>">
<input type="textbox" name="userans" >
<input type="submit" class="btn" value="submit" name="submit">
</div >
<?php
  
  //if(isset($_REQUEST["submit"]))
	
 

?>


 </form>
</body>
</html>

<?php
if($_POST['submit'])
{
$name     =$_POST['name1'];
$category =$_POST['category'];
//$img      =$_FILES["fileToUpload"]["name"];
$comment  =$_POST['comment'];
$life     =$_POST['life'];

$userans=$_REQUEST["userans"];
$number1=$_REQUEST["no1"];
$number2=$_REQUEST["no2"];
$total=$number1+$number2;
if($total==$userans)
{
  echo "You are a Human";
}else{
  echo "You are a robot";
}


$query = "INSERT INTO `animal`
  (`Animal_name`, `category_name`, `description`, `life`, `img`)
         VALUES ('$name', '$category', '$comment','$life')";

    $result =mysqli_query($conn,$query); 

    if($result)
    {
     // move_uploaded_file($_FILES["fileToUpload"]["temp_name"]."upload/".$_FILES["fileToUpload"]["name"]);
      echo "Data inserted into database";

    }else{
      echo " failed";
    }

}



?>