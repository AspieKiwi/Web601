

<?php
error_reporting(E_ALL);
require_once("../model/Model.php");
class TaskView
{
 	public function Render(){
		$theModel = new Model();
		$CurrentContent = $theModel->pageContent('Tasks');
?>





<!DOCTYPE html>
<html lang="en">




	<head>
		<title>Tasks</title>
		<meta charset="utf-8">
		<meta name="description" content="Character Creation" />
		<link rel="stylesheet" href="../stylesheet/style.css">
	</head>




	<body>
		<div id="container">
	
			<div id="header">
				<img class="logo" src="../images/SmallLogo.png" alt="logo" align="center">
			</div>
			
			<nav>
				<ul>
					<li><a href="../control/control_Class.php?command=home">Home</a></li>
					<li><a href="../control/control_Class.php?command=tasks">Tasks</a></li>
					<li><a href="../control/control_Class.php?command=about">About</a></li>
					<li><a href="../control/control_Class.php?command=qa">Q & A</a></li>
					<li><a href="../control/control_Class.php?command=login">Log In</a></li>
				</ul>
			</nav>
		
			<div id="primary">
			</div>
		
			<div id="content">
				<?php include( $CurrentContent); ?>
			</div>
		
			<div id="secondary">
				<p>Advertisements</p>
				<a href="http://www.youtube.com">
					<img class="youtube" src="../images/vintage-youtube.jpg" alt="youtube" align="center">
				</a>
			</div>
	
			<div id="footer">
			</div>
		</div>
	</body>
</html>

<?php
	}
}

?>
