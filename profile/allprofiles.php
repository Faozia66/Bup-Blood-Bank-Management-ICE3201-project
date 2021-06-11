<?php

include("../serverfiles/db_connection.php");
$conn = OpenCon();
if(!isset($_SESSION['Auth_id'])){
    header('Location: ../login.php');
}

if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../user_assets/img/icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="../user_assets/style.css">
    <title>All Members</title>
    <style>
  .suggestion{

    height: 10px;
    text-align: right;
    
  }
</style>
</head>
<body>
<div class="topnav">
  <a href="../index.php">Home</a>
  <a href="myprofile.php">Profile</a>
  <a class="active"href="allprofiles.php">All Members</a>
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

<?php
$sql = "SELECT * FROM profiles";
$result = mysqli_query($conn, $sql);
if($result){
    while($row = mysqli_fetch_array($result)){
        echo "<div class='member'>";
        echo "<img src='../user_assets/img/avatar.png' alt='Avatar' style='width:90px'>";
        echo "<p><span>Name:". $row['name'] ."</span> Blood Group:" . $row['b_group'] ."</p>";
        echo "<p>Last Donate:". $row['last_donation'] ."</p>";
        echo "<p>Phone:". $row['phone'] ."</p>";
        echo "</div>";
    }
}else{
    echo "No records found.";
}

?>
  <!-- footer start -->
  <?php include '../footer.php';?>
  <!-- footer end -->

<script>
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
    xmlhttp.open("GET", "../serverfiles/name_suggestion.php?q=" + str, true);
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
         
          request.open('post', '../serverfiles/search_query.php');
          request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          request.send(requestData);

        });

        function handleResponse (responseObject){
          if (responseObject.ok) {
                location.href = '../search.php';
            } else {
              document.getElementById("txtHint").innerHTML = responseObject.messages;
            }
        }
</script> 
</body>
</html>