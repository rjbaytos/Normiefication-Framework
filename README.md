# Normiefication-Framework
This framework is currently a work in progress. The goal is to minimize the details that goes into developing systems by providing the objects that are often found in mainstream websites. The current version has only been tested so far on WAMP 3.1.0 (Apache 2.4.27, Php 7.1.9, MySQL 5.7.19), Windows 8.1 and Windows 10. There's no guarantee that it will work on a web hosting service.

Tools:
1. Tasks (normiefication\tasks) - Contains the basic tasks/functionalities such as browsing files, resizing images, connecting to the database, and etc. Follows a JQuery-like syntax.
  * SYNTAX:
  * $classInstance ( {string}task, {string}requestVariableKey, {string}requestType, {array}taskParameters, {closure}function($results){ ... } );
    - {string} task | Name of the task to perform (function name or the corresponding alias).
    - {string} requestVariableKey | the name of REQUEST/GET/POST variable (i.e. http://localhost/?requestVariableKey=value) to bind.
    - {string} requestType | OPTIONAL. Choose between 'REQUEST', 'GET', and 'POST'.
    - {array} taskParameters | OPTIONAL (DEPENDING ON TASK). Additional parameters for the task.
    - {closure} function($results){ ... } | OPTIONAL. Get the $results array and process it using your own code instead of the default.

2. Media (normiefication\media) - Contains the tools for media (audio/video) streaming.

3. File Manager (normiefication\filemanager) - File manager is just as exactly as the name suggests - a file manager tool. It's capable of browsing through files in your computer. For now it can only browse. Deleting, copying, and moving files will be added in the future.

4. Scripts (normiefication\scripts) - Javascript, HTML scripts, and CSS used by File Manager.

5. GUI_Elements (normiefication\GUI_Elements) - Basic Parts of the File Manager like icons, thumbnails and stuff.

6. Files (normiefication\Files) - Contains base64 encoded resources such as image files, icons, and the default JQuery library used by the File Manager.

<for sample implementations, see examples.txt>
