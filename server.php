<?php

// LETS FETCH THE VALUE OF LAST_DISPLAYED_CHAT_ID
   $data=$_REQUEST;
   $last_chat_id=$data['last_chat_id'];

   // connect to MYSQL server
   require 'connection.php';

   // If user_name and user_comment is available then 
  // add it in table chats
  if(
    isset( $data['user_name'] ) &&
    isset( $data['user_comment'] )
  )
    {
    
    $insert = " INSERT INTO chats( user_name , user_comment )  VALUES( '".$data['user_name']."' , '".$data['user_comment']."' ) ";
    $insert_result = mysqli_query( $connection , $insert );
   }

   $select = "SELECT *FROM chats WHERE chat_id > '".$last_chat_id."' ";
    $result=mysqli_query($connection,$select);

    $arr =array();
    $row_count= mysqli_num_rows($result);

    if ($row_count>0) {
    	while ($row= mysqli_fetch_array( $result ) ) {
    		array_push($arr, $row);
    	}
    }

    // close the connection
    mysqli_close($connection);

    //RETURN THE RESPONSE AS json
    echo json_encode($arr);
  ?>