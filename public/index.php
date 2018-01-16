<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Image thumbnail cropping</title>
	<link href="https://fonts.googleapis.com/css?family=Lobster|Ubuntu" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="./assets/css/main.css">

</head>
<body>
	<div class="cropper">
		<!-- Upload image -->
		<section id="sectionDragAndDrop">
		    <div class="drop" id="drop">
		        <p>Drag &amp; drop or click here to upload an image.</p>
		    </div>
		    <input class="file-upload hidden" id="fileUpload" type="file">
		</section>

		<!-- Resize image -->
		<section class="hidden" id="sectionResize">
			<div class="image-resize__outter clearfix">
				<div class="image-resize__bg">
					<div class="image-resize" id="imageResize"></div>
				</div>
				<div class="ratio-choice__wrapper">
					<span class="choice">
						<button data-ratio="1.7777777777777777" class="btn-ratio">
							16 <span>:</span> 9
						</button>
					</span>
					<span class="choice">
						<button data-ratio="1.3333333333333333" class="btn-ratio">
							4 <span>:</span> 3
						</button>
					</span>
					<span class="choice">
						<button data-ratio="1" class="btn-ratio">
							1 <span>:</span> 1
						</button>
					</span>
					<span class="choice">
						<button data-ratio="0.6666666666666666" class="btn-ratio">
							2 <span>:</span> 3
						</button>
					</span>
					<span class="choice">
						<button data-ratio="NaN" class="btn-ratio">
							Free
						</button>
					</span>
				</div>
			</div>
		  <button class="btn-crop" id="crop">
		  	<span class='fa fa-crop'></span> Crop &amp; Save
		  </button>
		</section>
	</div>
	<script src="./assets/js/bundle.js"></script>
</body>
</html>