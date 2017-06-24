<?php  
$colors=array(
	'default'=>'#699578',
	'primary'=>'#0F95EF',
	'info'=>'#11EDDA',
	'danger'=>'#EB4713',
	'success'=>'#36C840',
	'green'=>'#318152',
	'warning'=>'#C5BD20',
	'favorite'=>'#E9B015',
	'pink'=>'#f70b6f',
	'muthed'=>'#999'
);

$sizes=array(0,5,10,25,30,50);
$lad=array(
	't'=>'top',
	'b'=>'bottom',
	'l'=>'left',
	'r'=>'right'
	);
 ?>
<?php foreach ($colors as $key => $value): ?>
.t-<?=$key?>{
	color:<?=$value?>;
}
a.t-<?=$key?>:hover,a.t-<?=$key?>:focus{
	color:<?=$value?>;
	opacity:.7;
}
<?php endforeach ?>

<?php foreach ($sizes as $key): ?>
.p<?=$key?>{
	padding:<?=$key?>px;
}
<?php endforeach ?>


<?php foreach ($sizes as $key): ?>
.pv<?=$key?>{
	padding-top:<?=$key?>px;
	padding-bottom:<?=$key?>px;
}
<?php endforeach ?>

<?php foreach ($sizes as $key): ?>
.ph<?=$key?>{
	padding-left:<?=$key?>px;
	padding-right:<?=$key?>px;
}
<?php endforeach ?>


<?php foreach ($sizes as $key): ?>
.mh<?=$key?>{
	margin-left:<?=$key?>px;
	margin-right:<?=$key?>px;
}
<?php endforeach ?>

<?php foreach ($sizes as $key): ?>
.mv<?=$key?>{
	margin-top:<?=$key?>px;
	margin-bottom:<?=$key?>px;
}
<?php endforeach ?>



<?php foreach ($sizes as $key): ?>
.m<?=$key?>{
	margin:<?=$key?>px;
}
<?php endforeach ?>

<?php foreach ($lad as $key1 => $value1 ){ ?>
<?php foreach ($sizes as $key): ?>
.m<?=$key1?><?=$key?>{
	margin-<?=$value1?>:<?=$key?>px;
}
<?php endforeach ?>
<?php } ?>

<?php foreach ($lad as $key2 => $value1){ ?>
<?php foreach ($sizes as $key3): ?>
.p<?=$key2?><?=$key3?>{
	padding-<?=$value1?>:<?=$key3?>px;
}
<?php endforeach ?>
<?php } ?>

.mt{
	margin-top:10px;
}
.mb{
	margin-bottom:10px;
}
.pull-right{
	float:right;
}
.t-center{
	text-align:center;
}
.t-right{
	text-align:right;
}
.t-left{
	text-align:left;
}
.text-muted{
	color:<?=$colors['muthed']?>;
	display:block;
}
.table_cv{
	width:100%;
	background:#ededed;
	text-align:left;
	margin-bottom:20px;
}
.label{
	background:#ddd;
	padding:2px 13px;
	line-height:13px;
	border-radius:5px;
	font-size:70%;
	font-weight:bold;
	letter-spacing:1px;
	display:inline-block;
	margin:auto 3px;
}
.label-sm{
	font-size:45%;
	padding:1px 5px;
}
a.label{
	text-decoration:none;
}
<?php foreach ($colors as $key => $value): ?>
.label-<?=$key?>{
	background:<?=$value?>;
	color:#fff;
}
a.label-<?=$key?>:hover{
	opacity:.9;
	color:#fff;
}
<?php endforeach ?>


<?php foreach ($colors as $key => $value): ?>
.bg-<?=$key?>{
	background:<?=$value?>;
	color:#fff;
}
<?php endforeach ?>


.table_cv thead th,.table_cv tbody td{
	background:#fcfcfc;
	padding:7px 5px;
	color:#555;
}
.item_cv{
	display:flex;
}
*[disabled]{
	opacity:.7;
	cursor:no-drop;
}
.preview_file_cv{
	min-width:80px;
	height:80px;
	line-height:80px;
	border:3px solid #CCC;
	margin-right:10px;
	text-align:center;
	font-size:30px;
	overflow:hidden;
	color:#CCC;
	border-radius:7px;
	cursor:pointer;
	text-transform:uppercase;
}
<?php foreach ($colors as $key => $value): ?>
.preview_file_cv_<?=$key?>{
	border-color:<?=$value?>;
	color:<?=$value?>;
}
<?php endforeach ?>

.item_body{
	    display: block;
    min-height: 80px;
    overflow: hidden;
    min-width: calc(100% - 100px);
    min-width: -webkit-calc(100% - 100px);
    min-width: -moz-calc(100% - 100px);
}

.item_body h3{
	margin:0px;
	padding:0px;
	font-weight:normal;
	padding-bottom:5px;
	color:#333;
}

.item_body h3 small{
	color:<?=$colors['muthed']?>;	
}
.action_cv_list{
	margin:0px;
	padding:0px;
	text-align:right;
	max-width:200px;
	display:block;
}