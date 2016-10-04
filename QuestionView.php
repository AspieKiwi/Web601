<?php
	require_once("QuestionModel.php");
	$sModel = new QuestionModel();
	$sModel->answer();
	$answerOne = $sModel->fetchNext();
	$answerTwo = $sModel->fetchNext();
	$answerThree = $sModel->fetchNext();	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Question View </title>
	</head>
	<body>
		<form action="QuestionController.php" method "post">
			<p>
				<label for="ClassroomName"> Classroom Name/Number: </label>
				<input type="text" name="ClassroomName" value="" id="ClassroomName">
			</p>
			<p>
				<label for="SchoolName"> School Name: </label>
				<input type="text" name="SchoolName" value="" id="SchoolName">
			</p>
			<p>
				<label for="PupilEmail"> Your Email: </label>
				<input type="text" name="PupilEmail" value="" id="PupilEmail">
			</p>
			<p>
				<label for="SchoolPhone"> School Phone: </label>
				<input type="text" name="SchoolPhone" value="" id="SchoolPhone">
			</p>
			<!--Stuff I've added in -->
			<p>
				<?php echo $sModel->Question();
				?>
			</p>
			<?php echo $answerOne["AnswerText"];?>
			<input type="radio"  name="anAnswer" 
					  value="" ><?php echo $answerOne["AnswerText"]; ?></br>
					  
			<?php echo $answerTwo["AnswerText"];?>
			<input type="radio"  name="anAnswer" 
					  value="" ><?php echo $answerTwo["AnswerText"]; ?></br>
					  
			<?php echo $answerThree["AnswerText"];?>
			<input type="radio"  name="anAnswer" 
					  value="" ><?php echo $answerThree["AnswerText"]; ?></br>	
				
			<!--Added in-->
			<input type="submit" name="command" value="Submit">
		</form>
	</body>
</html>