<?php
  include 'conn.php';
//Get ID from Database
if(isset($_GET['id'])){
 $sql = "SELECT * FROM agent WHERE Agent_code =" .$_GET['id'];
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_assoc($result);
}
//Update Information
if(isset($_POST['btn-update'])){
 $name = $_POST['username'];
  $email = $_POST['email'];
 $upass = $_POST['password'];
 $city = $_POST['city'];
 $state = $_POST['state'];
 $country = $_POST['country'];
 $mobile = $_POST['phone'];
 $doj = $_POST['doj'];
 $update = "UPDATE agent SET city='$city',state='$state',country='$country',phone_num='$mobile' WHERE Agent_code= $upass";
 $up = mysqli_query($con, $update);
 if(!isset($up)){
 die ("Error $sql" .mysqli_connect_error());
 }
 else
 {
 header("location: index.php");
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Agent Database</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
body{
margin:20px;
padding: 20px;
}
h2{
    color:#15979b;
   
}
#form{
    color: white;
}

</style>
</head>
<body>
  <center><h2>Edit Your Details</h2></center>
  <div class="container">
    
  <div class="row">
      <!-- left column -->
      <div class="col-md-3">
        
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" style="margin-top: 120px">
    <div class="form-group">
    <label class="col-lg-3 control-label ">Name:</label>
    <div class="col-lg-8">
    <input class="form-control" type="text" name="username" value="<?php echo $row['Agent_name']; ?>" readonly></div></div>

<div class="form-group">
    <label class="col-lg-3 control-label ">Email:</label>
    <div class="col-lg-8">
    <input class="form-control" type="text" name="email" value="<?php echo $row['Email']; ?>" readonly></div></div>

    <div class="form-group">
    <label class="col-lg-3 control-label">Code:</label>
    <div class="col-lg-8">
    <input class="form-control" type="text"  name="password" value="<?php echo $row['Agent_code']; ?>" readonly></div></div>

    <div class="form-group">
        <label class="col-lg-3 control-label">Country:</label>
        <div class="col-lg-8">
        <input class="form-control" type="text" name="country" value="<?php echo $row['Country']; ?>" ></div></div>

        <div class="form-group">
        <label class="col-lg-3 control-label">State:</label>
        <div class="col-lg-8">
        <input class="form-control" type="text" name="state" value="<?php echo $row['State']; ?>" ></div></div>

        
        <div class="form-group">
        <label class="col-lg-3 control-label">City:</label>
        <div class="col-lg-8">
        <input  class="form-control" type="text" name="city" value="<?php echo $row['City']; ?>" ></div></div>

        <div class="form-group">
          <label class="col-lg-3 control-label">Phone_no:</label>
          <div class="col-lg-8">
          <input class="form-control" type="text" name="phone" value="<?php echo $row['Phone_num']; ?>" ></div></div>

        <div class="form-group">
          <label class="col-lg-3 control-label">DOJ:</label>
          <div class="col-lg-8">
          <input class="form-control" type="text" name="doj" value="<?php echo $row['DOJ']; ?>" readonly></div></div>
          <div class="col-lg-8">
    <button type="submit" class="btn btn-info" name="btn-update" id="btn-update"><strong>Update</strong></button>
  
<button type="submit" class="btn btn-info "><a href="logout.php" class="text-white">Logout</a></button></div>
<!--  <script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script> -->

</body>
</html>