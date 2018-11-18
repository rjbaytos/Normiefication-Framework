# WebDevelopmentLibrary
This library is an on-going project. It's basically a compilation of the tools to make web development easier. It has only been tested so far on WAMP 3.1.0 (Apache 2.4.27, Php 7.1.9, MySQL 5.7.19), Windows 8.1 and Windows 10. There's no guarantee that it will work on a web hosting service.

Tools:
1. Tasks (dev_library\tasks)
  Contains the basic tasks/functionalities such as browsing files, resizing images, connecting to the database, and etc.
  SYNTAX:
  $classInstance (
      {string} task,
      {string} requestVariableKey,
      {string} requestType,
      {array} taskParameters,
      {closure} function($results){ ... }
  );
    - {string} task
      Name of the task to perform (function name or the corresponding alias).
    - {string} requestVariableKey
      the name of REQUEST/GET/POST variable (i.e. http://localhost/?requestVariableKey=value) to bind.
    - {string} requestType
      OPTIONAL. Choose between 'REQUEST', 'GET', and 'POST'.
    - {array} taskParameters
      OPTIONAL (DEPENDING ON TASK). Additional parameters for the task.
    - {closure} function($results){ ... }
      OPTIONAL. Get the $results array and process it using your own code instead of the default.

2. Media (dev_library\media)
  Contains the tools for media (audio/video) streaming.

3. File Manager (dev_library\filemanager)
  File manager is just as exactly as the name suggests - a file manager tool. It's capable of browsing through files in your computer. For now it can only browse. Deleting, copying, and moving files will be added in the future.

4. Scripts (dev_library\scripts)
  Javascript, HTML scripts, and CSS used by File Manager.

5. GUI_Elements (dev_library\GUI_Elements)
  Basic Parts of the File Manager like icons, thumbnails and stuff.

6. Files (dev_library\Files)
  Contains base64 encoded resources such as image files, icons, and the default JQuery library used by the File Manager.

Examples:
1. Media (Video/Audio) Streaming - Make the server listen to GET/POST/REQUEST for video and audio.
<?Php
  include('dev_library.php');
  $task = new dev_library\task;
  $task('media', 'stream'); // http://localhost/thisFile.php?stream=path/to/my/video.mp4
?>

2. Any File (images/programs/text files/etc) - Make the server listen to GET/POST/REQUEST for any file.
<?Php
  include('dev_library.php');
  $task = new dev_library\task;
  $cacheFiles = true;
  $task('file', 'location', [$cacheFiles]);
?>

3. Image Thumbnail - Make the server listen to GET/POST/REQUEST for image files and create thumbnail.
<?Php
  include('dev_library.php');
  $task = new dev_library\task;
  $size = 200; // px
  $adjustmentDimension = 'width' // 'width', 'height', or 'auto' to choose the largest dimension
  $cacheFiles = true;
  $task('urlthumb', 'location', [$size, adjustmentDimension, $cacheFiles]);
?>

4. Zip Content - Make the server listen to GET/POST/REQUEST to get Zipped content.
<?Php
  include('dev_library.php');
  $task = new dev_library\task;
  $cacheFiles = true;
  $task('zip', 'zipFile, zipContent', [$cacheFiles]);
?>

5. Zip Content - Make the server listen to GET/POST/REQUEST to create thumbnail from Zipped image file.
<?Php
  include('dev_library.php');
  $task = new dev_library\task;
  $size = 200; // px
  $adjustmentDimension = 'width' // 'width', 'height', or 'auto' to choose the largest dimension
  $cacheFiles = true;
  $task('zipthumb', 'zipFile, zipContent', [$size, adjustmentDimension, $cacheFiles]);
?>

6. Combining all in one script:
<?Php
include('dev_library.php');
$fileImageNoCache = true; // Do not cache file?
$task = new dev_library\task;
$task('media', 'media', 'GET');

// constraint can be 'width' / 'height' / 'auto'
// auto - constrain the largest dimension to px size

$task('file', 'file', 'GET', [$fileImageNoCache]);
$task('urlthumb', 'th', 'GET', [200, 'auto', $fileImageNoCache]);

$task('zip', 'zip, content', 'GET', [$fileImageNoCache]);
$task('zipthumb', 'zip_th, content_th', 'GET', [200, 'auto', $fileImageNoCache]);
?>

7. Implementing File Manager - check filemanager.php
