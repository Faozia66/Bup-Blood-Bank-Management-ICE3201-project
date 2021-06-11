
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="user_assets/img/icon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="assets/style.css">
<title>Registration</title>
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
    <p>Student Registration Form</p>
  </div>

  <div class="container">
  
    <ul id="form-messages"></ul>

    <label for="roll"><b>Roll</b></label>
    <input type="text" placeholder="Enter Roll" id="roll" required>

    <label for="dept"><b>Department</b></label>
    <input type="text" placeholder="Enter Department" id="dept" required>

    <label for="faculty"><b>Faculty</b></label>
    <input type="text" placeholder="Enter Faculty" id="faculty" required>

        
    <button type="submit" id="btn-submit">Next</button>

  </div>

  </div>
<script>
        const form = {
            roll: document.getElementById('roll'),
            dept: document.getElementById('dept'),
            faculty: document.getElementById('faculty'),
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

          const requestData = `roll=${form.roll.value}&dept=${form.dept.value}&faculty=${form.faculty.value}`;
         
          request.open('post', 'serverfiles/registration_verification.php');
          request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          request.send(requestData);

        });


        function handleResponse (responseObject){
          if (responseObject.ok) {
                location.href = 'profile/account.php';
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

