<?php
// this is the thanks view that will eventually display the input of the compeitior from the database.
// it's going echo the return value of a query from the model, but at the moment having issues within the controller bringing
// information to the query.
require_once("../model/QuestionModel.php");
	$sModel = new QuestionModel();
	
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Thankyou View </title>
	</head>
	<body>
<p>
	<?php
		echo $sModel->thankyouone();
	?>
</p>

</body>
</html>