<?php

    session_start();
    require_once("DBCon.php");
    
    class QuestionModel{
        public function setSchoolValue($pSchoolName, $pEmail, $pClassroom){
            echo "I'm in school value </br>";
				$schoolID = "";
				$SQL = "SELECT SchoolID FROM tblschool WHERE SchoolName = '$pSchoolName'";
				$aDB = new DBConnection('competion_database');
				$aDB->query($SQL);
				$row = $aDB->next();
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
		$questionresult = $row['QuestionText'];
		return $questionresult;
		}
		
		// figure out how to make this work
		
		public function answer(){
			 $aDB = new DBConnection("competion_database");
			$aDB->query("SELECT * FROM `tblproposedanswer` WHERE QuestionID = 1");
	  
			while($aRow = $aDB->fetchNext()){
				echo $aRow['AnswerText']. "</br>";
		  
		  
					}
				$aDB->free();
		}
		
		
	public function fetchNext()
	{
		 global $compDB;
		
	 return 	$compDB->fetchNext();
	}
		
		
		
		
		
		
            
        
        public function value(){
            $result = "";
            
            
            if(isset($_SESSION['user'])){
                $UserName = $_SESSION['user'];
                $SQL = "SELECT `value` FROM `value` WHERE name = '$UserName'";
                $aDB = new DBConnection('Something');
                $aDB->query($SQL);
                if($aDB->lastCount() > 0 ){
                    $row = $aDB->next();
                    $result = $row['value'];
                    $_SESSION['Something'] = $result;
                }
                $result = $_SESSION['Something'];
                
            }
            
            
            return $result;
        }
        
        public function forget(){
            if(isset($_SESSION['Something'])){
                unset($_SESSION['Something']);
            }
            if( isset($_SESSION['LoggedIn'])){
                 unset($_SESSION['LoggedIn']);
            }
        }
        
        public function loggedIn(){
            $result = FALSE;
            if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn']){
                $result = TRUE;
            }
            return $result;
        }// loggedIn
        
        public function checkLogin($pName, $pPass){
            $result= FALSE;
            $aConnection = new DBConnection("Something");
            $SQL = "SELECT * FROM USER WHERE Name='$pName' and Password='$pPass';";
            $aConnection->query($SQL);
            //echo "RAN QUERY ".$SQL;
            if($aConnection->lastCount() > 0){
                $result = TRUE;
                $_SESSION['user'] = $pName;
               // echo "RAN QUERY  with count".$aConnection->lastCount();
            }
            
            $_SESSION['LoggedIn'] = $result;
            
            return $result;
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