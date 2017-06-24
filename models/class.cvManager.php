<?php 
/**
 * 
 */
 class cvManager
 {
 	private $con;
 	function __construct($con=null)
 	{
 		if($con!=null){
 			$this->con=$con;

 		$this->con->query("
 		CREATE TABLE IF NOT EXISTS `CV_TABLE`(
			`ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`STATE` TEXT NOT NULL,
			`DATE` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
 		);");
 		$this->con->query("
 		CREATE TABLE IF NOT EXISTS `CV_TABLE_DATA`(
			`ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`ID_CV` int NOT NULL,
			`CLAVE` TEXT NOT NULL,
			`VALOR` TEXT NOT NULL,
			`STATE` TEXT NOT NULL,
			`DATE` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
 		);");



 		}
 	}


 	public function add_cv($data=array()){
 		$this->con->insert('CV_TABLE',array('STATE'=>"publish"));
 		$id=$this->con->insert_id;
 		$q="";
 		foreach ($data as $key => $value) {
 			if($q!=""){$q.=",";}
 			$q.="('$id','$key','$value','publish')";
 		}
 		if($q!='' and $id!==false){
 		if($this->con->query("INSERT INTO CV_TABLE_DATA (ID_CV,CLAVE,VALOR,STATE) VALUES $q ")){
 			return $id;
 		}else{
 			return false;
 		}
 		}else{
 			return false;
 		}
 	}


 	public function get_cv($des=''){
 		$filt='';
 		if($des!=''){
 			$des=explode(' ',$des);
 			foreach ($des as $k) {
 				if($filt!=''){$filt.=" or ";}
 	$filt.=" (ee.VALOR like '%$k%' and ee.STATE='publish' and ee.CLAVE!='CV_FILE') ";
 			}
 			if($filt!=''){$filt=" and ctd.ID_CV IN (SELECT ee.ID_CV FROM  CV_TABLE_DATA as ee where ($filt)) ";}
 		}
 		$q="SELECT ctd.ID_CV, ctd.CLAVE, ctd.VALOR, ctd.DATE
FROM  `CV_TABLE_DATA` ctd
LEFT JOIN  `CV_TABLE_DATA` ct ON ctd.ID_CV = ct.ID
WHERE ct.STATE =  'publish' $filt order by ctd.ID_CV desc";
 		$r=$this->con->get_results($q);
 		$data=array();
 		foreach ($r as $line) {
 		if(!isset($data[$line->ID_CV])){$data[$line->ID_CV]=new stdClass();}	
 		$data[$line->ID_CV]->ID=$line->ID_CV;
 		$campo=$line->CLAVE;
 		$data[$line->ID_CV]->$campo=$line->VALOR;
 		$data[$line->ID_CV]->DATE=$line->DATE;
 		}
 		$nd=array();
 		foreach ($data as $key => $value) {	$nd[]=$value;}
 		return $nd;
 	}
 } ?>