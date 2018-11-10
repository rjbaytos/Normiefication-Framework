<?Php
// THIS IS A SAMPLE PAGE FOR IMPLEMENTING DEV_LIBRARY
include('dev_library.php');
$ai = new dev_library\filemanager;
$ai->allow_full_access_from('192.168.1.2');				// THIS SHOULD ALLOW YOU TO HAVE FULL ACCESS
$ai->allowaccess						= true;			// ALLOW LIMITED ACCESS TO FILE MANAGER

$ai->DB_username						= 'test';		// USERNAME
$ai->DB_password						= 'TESTSERVER';	// PASSWORD
$ai->DB_host							= 'localhost';	// HOSTNAME
$ai->DB_database						= 'test';		// DATABASE

$ai->DB_CustomQuery						= 'SELECT name FROM file WHERE ( id = :idk AND id LIKE :idk ) LIMIT 1';
$ai->DB_CustomQuery_AliasedRequest		= 'idk';

$ai->DB_WhereColumnName_Request			= 'name';

$ai->DB_WhereColumnName_AliasedRequest	= 'imgid';
$ai->DB_Table							= 'file';
$ai->DB_SelectDataColumn				= 'data';
$ai->DB_SelectFilenameColumn			= 'CONCAT_WS ( ".", name, extension )';
$ai->DB_WhereColumnName					= 'id';

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