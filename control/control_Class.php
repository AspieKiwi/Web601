<!-- NOTES ABOUT THE PHP -->
<!-- the PHP to start off with is set to report all errors and then start the sesssion-->
<!-- it then requires once all of the views that will be used within the website -->
<!-- A controller class is created that reads a command that has been sent through from the view -->
<?php
error_reporting(E_ALL);
session_start();


require_once("../model/Model.php");
require_once("../views/TasksView.php");
require_once("../views/QAView.php");
require_once("../views/LoginView.php");
require_once("../views/HowView.php");
require_once("../views/CreateView.php");
require_once("../views/AboutView.php");
require_once("../views/HomeView.php");
require_once("../views/QuestionView.php");

    
class Controller {

  function accept()
  {
     if( isset( $_REQUEST['command']) ){
		$command =  $_REQUEST['command'];
		switch($command){
                case "tasks":

					$thePage = new TaskView();
					$thePage->Render();

                        break;
                case "about":
                        $thePage = new AboutView();
					$thePage->Render();
					break;
				case "competition":
				$thePage = new CompView();
				$thePage->Render();
				break;
                case "qa":
                        $thePage = new QuestionView();
					$thePage->Render();
					break;
                case "login" :
                   $thePage = new LoginView();
					$thePage->Render();
					break;
                case "creation" :
                 $thePage = new CreationView();
					$thePage->Render();
					break;
				case "how" :
					$thePage = new HowView();
					$thePage->Render();
					break;
		default:
			$thePage = new HomeView();
					$thePage->Render();

                        break;
		}

	 }
	 else
	 {
	 
	    $thePage = new HomeView();
					$thePage->Render();


	 }
 
 }
  

}

$theController = new Controller();
$theController->accept();


?>
