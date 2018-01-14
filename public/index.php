<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Image thumbnail cropping</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="./assets/css/main.css">

</head>
<body>

	<!-- Upload image -->
	<section id="sectionDragAndDrop">
	    <div class="drop" id="drop">
	        <p>Drag &amp; drop or click here to upload an image.</p>
	    </div>
	    <input class="file-upload hidden" id="fileUpload" type="file">
	</section>

	<!-- Resize image -->
	<section class="hidden" id="sectionResize">
	    <div class="image-resize" id="imageResize"></div>
	  <button class="btn" id="crop"><span class='fa fa-crop'></span> Crop</button>
	</section>

	<script src="./assets/js/bundle.js"></script>
</body>
</html>