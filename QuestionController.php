

<?php
// first I need information from the server?
// then to read and take things?

require_once("QuestionModel.php");
             
class QuestionController {
    public function QuestionController(){
        echo "in controller</br>";
        
        if( isset($_REQUEST['command'])){
           switch($_REQUEST['command']){
            case "Submit":
			echo "in case</br>";
             // Store the value ((((REQUEST SOMETHING COMES FROM THE FORM :))))
             if(isset($_REQUEST['SchoolName'])){
                $aModel = new QuestionModel();
                $aModel->setSchoolValue($_REQUEST['SchoolName'], $_REQUEST['PupilEmail'], $_REQUEST['ClassroomName'], $_REQUEST['SchoolPhone']);
			echo "out of case </br>";
             }// if request comment == "Send Something" and we have a something
             break;
            case "Login":
             // Check login and set session login state
             echo "in controller login </br>";
             if(isset($_REQUEST['SchoolName']) && isset($_REQUEST['SchoolPhone']))
             {
                echo "in controller login name password</br>";
                $aModel = new QuestionModel();
                if($aModel->checkLogin($_REQUEST['SchoolName'],$_REQUEST['SchoolPhone'])){
                    
                }
             }
             break;
            }// command switch
        }// if have a command
    
        // Display the View here decide which view?
        require_once("QuestionView.php");
    }// SomethingController contructor
             
             
}

// this controller accepts requests hence we make one when the script is loaded
    $sMController = new QuestionController();
    // However, since it accepts a request immediately we do not need to call a method to do that.
             

?>