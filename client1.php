<?php 
session_start();

 ?>
<html>
	<head>
	<meta charset="UTF-8">
	<title>User Registration</title>
		<!-- <link rel="stylesheet" href="form_css.css"> -->
	</head>
	<body>
		<label><?php echo $_SESSION['username'] ;?></label>
		<br/>
		<form id = "chat_form" onsubmit="return addComment();">
			<header>Chatroom</header>	
			<br/>
			
			<!-- <input type="text" id="user_name" name="user_name" value="<?php //echo $_SESSION['username']; ?>" /> -->
			<label>Last Displayed Chat ID</label>
			<input type="text" id="last_displayed_chat_id" name="last_displayed_chat_id" value="0" readonly />
			<label>Chat</label>
			<textarea rows="20" id="chat_box" readonly></textarea>
			<label>Add Comment</label>
			<input type="text" name="user_comment" id="user_comment">
			<input type="Submit" id="add_comment" value="Add Comment" />
			<br/>
		</form>
		<br/>
	</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript">	


    // in this function data will send to the client1 php file and show present data in chat box in same page
		function addComment() {
		
			if( $('#user_comment').val().length ==0) {
				alert('Please Enter a User Name or message');
				return false;
			}
		
			requestData = $('#last_displayed_chat_id,#user_comment').serialize();
			$.ajax({
				url : "http://localhost/chat-box/server1.php" ,
				type : "get" , 
				data : requestData , 
				dataType : "json" , 
				success : function( response , status , http ) {
					$.each( response , function( index , item ){
						$('#chat_box').val( $('#chat_box').val() + item.user_name + ' : ' + item.user_comment + '\n' );
						$('#last_displayed_chat_id').val( item.chat_id );
					});	
					$('#user_comment').val('');
				},
				error : function( http , status , error ) {
					//alert( 'Some Error Occured : ' + error );
				}
			});
			
			return false;
		
		}
		// in function this you will all data present in database of chat with user name
		function updateChat() {
		
			$.ajax({
				url : "http://localhost/chat-box/server1.php" ,
				type : "get" , 
				data : "last_displayed_chat_id="+$('#last_displayed_chat_id').val() , 
				dataType : "json" , 
				success : function( response , status , http ) {
					$.each( response , function( index , item ){
						$('#chat_box').val( $('#chat_box').val() + item.user_name + ' : ' + item.user_comment + '\n' );
						$('#last_displayed_chat_id').val( item.chat_id );
					});	
				},
				error : function( http , status , error ) {
					//alert( 'Some Error Occured : ' + error );
				}
			});
		
		}
		
		//updateChat();
		setInterval( updateChat , 200 );
		
</script>


