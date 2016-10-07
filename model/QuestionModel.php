<?php

    session_start();
    require_once("../control/DBCon.php");
    
    class QuestionModel{
        public function setSchoolValue($pSchoolName, $pEmail, $pClassroom){
            echo "I'm in school value </br>";
				$schoolID = "";
				$SQL = "SELECT SchoolID FROM tblschool WHERE SchoolName = '$pSchoolName'";
				$aDB = new DBConnection('competion_database');
				$aDB->query($SQL);
				$row = $aDB->fetchNext();
				$schoolID = $row['SchoolID'];
							
				
				$SQL = "INSERT INTO `tblcompetitor` (`Email`, `Classroom`, `SchoolID`) VALUES ('$pEmail','$pClassroom', '$schoolID')";
				$aDB = new DBConnection('competion_database');
				$aDB->query($SQL);
				

            }

            
		// what I added in >_<
public function Question(){

    $questionresult = "";

    $SQL = "SELECT QuestionID, QuestionText From tblQuestion ORDER BY RAND()";

    $aDB = new DBConnection(

                            'competion_database');

    $aDB->query($SQL);

    $row = $aDB->fetchNext();

    $questionresult = $row;

    return $questionresult;


}
		
		// figure out how to make this work
		
public function answer($pID){

    $aDB = new DBConnection("competion_database");

    $aDB->query("SELECT * FROM `tblproposedanswer` WHERE QuestionID = $pID");

    

    while($aRow = $aDB->fetchNext()){

        $Answer[] = $aRow;
    }
	//var_dump($Answer);
    return $Answer;

}
		
		
		
	public function fetchNext()
	{
		 global $compDB;
		
	 return 	$compDB->fetchNext();
	}
	
	
	public function thankyouone($pPEmail){
		$UserID = "";
		$SQL = "SELECT `Classroom` FROM `tblcompetitor` WHERE Email = '$pPEmail'";
		$aDB = new DBConnection('competion_database');
		$aDB->query($SQL);
		$row = $aDB->fetchNext();
		$UserID = $row['Classroom'];
		return $UserID;
	}
		
		
		
		
		
		
            
        
        public function forget(){
            if(isset($_SESSION['Something'])){
                unset($_SESSION['Something']);
            }
            if( isset($_SESSION['LoggedIn'])){
                 unset($_SESSION['LoggedIn']);
            }
        }
        
        
     }

// Test code


    
    
     
    $aSomething = new QuestionModel();
    $aSomething->forget();
    //$aSomething->checkLogin('Todd','12345');
    //$aSomething->setValue('Yipee');
    /*
    //echo $aSomething->checkLogin('Todd','12345');

    echo "Value is:".$aSomething->value(); // test to see if there is a value
    echo $aSomething->setValue("a value");
*/    
     #echo $aSomething->forget(); // include this to test the forget method



?>