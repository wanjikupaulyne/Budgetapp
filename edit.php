<?php
$servername = "localhost";
$databasename = "budgetapp";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>


<?php
if (isset($_GET['id'])) {
	$selectedid=$_GET['id'];
	
}
	
		
	elseif (isset($_POST['btn_update'])) {
          $id=$_POST['id'];
          $itemname=$_POST['itemname'];
           $itemcost=$_POST['itemcost'];

          $query="UPDATE budgetitem_tbl SET itemname='{$itemname}',
          itemcost='{$itemcost}'

          WHERE id=$id";
          $result=mysqli_query($conn,$query ) or die(mysqli_error($conn));
	    header("Location: edit.php");
	}
	else{header("Location: index.php?success=true&$selectedid=id");}
   
      $query="SELECT* FROM budgetitem_tbl WHERE id=$selectedid";
      $result= mysqli_query($conn,$query);
		 while($row=mysqli_fetch_array($result)){
    	$itemname=$row['itemname'];
    	$itemcost=$row['itemcost'];

    }
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>form</title>

<style>
input {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
     color: #fff;
     background-color: #0f69c3;
     border:none;
   
     margin-top: 30px;
     padding: 10px;

}
.container{
  margin: 0px auto;
}
</style>


</head>
<body style="background-image: url(images/back.jpg);
  background-repeat: no-repeat;
  background-size: cover;
  color: #fff;"

>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php
if (isset($_GET['success'])) {
  # code...

?>

<div class="alert alert-success alert ">
    
    <strong>Success!</strong> 
  </div>
<?php
}
?>

<!-- form2 start -->
  <center>
  
  <form class="form-control" method="POST" action="edit.php" style="margin-top: 80px;">
    <input type="hidden" name="id" value="<?php echo $selectedid; ?> ">
    
    <input type="text" name="itemname"  value="<?php echo $itemname; ?>" placeholder="Enter item name" style="text-align: left;"><br>
    <input type="text" name="itemcost" value="<?php echo $itemcost; ?>" placeholder="Enter item cost"><br>
    <input type="submit" name="btn_update" class="btn btn-primary" value="Update"  >
    <input type="submit" name="btn btn_danger" value="Cancel"  class="btn btn-primary" >

  </form>
 </center>
  <!-- form2 collapse -->
	</div>
	</div>
