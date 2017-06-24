<?php 

function controllerMain($view=''){
	$cv_list=array();
	$cvxp=20;
	$cp=1;
	if(isset($_GET['paged'])){$cp=$_GET['paged'];}
	echo "<style>";
	include_once __DIR__.'/../css/theme.php';
	echo "</style>";
	if(isset($_GET['filterRubro']) and $_GET['filterRubro']!=-1){
		$rubro=$_GET['filterRubro'];
	}else{
		$rubro='';
	}
	if(isset($_GET['s'])){$ff=$_GET['s'];}else{$ff='';}
	$cv_list= get_list_cv($ff);
	$cargos=listType($cv_list);
	if($rubro!=''){$cv_list=filterRubros($cv_list,$rubro);}
	$TTCV=count($cv_list);
	$ttp=ceil($TTCV/$cvxp);
	if($TTCV>$cvxp){
		$filter_post=array();
		for($p=(($cp*$cvxp)-$cvxp);$p<($cp*$cvxp);$p++){
			if(isset($cv_list[$p])){$filter_post[]=$cv_list[$p];}
		}
		$cv_list=$filter_post;
	}
	include_once __DIR__.'/../view/main.view.php';

}

function filterRubros($cvs,$r){
$cv=array();
foreach ($cvs as $value) {
		if($value->cargo==$r){$cv[]=$value;}
	}	
	return $cv;
}
function get_list_cv($f=''){
include_once __DIR__.'/../models/class.cvManager.php';
global $wpdb;
$cvm=new cvManager($wpdb);
return $cvm->get_cv($f);

}
function getExt($f=''){
	if($f==''){return "*";}
	return pathinfo($f, PATHINFO_EXTENSION);

}
function getResourcePath($f=''){
	if($f==""){return '#';}
	return plugins_url('../uploads/'.$f);
}
function listType($d=array()){
	$cargos=array();
	foreach ($d as $l) {
		if(!isset($cargos[$l->cargo])){$cargos[$l->cargo]=$l->cargo;}
	}
	return $cargos;
}
 ?>
