
<?php
include("../serverfiles/db_connection.php");
if(!isset($_SESSION['id'])){
    header('Location: ../registration.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../user_assets/img/icon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="../assets/style.css">
<title>Create Account</title>
</head>
<style>
    #form-messages {
      width: 100%;
      font-size: max(16px, 1em);
      color: #b11515;
      padding: 12px 20px;
      margin: 8px 0;
      display: none;
      border: 3px solid #b11515;
      box-sizing: border-box;
      border-radius: 4px;
    }
</style>
<body>

<h2 style=" text-align: center;color:#b11515">BUP Blood Bank Management System</h2>


<div class="form">
  <div class="imgcontainer">
    <img src="../assets/img/icon.png" alt="Avatar" class="avatar">
    <p>Student Registration Form</p>
  </div>

  <div class="container">
  
    <ul id="form-messages"></ul>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" id="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="pass" required>

    <label for="cpass"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" id="cpass" required>

        
    <button type="submit" id="btn-submit">Next</button>

  </div>

  </div>
<script>
        const form = {
            email: document.getElementById('email'),
            pass: document.getElementById('pass'),
            cpass: document.getElementById('cpass'),
            submit: document.getElementById('btn-submit'),
            messages: document.getElementById('form-messages')
        };

     
        form.submit.addEventListener('click', () => {
          if((form.pass.value).length<7){
              const li = document.createElement('li');
              li.textContent = "password can't be too short";
              form.messages.appendChild(li);
              form.messages.style.display = "inline-block";

          }else{

              if(form.pass.value==form.cpass.value){

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


                const requestData = `email=${form.email.value}&pass=${form.pass.value}`;

                request.open('post', '../serverfiles/create_account.php');
                request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                request.send(requestData);

                }else{
                    const li = document.createElement('li');
                    li.textContent = 'passowrd not matched';
                    form.messages.appendChild(li);
                    form.messages.style.display = "inline-block";
                }

          }
          
        });

        function handleResponse (responseObject){
          if (responseObject.ok) {
                location.href = '../login.php';
            } else {
              while (form.messages.firstChild) {
                    form.messages.removeChild(form.messages.firstChild);
                }

                responseObject.messages.forEach((message) => {
                    const li = document.createElement('li');
                    li.textContent = message;
                    form.messages.appendChild(li);
                });

                form.messages.style.display = "inline-block";
            }
        }
            
</script>
</body>
</html>

