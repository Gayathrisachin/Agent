
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
/*background:black;*/
/*background-image: url("C:/xampp/htdocs/Agent/image/call_center.jpg");
background-size: cover;*/
}
h1{
    color:#ffff;
    /*font-family: 'Kaushan Script', cursive;*/
}
#form{
    color: white;
    margin-top:50px;
    
}
#myform{
    position: relative;
  
        display: flex;
        padding: 1rem;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        background-color:gray;
        background-clip: padding-box;
        border: 1px solid rgba(255,255,0,.2);
    
        
        max-width: 500px;

}
</style>


</head>

<body style="background-image: url('/image/call_center.jpg');">

     
<div class="container" id="myform">
<div class="col-md-12" id="heading">
<h1 style="text-align:center">Agent Login</h1>
</div>
<center>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">
<div class="form-group">
			<label class="col-md-3 form-label text-md-right text-white">Username:</label>
            
            <input type="text"  name="user" required></div>
			
            <div class="form-group">

            <label label class="col-md-3 form-label text-md-right text-white">Password:</label>
            
            <input type="text" name="pass" required=""></div>
      
            <div class="form-group">
                <div class="col-md-3">
			<input type="submit" name="submit" value="Login" class="btn btn-success"></div></div>
		</form>
        
</center>
        
	
	
	</div>
    </body>
    </html>

<?php


// $host = "localhost";
// $database = "agentdb";
// $user = "root";
// $mpassword = "";

if (isset($_POST['user']) && isset($_POST["pass"])) {
if (empty($_POST['user']) || empty($_POST['pass'])) {
echo "Please enter Username and Password";
}
else
{

$username=$_POST['user'];
$password=$_POST['pass'];
}

$host = "localhost";
$database = "agentdb";
$user = "root";
$mpassword = "";

if( $_POST )
{
  $con = new mysqli($host, $user, $mpassword, $database);

  if ($con->connect_error)
  {
    die('Could not connect: ' . $con->connect_error);
  }


 $username = stripslashes($username);
 $password = stripslashes($password);


$sql = "SELECT * FROM  agent";
$rows = $con->query($sql);
if ($rows->num_rows > 0) {

while ($row = $rows->fetch_assoc()) {
    $name = $row["Agent_name"];
    $pass = $row["Agent_code"];
    // echo $name.$pass.$username.$password ;
  if($name == $username && $pass == $password){
        // echo "Success!";
        header('Location: index.php');
    }
   else{
        echo "Username or Password is invalid";

    } 
    
}
// 
} 
else {
echo "Username or Password is invalid";
}
}



$con->close(); 

}
?>
