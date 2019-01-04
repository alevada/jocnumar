<?php
	/*$content = "222";
	if(isset($_POST["number"]) && !empty($_POST["number"])) {
		$content = "Your nr. is: ". $_POST['number']. "<br />" . $content ;
		//$number = $_POST['number'];
	}*/


	/*$errNumber ="";
	$empty_arr = [];
	$_SESSION['number'] = $var_value;
	if(isset($_POST["submit"])) {
		echo "your nr. is: ". $_REQUEST['number']. "<br />";
		//$number = $_POST['number'];
	}*/
	/*
	$var_value = [];
	$_SESSION['number'] = $var_value;
	$var_value = $_REQUEST['number'];
	echo "Your last number was: " . $var_value; */
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<!-- Latest compiled and minified CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	    <!--<link rel="stylesheet" href="css/custom.css-->
	    <!-- jQuery library -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	    <!-- Latest compiled JavaScript -->
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <title> NUMBER GAME </title>
	</head>
	<body>
		<h2 align="center"> NUMBER GAME <BR><BR><BR></h2>
		<div class="container form-group">
			<form class="form-horizontal" id="submit_number" role="form">
				<label class="control-label col-sm-2" for="input1">Please enter a number between 1 and 1000 here: </label>
				<div class="col-xs-3">
					<input class="form-control" id="number" name="number" type="number" min="1" max="1000" required>
				</div>
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
				<div class="" id="message_container"></div>
			</form>
		</div>
	</body>
</html>

<script type="text/javascript">
	//$(document).on("submit", "#myForm", function() {
	$('#submit_number').submit(function(e) {
		e.preventDefault();

		var current_content = $("#message_container").html();
		var number = $("#number").val();

		$.ajax({
		    'url' : 'handler.php',
		    'type' : 'POST',
		    'data' : {
		    	current_content: current_content,
		    	number: number
		    },
		    success: function(response){
		    	var new_content = 'You entered number: ' + response + "<br/><br/>" + current_content;

		    	$("#message_container").html(new_content);
		    	$("#number").val('');
		    },
		});
	});




	/*
	$.ajax({
	   type: 'POST',
	   url: '/SomeUrl/MyResource.php',
	   data: JSON.stringify({ text: html }),
	   success: function(response)
	   {
	      alert('Ajax call successful!');
	   }
	});
	}*/
</script>