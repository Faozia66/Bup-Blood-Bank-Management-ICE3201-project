<?php

include("../serverfiles/db_connection.php");

if(!isset($_SESSION['Auth_id'])){
    header('Location: ../login.php');
}

//fetching user information
$name='';$phone='';$bg='';$dob='';$ld='';
$id=$_SESSION['Auth_id'];
$conn = OpenCon();
$sql="SELECT * FROM `profiles`  WHERE id='$id';";
if($result = mysqli_query($conn, $sql)){

  while($row = mysqli_fetch_array($result)){
    $name=$row['name'];$phone=$row['phone'];$bg=$row['b_group'];
    $dob=$row['dob'];$ld=$row['last_donation'];
  }
}


if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../user_assets/img/icon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="../user_assets/style.css">
<title>My profile</title>
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
  <a class="active"href="myprofile.php">Profile</a>
  <a href="allprofiles.php">All Members</a>
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


<div class="container">
  <form action="../serverfiles/edit_profile.php" method="POST">
  

    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="Not Set"value="<?php echo $name?>" onkeyup="myFunction()">

    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" placeholder="Not Set"value="<?php echo $phone?>" onkeyup="myFunction()">

    <label for="b_group">Blood Group</label>
    <input type="text" id="b_group" name="b_group" placeholder="Not Set"value="<?php echo $bg?>" onkeyup="myFunction()">

    <label for="dob">Date of Birth</label>
    <input type="text" id="dob" name="dob" placeholder="Not Set"value="<?php echo $dob?>" onkeyup="myFunction()">

    <label for="last_donation">Last Donation</label>
    <input type="text" id="last_donation" name="last_donation" placeholder="Not Set"value="<?php echo $ld?>" onkeyup="myFunction()">

  
    <input type="submit" value="Update" id="update_btn" disabled style=" display: none;">
  </form>
</div>
  <!-- footer start -->
  <?php include '../footer.php';?>
  <!-- footer end -->
<script>
    function myFunction() {

      document.getElementById('update_btn').removeAttribute('disabled');
      document.getElementById("update_btn").style.display = 'block';
}

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
