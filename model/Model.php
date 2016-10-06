<?php
//error_reporting(E_ALL) reports all PHP errors
//class is a collection of variables and funtions working with these variables
	error_reporting(E_ALL);
	class Model{
		public $pages = array('Tasks'=>'../content/TasksContent.php',
								'Question'=>'../content/QuestionContent.php',
								'LogIn'=>'../content/LogInContent.php',
								'How'=>'../content/HowContent.php',
								'Creation'=>'../content/CreationContent.php',
								'About'=>'../content/AboutContent.php',
								'Home'=>'../content/HomeContent.php');
		public function Model(){
			if(! isset($_SESSION['currentpage']))
			{
				$_SESSION['currentpage'] = 0;
			}
		}
		public function firstPage(){
			$_SESSION['currentpage'] = 0;
		}
		public function currentContent(){
			$currentPage = $_SESSION['currentpage'];
			return $this->pages[$currentPage]. " next ".($currentPage + 1);
		}
		public function nextPage(){
			$_SESSION['currentpage'] = $_SESSION['currentpage'] + 1;
		}
		public function prevPage(){
			$_SESSION['currentpage'] = $_SESSION['currentpage'] - 1;
		}
		public function pageContent($pageIndex){
			return $this->pages[$pageIndex];
		}
	}
?>
