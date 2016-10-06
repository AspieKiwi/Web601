

<?php
// the controller takes the information that is sent from the form in the view and sends it to the model.
// it then displays the thank you page (which is currently not working correctly) 

require_once("../model/QuestionModel.php");
             
class QuestionController {
	
    public function QuestionController(){
        echo "in controller</br>";
		
        
        if( isset($_REQUEST['command'])){
           switch($_REQUEST['command']){
            case "Submit":
			echo "in case</br>";
             // Store the value 
             if(isset($_REQUEST['SchoolName'])){
                $aModel = new QuestionModel();
                $aModel->setSchoolValue($_REQUEST['SchoolName'], $_REQUEST['PupilEmail'], $_REQUEST['ClassroomName'], $_REQUEST['SchoolPhone']) ;
				
				

			echo "out of case </br>";
             }// if request comment == "Send Something" and we have a something
            
            }// command switch
        }// if have a command
		
	
    
        // Display the View here decide which view? 
        require_once("../views/thanksview.php");
    }

	
	
	// SomethingController contructor
             
             
}

class Thanks {
	public function action_thanks()
{
    $pPClassroom = $this->request->param('ClassroomName');
    $pPEmail = $this->request->param('PupilEmail');
	
}
}			
				
				




// this controller accepts requests hence we make one when the script is loaded
    $sMController = new QuestionController();
    // However, since it accepts a request immediately we do not need to call a method to do that.
             

?>