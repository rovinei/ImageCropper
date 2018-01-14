import jQuery from 'jquery';
import ImageCropper from './image-cropper';
import uploadImage from './upload-image';
import swal from 'sweetalert2';

(function($){
	var $imgElement = $('#imageElement');
	$('#drop').on('click', function() {
	    $('#fileUpload').trigger('click');
	});

	$('#fileUpload').on('change', function(e) {
	    addImage(e.target);
	});

	$("#drop").on("dragover", function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    $(this).addClass('dragging');
	});

	$("#drop").on("dragleave", function(e) {
	    $(this).removeClass('dragging');
	});

	$("#drop").on("drop", function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    var data = e.dataTransfer || e.originalEvent.dataTransfer;
	    addImage(data);
	});

	function addImage(data) {
	    var file = data.files[0];
	    if (file.type.indexOf('image') === -1) {
	        swal({
	        	title: "Failed",
	        	type: "error",
	        	text: "File upload must be image.",
	        	timer: 4000,
	        	toast: true,
	        	position: "center"
	        });
	        return false;
	    }

	    var reader = new FileReader();
	    reader.onload = function(event) {
	        var img = new Image();
	        img.onload = function() {
	            if (img.width < 200 || img.height < 200) {
	            	swal({
			        	title: "Failed",
			        	type: "error",
			        	text: "Sorry, the image you uploaded doesn\'t appear to be large enough.",
			        	timer: 4000,
			        	toast: true,
			        	position: "center"
			        });
	                return false;
	            }
	            cropImage(img);
	        }
	        img.src = event.target.result;
	    }
	    reader.readAsDataURL(file);
	}

	function cropImage(originalImage) {

	    $(originalImage).attr('id', 'fullImage');
	    $('#imageResize').html(originalImage);
	    $('#sectionDragAndDrop').addClass('hidden');
	    $('#sectionResize').removeClass('hidden');
	    var isReadyForCrop = false,
	    	uploadOptions = {
	    		compress_mode: 'auto',
	    	};
	    originalImage.addEventListener('ready', function() {
	    	console.log('Image ready to crop.');
	    	isReadyForCrop = true;
	    });

	    var cropperOption = {
    		preview: '#previewContainer',
    	};
    	var imgCropper = new ImageCropper(originalImage, cropperOption);
    	var imgBase64 = 'data:image/png;base64,';
    	imgCropper.initCropper();

	    $('#crop').on('click', function(e) {
	    	e.preventDefault();
	    	imgBase64 = imgCropper.getInstance().getCroppedCanvas().toDataURL('image/png');
	        var uploadPromise = uploadImage('my_cropped_thumbnail.png', imgBase64, uploadOptions);
	        uploadPromise.then(function(error, response){
	        	console.log(JSON.stringify(response));
	        }).catch(function(error){
	        	console.log(JSON.stringify(error));
	        });
	    });
	  
	}

})(jQuery);


