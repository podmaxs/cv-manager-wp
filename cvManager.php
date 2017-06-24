<?php 
/*
Plugin Name: CV MANAGER
Pligin URI: www.developmentsoft.com.ar/plugins
Description: Es un plugin administrar los CV 
Author: podmaxs
Version: 1.0
Author URI: wwww.podmaxs.developmentsoft.com.ar
*/



add_action('admin_menu','cvMenu');



function cvMenu(){
	add_menu_page('CV list','CV list',2,__FILE__,'list_cv', plugins_url( 'cvManager/drawable/icon.svg' ), 6 );

}

function list_cv(){
include_once "controller/main.controller.php";
controllerMain();
}
 ?>