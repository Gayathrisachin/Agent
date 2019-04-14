

<?php
include 'conn.php';
//Select Database
	// $id= $_POST['Agent_Code'];
$sql = "SELECT * FROM agent";
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Agent Database</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style type="text/css">
	body{
	margin:30px;
	padding: 30px;
}
h2{
color:#15979b;

}
table{
margin-top: 50px;
}
.btn{
	width:80px;
}

</style>


</head>
<body>
	  <div class="container">
  <header class="header">
    <div class="search">
    <form>
      
      
    <!--  <a id="search-btn" href="#"><i class="fas fa-search"></i></a>-->
      <form>
    </div>
  </header>

 <!--  <main id="main">
    
    <div class="city-icon">
      <div class="city-icon-holder">
      <div id="city-name"></div>
      <img src="" alt="" id="icon">
        </div>
    </div>
    
    <div class="temperature">
      <div id="temp"></div>
    </div>
    
   
    
  </main>
  
</div> -->

	
	<div class="container">
    <button type="submit" class="btn btn-info "><a href="logout.php" class="text-white">Logout</a></button></div>
 
		
      <h2 class="text-center">Agent Details</h2>

      
    
		<center><table border="1">
			<thead>
				<th>Agent_Code</th>
				<th>Agent_Name</th>
        <th>Email</th>
        <th>Agent_Country</th>
        <th>Agent_state</th>
        <th>Agent_City</th>
        <th>PhoneNo</th>
        <th>DOJ</th>
				
			</thead>
			<tbody>
						<?php
//Fetch Data from database

if($result->num_rows >0){
 while($row = $result->fetch_assoc()){ //fetch_assoc()-Returns an associative array that corresponds to the fetched row or NULL if there are no more rows.
 ?>
						<tr>
							<td><?php echo $row['Agent_code']; ?></td>
							<td><?php echo $row['Agent_name']; ?></td>
              <td><?php echo $row['Email']; ?></td>
              
              <td><?php echo $row['Country']; ?></td>
              <td><?php echo $row['State']; ?></td>
              <td><?php echo $row['City']; ?></td>
              <td><?php echo $row['Phone_num']; ?></td>
              <td><?php echo $row['DOJ']; ?></td>
							<td><button class="button button2"> <a href=edit.php?id=<?php echo $row['Agent_code']; ?>>EDIT</a> </button></td>
						</tr>
						<tr><input type="hidden" placeholder="Enter City Name" Value="<?php echo $row['City']; ?>" id="search-txt"></tr>
						<?php
                   }     
				}
				else{
					?><tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
			</tbody>
		</table>
		<br>
     
  <script src='https://use.fontawesome.com/releases/v5.0.13/js/all.js'></script>

    <script >
    const appKey = "f24f40b1c24505685fce3b8acd0fcffc";

let searchButton = document.getElementById("search-btn");
let searchInput = document.getElementById("search-txt");
let cityName = document.getElementById("city-name");
let icon = document.getElementById("icon");
let temperature = document.getElementById("temp");
let humidity = document.getElementById("humidity-div");

window.addEventListener("load", findWeatherDetails);
window.addEventListener("load", enterPressed);

function enterPressed(event) {
  if (event.key === "Enter") {
    findWeatherDetails();
  }
}

function findWeatherDetails() {
  if (searchInput.value === "") {
  
  }else {
    let searchLink = "https://api.openweathermap.org/data/2.5/weather?q=" + searchInput.value + "&appid="+appKey;
   httpRequestAsync(searchLink, theResponse);
  }
 }

function theResponse(response) {
  let jsonObject = JSON.parse(response);
  cityName.innerHTML = jsonObject.name;
  icon.src = "http://openweathermap.org/img/w/" + jsonObject.weather[0].icon + ".png";
  temperature.innerHTML = parseInt(jsonObject.main.temp - 273) +"C";
  humidity.innerHTML = jsonObject.main.humidity + "%";
}
/*
function httpRequestAsync(url, callback)
{
  console.log("hello");
    var httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = () => { 
        if (httpRequest.readyState == 4 && httpRequest.status == 200)
            callback(httpRequest.responseText);
    }
    httpRequest.open("GET", url, true); // true for asynchronous 
    httpRequest.send();
}*/
    </script>

</body>
</html>