<?php
   // this is the DBconnection which helps with connecting to the database.
	// it also helps with the creation of the array which if an echo is triggered the array does work.
	// if it cannot select the database then an error will appear.
    class DBconnection {
		
		private $connectRS;
		private $dbRs = false;
		private $dbCreateQueries = array("");
		private $dbDropQueries = array("");
		private $dbRegisterQueries = array();
		
		public $rs;
		public $insert_id;
        
        private function connectDb($pStrDatabase)
        {
            $this->connectRs = mysqli_connect("localhost","root","");
            if(!$this->connectRs)
            {
                echo "Error connecting to the database server".mysqli_error($this->connectRs);
                $this->connectRs = -1;
            }
            //else
            //    echo "Connected </br>";
            $dbRs = mysqli_select_db($this->connectRs,$pStrDatabase);
            if(! $dbRs)
            {
                echo "Error selecting the database".mysql_error($this->connectRs);
                
            }
           // else
           //     echo "Selected ".$pStrDatabase."</br>";
        }
        
        
        public function query($pStrSQL)
        {
        
            $this->rs = -1;// BAD RECORDSET
        
            $this->rs = mysqli_query($this->connectRs,$pStrSQL);
            if( !$this->rs)
            {
                echo "Error running query [$pStrSQL] ".mysqli_error($this->connectRs)."<br>";
                $this->rs = -1;
            
            }
        
        
        }
        
        public function lastCount(){
            $result = mysqli_num_rows($this->rs);
            return $result;
        }
    
        public function DBConnection($pStrDatabase)
        {
            
            $this->connectDb($pStrDatabase);
          
            
        }
        
        public function fetchNext(){
            if ($this ->rs)
			{
				$row = mysqli_fetch_assoc($this->rs);
				return $row;
			}
			else
			{
				echo "Error fetching next row, looks like there is no current query result";
				return false;
			}
        }
    
        
        public function free(){
            mysqli_free_result($this->rs);
        }
    }
	
$compDB = new DBConnection("competion_database");
	// end of database class
	
	
	// test code using random database
	

    
    
    
    
    
    
    
?>