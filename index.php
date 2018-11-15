<?Php
include('dev_library.php');
dev_library\filemanager::$AUTORUN		= false;		// RUN FILE MANAGER IMMEDIATELY WHEN INSTANTIATED

$f = new dev_library\filemanager;						// INSTANTIATE FILE MANAGER
$f->allow_full_access_from('192.168.1.2');				// THIS SHOULD ALLOW YOU TO HAVE FULL ACCESS

$f->DB_alerts_disabled					= false;		// DISABLE DATABASE ALERTS
$f->no_cache							= false;		// STOP CACHING IMAGES?
$f->allowaccess							= true;			// ALLOW LIMITED ACCESS TO FILE MANAGER

$f->AJAXTargetElement					= '.imgpreview';// TARGET ELEMENT OF FILE MANAGER AJAX LINKS
$f->otherExtensions_add					= ['example'];	// OTHER FILE EXTENSIONS TO DETECT
														// USE "$f->otherExtensions" TO OVERRIDE LIST

// DATABASE CREDENTIALS:
$f->DB_username							= 'test';		// USERNAME
$f->DB_password							= 'TESTSERVER';	// PASSWORD
$f->DB_host								= 'LOCALHOST';	// HOSTNAME
$f->DB_database							= 'TEST';		// DATABASE

// IF YOU WANT TO CUSTOMIZE YOUR QUERY AND URL REQUEST (i.e. http://localhost/?uid=2)
// LEAVE FIELDS BLANK TO DISABLE THIS QUERY METHOD
$f->DB_CustomQuery_AliasedRequest		= 'uid';
$f->DB_CustomQuery						= 'SELECT data FROM file WHERE ( id = :uid AND id LIKE :uid ) LIMIT 1';

// IF YOU WANT TO SIMPLY USE THE COLUMN NAME IN THE DATABASE (i.e. http://localhost/?id=2)
// LEAVE FIELDS BLANK TO DISABLE THIS QUERY METHOD
$f->DB_WhereColumnName_Request			= 'id';

// IF YOU WANT A CUSTOMIZED URL REQUEST AND YOU HAVE A COLUMN FOR FILENAMES (http://localhost/?imid=2)
// LEAVE FIELDS BLANK TO DISABLE THIS QUERY METHOD
$f->DB_WhereColumnName					= 'id';
$f->DB_WhereColumnName_AliasedRequest	= 'imid';
$f->DB_SelectFilenameColumn				= 'CONCAT_WS ( ".", name, extension )';

// DATA COLUMN AND TABLE FOR THE LAST TWO METHODS (LEAVE BLANK IF YOU'RE NOT USING ANY OF THE TWO)
$f->DB_SelectDataColumn					= 'data';
$f->DB_Table							= 'file';

// OTHER REQUEST VARIABLES
$f->AJAXFileFetch_RequestVariable		= 'fetch';					//
$f->DataLocation_RequestVariable		= 'dir';					//
$f->FullImage_RequestVariable			= 'full';					//
$f->Thumbsize_RequestVariable			= 'thumbsize';				//
$f->File_RequestVariable				= 'filename';				//
$f->Encode_RequestVariable				= 'encode';					//
$f->Stream_RequestVariable				= 'media';					//
$f->URLThumb_RequestVariable			= 'th';						//
$f->Resource_RequestVariable			= 'resource';				//
$f->ZipFile_RequestVariable				= 'zipfile';				//
$f->ZipContent_RequestVariable			= 'content';				//
$f->ZipImageContent_RequestVariable		= 'zipimg';					//
$f->ZipThumbSource_RequestVariable		= 'zipthfile';				//
$f->ZipThumbContent_RequestVariable		= 'zipthimg';				//
$f->Script_RequestVariable				= 'script';					//
$f->ScriptParameter_RequestVariables	= '*';						//
$f->RangeStart_RequestVariable			= 'start';					//
$f->RangeEnd_RequestVariable			= 'end';					//
$f->WatchMedia_RequestVariable			= 'watch';					//
$f->ListenToMedia_RequestVariable		= 'listen';					//

// PROPERTIES FOR THE IMAGE PREVIEW
$f->image_properties					= "class='imagepreview'";	//

// ADJUST THUMBNAIL width/height/auto
$f->thumbnail_adjustment_orientation	= 'auto';					//
$f->thumbsize							= 100;						//

// APPLY GZIP COMPRESSION
dev_library\task::compress();

// RUN FILE MANAGER
$f();

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
		<div class='ajax'>{$f->files}</div>
		<div class='imgpreview' style='display:inline-block;'>{$f->imdispl}</div>
	</body>
</html>
BODY;
?>