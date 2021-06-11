<?php

include("serverfiles/db_connection.php");

if(!isset($_SESSION['Auth_id'])){
    header('Location: login.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="user_assets/img/icon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="user_assets/style.css">
<title>Home</title>
<style>
  .suggestion{

    height: 10px;
    text-align: right;
    
  }
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="profile/myprofile.php">Profile</a>
  <a href="profile/allprofiles.php">All Members</a>
  <div class="search-container">
    <form method='post' action="">
      <button type="submit"name="but_logout">Logout</button>
    </form>
  </div>
  <div class="search-container">
    <form>
      <input type="text" placeholder="Search.." id='search'name="search"onkeyup="showHint(this.value)">
      <button type="button" id="submit" >Submit</button>
    </form>
  </div>
</div>

<div class="suggestion">
  <p><span id="txtHint"></span></p>
</div>

<div class="row">
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b1.png" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>City Blood bank</h1> 
        <p>Md Jamal Uddin</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
</div>
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b2.jpg" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>Blood Cross Society</h1> 
        <p>Hasan Chowdhury</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
  </div>
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b3.jpg" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>Rotary Blood Bank</h1> 
        <p>Akbar Kamal</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b4.jpg" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>Friends2support</h1> 
        <p>Shofiq Bhuiwa</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
  </div>
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b5.jpg" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>No More Thalassemia</h1> 
        <p>Md Patowary</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
  </div>
  <div class="column">
    <div class="flip-card">
      <div class="flip-card-inner">
            <div class="flip-card-front">
              <img src="user_assets/img/b6.png" style="float:center;width:100%;height:100%;" alt="Avatar">
          </div>
      <div class="flip-card-back">
        <h1>Thalassemia Blood Bank</h1> 
        <p>Nehal Nistar</p> 
        <p>+8801794807577</p>
      </div>
    </div>
  </div>
  </div>
</div>
  <!-- footer start -->
  <?php include 'footer.php';?>
  <!-- footer end -->
<script>

  // ajax show name suggestion
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
        console.log(this.responseText);
      }
    };
    xmlhttp.open("GET", "serverfiles/name_suggestion.php?q=" + str, true);
    xmlhttp.send();
  }
}



//ajax searching
const form = {

            search: document.getElementById('search'),
            submit: document.getElementById('submit'),
            messages: document.getElementById('form-messages')
        };

     
        form.submit.addEventListener('click', () => {

          const request = new XMLHttpRequest();

          request.onload = () => {
            let responseObject = null;

            try {
                responseObject = JSON.parse(request.responseText);
            } catch (e) {
                console.error('Could not parse JSON!');
            }

            if (responseObject) {
                handleResponse(responseObject);
            }
          };

          const requestData = `search=${form.search.value}`;
         
          request.open('post', 'serverfiles/search_query.php');
          request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          request.send(requestData);

        });

        function handleResponse (responseObject){
          if (responseObject.ok) {
                location.href = 'search.php';
            } else {
              document.getElementById("txtHint").innerHTML = responseObject.messages;
            }
        }
            
</script>
</body>
</html>
