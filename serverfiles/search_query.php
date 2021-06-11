<?php
include("db_connection.php");
$ok = false;
$messages = array();
$search = isset($_POST['search']) ? $_POST['search'] : '';

$conn=OpenCon();
if(strlen($search) < 3)
    {
        $search = urlencode($search);
        $sql_select=mysqli_query($conn,"SELECT * FROM `profiles` WHERE b_group like '%".$search."%'");
    }else{
        $sql_select=mysqli_query($conn,"SELECT * FROM `profiles` WHERE `name` LIKE '%".$search."%'");
    }
        
$select_row= mysqli_fetch_assoc($sql_select);

  if($select_row){

    $_SESSION['search']=$search;
    $ok = true;
    $messages[] = 'result found';


  }else{

    $ok = false;
    $messages[] = 'result not found';


  }
  

  echo json_encode(

    array(
  
        'ok' => $ok,
        'messages' => $messages
    )
    );

?>