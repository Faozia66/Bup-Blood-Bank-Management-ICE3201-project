<?php
    
    include("db_connection.php");
    $ok = false;
    $messages = array();

    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = hash('sha512',isset($_POST['pass']) ? $_POST['pass'] : '');

    $ok = true;
    $messages = array();

    if ( !isset($email) || empty($email) ) {
        $ok = false;
        $messages[] = 'Username cannot be empty!';
    }

    if ( !isset($pass) || empty($pass) ) {
        $ok = false;
        $messages[] = 'Password cannot be empty!';
    }

    if ($ok) {
        $conn = OpenCon();

        $sql="SELECT * FROM `users`  WHERE email='$email' and pass='$pass';";
        $result = mysqli_query($conn, $sql);
        $count= mysqli_num_rows($result);

        if ($count==1) {
           // $_SESSION['Auth']=$email;
            while($row = $result->fetch_assoc()) {

                $_SESSION['Auth_id']=$row["id"];
               
              }
            $ok = true;
            $messages[] = 'Successful login!';
        } else {
            $ok = false;
            $messages[] = 'Incorrect username/password combination!';
        }
    }

    echo json_encode(
        array(
            'ok' => $ok,
            'messages' => $messages
        )
    );

?>