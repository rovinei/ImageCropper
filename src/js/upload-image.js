export default function uploadCroppedImage(filename ,base64Image, options){
	var formData = new FormData();
	formData.append('base64Image', base64Image);
	formData.append('filename', filename);
	formData.append('options', options);

	return new Promise((resolve, reject) => {
		$.ajax({
			url: 'upload_image.php',
			type: 'POST',
			dataType: 'json',
			data: formData,
			processData: false,
	    	contentType: false,
		})
		.done(function(response) {
			resolve(null, response);
		})
		.fail(function(error) {
			reject(error);
		});
	});
	
}