<?Php
include('dev_library.php');
$fileImageNoCache = true; // Do not cache file?
$task = new dev_library\task;
$task('media', 'media', 'GET');

// constraint can be 'width' / 'height' / 'auto'
// auto - constrain the largest dimension to px size

$task('file', 'file', 'GET', [$fileImageNoCache]);
$task('urlthumb', 'th, size', 'GET', ['auto', $fileImageNoCache]);

$task('zip', 'zip, content', 'GET', [$fileImageNoCache]);
$task('zipthumb', 'zip_th, content_th, size', 'GET', ['auto', $fileImageNoCache]);
?>

using media function:<br/>
<audio controls>
	<source src='?media=sample/music.mp3' type='audio/mp3'>
</audio><br/>

<video controls>
	<source src='?media=sample/video.mp4' type='video/mp4'>
</video><br/>

<br>

not using media function:<br/>
<audio controls>
	<source src='?file=sample/music.mp3' type='audio/mp3'>
</audio><br/>

<video controls>
	<source src='?file=sample/video.mp4' type='video/mp4'>
</video><br/>