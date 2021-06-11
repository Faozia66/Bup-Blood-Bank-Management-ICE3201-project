<?php

include("db_connection.php");
$ok = false;
$messages = array();
$Form_roll = isset($_POST['roll']) ? $_POST['roll'] : '';
$Form_dept = strtoupper(isset($_POST['dept']) ? $_POST['dept'] : '');
$Form_faculty = strtoupper(isset($_POST['faculty']) ? $_POST['faculty'] : '');
$conn=OpenCon();

$sql_select=mysqli_query($conn,"SELECT * FROM `registration` WHERE roll='".$Form_roll."' and dept='".$Form_dept."' and faculty='".$Form_faculty."'");
$select_row= mysqli_fetch_assoc($sql_select);

  if($select_row){

    $_SESSION['id']=$select_row["id"];
    $ok = true;
    $messages[] = 'Credential matched!';

  }else{

    $ok = false;
    $messages[] = 'Your credential is not matched. Please contact with your student advisor';

  }
  



  echo json_encode(

  array(

      'ok' => $ok,
      'messages' => $messages
  )
  );

?>