<?php
	// generate a new random number on pageload
	$random_number = rand (1, 1000);
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
	    <title> GAME </title>
	</head>
	<body>
		<h3 align="center" style="margin: 100px 0;"> GUESS GAME </h3>
		<form class="form-horizontal" id="submit_number" role="form">
			<div class="row" id="lbl" disabled="disabled">
				<label class="control-label col-sm-4" for="input1">Please enter a number between 1 and 1000, here: </label>
			    <div class="col-sm-6">
			        <div class="input-group">
			            <input class="form-control" id="number" name="number" type="number" min="1" max="1000" required="">
			            <span class="input-group-btn">
			                <button id="submit_button" class="btn btn-default" type="submit"> <b>Guess my number!</b></button>
			                <button id="restart_button" class="btn btn-default" type="button" onClick="document.location.reload(true)" style="display: none;"> <b>Restart game</b></button>
			            </span>
			        </div>
			    </div>
			</div>
			<div class="row">
				<hr/>
				<label class="control-label col-sm-4"></label>
				<div class="col-sm-6" id="message_container" style="overflow-y: auto; height:360px;"></div>
			</div>
		</form>
	</body>
</html>

<script type="text/javascript">
	$('#submit_number').submit(function(e) {
		e.preventDefault();

		var current_content 		= $("#message_container").html();
		var number 					= $("#number").val();
		var generated_random_number = <?= $random_number; ?>;
		var new_content 			= 'You entered: <strong>' + number + "</strong><br/>";

    	if (number < generated_random_number) {
    		var diff = Math.trunc(generated_random_number / number);
			
			new_content += "<strong> My number is "+(diff > 1 ? (diff+"x ") : "")+"bigger.</strong>";

    	} else if (number > generated_random_number) {
    		var diff = Math.trunc(number / generated_random_number);

    		new_content += "<strong> My number is "+(diff > 1 ? (diff+"x ") : "")+"smaller.</strong>";

    	} else {
    		new_content += "<strong> CONGRATS!! You guessed my number!!" ;
    		/*<a href='http://localhost/jocnumar/index.php'>Restart game</a>*/
    		$("#number").attr('disabled', 'disabled');
    		$("#submit_button").attr('disabled', 'disabled').css('display', 'none');

    		$("#restart_button").css('display', 'block');
    	}    	

    	new_content += "<br/><hr/>" + current_content;

    	$("#message_container").html(new_content);
    	$("#number").val('');


		/*$.ajax({
		    'url' : 'handler.php',
		    'type' : 'POST',
		    'data' : {
		    	current_content: current_content,
		    	number: number
		    },
		    success: function(response){
		    	var new_content = 'You entered: <strong>' + response + "</strong><br/><br/><hr/>" + current_content;
		    	if (a==b) {
		    		var new_content = 'congrats !!!';
		    	}
		    	$("#message_container").html(new_content);
		    	$("#number").val('');
		    },
		});*/
	});

</script>