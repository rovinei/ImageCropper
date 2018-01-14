<?php
// include composer autoload
require '../vendor/autoload.php';

use Intervention\Image\ImageManager;

$manager = new ImageManager(array('driver' => 'imagick'));

?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Image preview cropper</title>
	<<script src="./assets/js/require.js" type="text/javascript"></script>
	<link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
	<div class="cropper">
		<div class="cropper-canvas__wrapper">
			
		</div>
	</div>
	<script src="./assets/js/bundle.js"></script>
</body>
</html>