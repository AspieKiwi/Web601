<?php

	error_reporting(E_ALL);
	require_once("../model/QuestionModel.php");

class CompView
{
	public function Render()
	{
 $sModel = new QuestionModel();

        //$sModel->answer();

        $Question = $sModel->Question();

        $Answers = $sModel->answer($Question["QuestionID"]);
		
		


        
?>

<!-- in this view there is a form which posts all of the data the user inputs to the controller -->
<!-- currently the school name input only takes certain schools in, the question does not work yet properly sadly -->
<!-- when the submit button is clicked, this is the moment when the information is sent to the controller.  -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Question View </title>
	</head>
	<body>
		<form action="../control/QuestionController.php" method = "post">
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

			<p>
				<?php print_r($Question). "</br>";
				$anAnswer = "";
				foreach ((array)$anAnswer as $Answers){
				?>
				<input type="radio" name="anAnswer" value="<?php print_r ($anAnswer)['AnswerID'];?>"> <?php $anAnswer['AnswerText']?> </br>
				
				<?php 
				}
				?>
			</p>
			
				
			<input type="submit" name="command" value="Submit" onClick="document.location.href='thanksview.php';">
		</form>
	</body>
</html>

<?php

	}
	
}
?>