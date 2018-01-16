export default function (filename ,base64Image, options){
	console.log("heyyyyyyy 0");
	return new Promise(function(resolve, reject){
		var formData = new FormData();
		formData.append('base64Image', base64Image);
		formData.append('filename', filename);
		formData.append('options', options);
		console.log("heyyyyyyy 1.5");
		$.ajax({
			url: 'http://localhost:8888/upload_image.php',
			type: 'POST',
			method: 'POST',
			dataType: 'json',
			data: formData,
			processData: false,
	    contentType: false,
	    success: function(response){
	    	console.log("heyyyyyyy 1");
				resolve(null, {"data":"fuck"});
	    },
	    error: function(error){
	    	console.log("heyyyyyyy err 1");
				reject(error);
	    }
		});
	});
}