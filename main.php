<?Php
include('dev_library.php');
$ai = new filemanager();
$ai->allow_full_access_from('192.168.1.2');
$ai->allowaccess						= true;
$ai->db_username						= 'test';
$ai->db_password						= 'TESTSERVER';
$ai->db_host							= 'localhost';
$ai->db_database						= 'test';

$ai->Database_RequestVariable_m1		= 'id';
$ai->Database_RequestVariable_m2		= 'name';
$ai->Database_RequestVariable_m3		= 'imgid';

$ai->DB_Table							= 'file';
$ai->DB_SelectDataColumn				= 'data';
$ai->DB_SelectFilenameColumn			= 'CONCAT_WS ( ".", name, extension )';
$ai->DB_WhereConditionColumn			= 'id';

$ai->thumbsize							= 100;
$ai();

echo <<<BODY
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel='icon' href='?resource=icon'/>
		<title>{$_SERVER['HTTP_HOST']}</title>
		<script type='text/javascript' src='?resource=jquery331'></script>
		<script type='text/javascript' src='?script=ui'></script>
		<link rel='stylesheet' href='?script=css' type='text/css'/>
	</head>
	<body
			link = '#273746'
			alink = '#273746'
			vlink = '#273746'
			style = 'background-attachment:fixed; text-shadow: 1px 1px 2px #000000;'
	>
		<script>AJAXForm('div.ajax');</script>
		<div class='ajax'>{$ai->files}</div>
		<div class='imgpreview' style='display:inline-block;'>{$ai->imdispl}</div>
	</body>
</html>
BODY;

//*/
?>