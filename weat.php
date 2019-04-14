<html>
<head>
  <meta charset="UTF-8">
  <title>Weather Application</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">
	  <style>
body{
  background-color: #eee;
}

.container{
  width: 500px;
  height: 300px;
  margin:25vh auto;
  border-radius: 25px;
  box-shadow: 0 20px 40px 0px rgba(0,0,0,0.3)
}

.header {
  height: 20%;
  background-color: #FF9800;
  border-top-left-radius: 25px;
  border-top-right-radius: 25px;
  text-align: center;
  position:relative;
}

#temp, #humidity-div {
  font-family: "Courier New";
  font-weight: bold;
  font-size: 60px;
  color: #fff;
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.city-icon-holder {
  position:absolute;
  left: 25%;
  top: 40%;
  -webkit-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
  text-align: center;
}

#city-name {
  font-family: "Courier New";
  font-size: 30px;
  font-weight: bold;
  color: #fff;
}

#icon {
  width:50%;
}

#main{
  width: 100%;
  height: 100%;
  position: relative;
}

.city-icon {
  height: 80%;
  width: 50%;
  border-bottom-left-radius: 25px;
  background-color: #FFC107;
}

.temperature {
  position: absolute;
  left: 50%;
  top:0%;
  height: 40%;
  width: 50%;
  background-color: #9C27B0;
}

.humidity {
  height: 40%;
  width: 50%;
  position:absolute;
  left:50%;
  top:40%;
  border-bottom-right-radius: 25px;
  background-color: #E91E63;
}

#search-btn {
  width: 40px;
  height:40px;
  color: #eee;
}

#search-txt {
  color: red;
  height:30px;
  border-radius: 10px;
  border-style:none;
  outline:none;
  padding-right:1px;
  padding-left:1px;
  text-align:center;
}

.search {
  position: absolute;
  left: 50%;
  top:50%;
  -webkit-transform:translate(-50%,-50%);
          transform:translate(-50%,-50%);
}
</style>
</head>

<body>

  <div class="container">
  <header class="header">
    <div class="search">
	<form>
      <input type="text" placeholder="Enter City Name" Value="<?php echo $row1['city'];?>" id="search-txt">
	  
    <!--  <a id="search-btn" href="#"><i class="fas fa-search"></i></a>-->
	  <form>
    </div>
  </header>

  <main id="main">
    
    <div class="city-icon">
      <div class="city-icon-holder">
      <div id="city-name"></div>
      <img src="" alt="" id="icon">
        </div>
    </div>
    
    <div class="temperature">
      <div id="temp"></div>
    </div>
    
    <div class="humidity">
      <div id="humidity-div"></div>
    </div>
    
  </main>
  
</div>
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
}
	</script>
<html>
<head><script type="text/javascript" src="http://api.eventful.com/js/api"></script></head>
<body>
  <div id="ets"><div>
<script type="text/javascript">
window.addEventListener("load", show_alert2);

function show_alert2()
{
   var app_key = "jcP6d2QX9tSJ6CDg";
   var where   = "<?php echo $row1['city'];?>";
   var query   = "music";
   var oArgs = {
      app_key: "jcP6d2QX9tSJ6CDg" ,
      q: "music",
      where: where,
      page_size: 3,
       sort_order: "popularity",
   };
   EVDB.API.call("/events/search", oArgs, function(oData) {
    let icon = document.getElementById("icon");
      var data = JSON.stringify(oData);
      var obj = JSON.parse(data);
      function simplifyObject(obj){
  return obj.events.event.map((x) => { return { title: x.title, date: x.start_time, venue_name: x.venue_name, venue_address: x.venue_address, postal_code: x.postal_code, image: x.image.medium.url, url: x.venue_url } });
}
      var result = simplifyObject(obj);//result is an array of objects
      var table = "";
      for(i=0; i<result.length;i++){
      table += "<a href='" +result[i].url+ "' >"   + result[i].title
                                                    +  "</a>" + "</br><img alt='' src='" +result[i].image+ "' >" +
                                                    "</br>Address" + result[i].venue_address + "</br>Timings: " + result[i].date+ "</br>";
       document.getElementById("ets").innerHTML = table;                                   
  
  }
    });
}
</script>

</body>
</html>