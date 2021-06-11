
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="user_assets/img/icon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="assets/style.css">
<title>Login</title>
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
    <img src="assets/img/icon.png" alt="Avatar" class="avatar">
    <p>Student Login Form</p>
  </div>

  <div class="container">
  
    <ul id="form-messages"></ul>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" id="email" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="pass" required>
    
    <button type="submit" id="btn-submit">Login</button>
    <span class="psw">New? Register <a href="registration.php">Here</a></span>
  </div>

</div>
<script>
        const form = {
            email: document.getElementById('email'),
            pass: document.getElementById('pass'),
            submit: document.getElementById('btn-submit'),
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

            const requestData = `email=${form.email.value}&pass=${form.pass.value}`;

            request.open('post', 'serverfiles/login_verification.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(requestData);
        });


        function handleResponse (responseObject) {
            if (responseObject.ok) {
                location.href = 'index.php';
            } else {
                while (form.messages.firstChild) {
                    form.messages.removeChild(form.messages.firstChild);
                }

                responseObject.messages.forEach((message) => {
                    const li = document.createElement('li');
                    li.textContent = message;
                    form.messages.appendChild(li);
                });

                form.messages.style.display = "block";
            }
        }
    </script>
</body>
</html>

