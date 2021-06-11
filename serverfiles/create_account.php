<?php

include("db_connection.php");
$id= $_SESSION['id'];

$ok = false;
$messages = array();

$Form_email = isset($_POST['email']) ? $_POST['email'] : '';
$Form_pass = hash('sha512',isset($_POST['pass']) ? $_POST['pass'] : '');

if($Form_email==null){
  $ok = false;
  $messages[] = "Email can't be empty";
}else{
 
  $conn=OpenCon();

  $sql_select=mysqli_query($conn,"SELECT * FROM `users` WHERE email='".$Form_email."'");
  $select_row= mysqli_fetch_assoc($sql_select);

  //checking email is used or not
  if($select_row){

    $ok = false;
    $messages[] = 'This email is already taken. Try another one';

   }else{
  //checking session is set or not
    if(isset($_SESSION['id']))
    {
        $id_check=mysqli_query($conn,"SELECT * FROM `users` WHERE id='".$id."'");
        $id_exist= mysqli_fetch_assoc($id_check);

        if($id_exist){

            $ok = false;
            $messages[] = 'This roll is already taken. Contact your student advisor';

        }else{

            $sql="INSERT INTO `users`(`id`,`email`,`pass`) VALUES ('$id','$Form_email','$Form_pass');";
            $result = mysqli_query($conn, $sql);

            if($result){

              $ok = true;
              $messages[] = 'Account Created Successfully';
              unset ($_SESSION["id"]);

            }else{

              $ok = false;
              $messages[] = 'Something went wrong during saving the data into database';
            }
        }

    }else{

         $ok = false;
         $messages[] = 'Session is not set.';
    }

    

     
     
  }
}


  



  echo json_encode(
  array(
      'ok' => $ok,
      'messages' => $messages
  )
  );

?>