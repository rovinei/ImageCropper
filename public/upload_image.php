<?php
// include composer autoload
require '../vendor/autoload.php';

use Intervention\Image\ImageManager;
use Spatie\ImageOptimizer\OptimizerChainFactory;

define('CROPPER_UPLOAD_THUMBNAIL_DIR', 'uploads/thumbnails/');
define('ERROR_SAVE_THUMBNAIL_CODE', 00010);
define('ERROR_PARAMS', 00011);
define('ERROR_IMAGE_OPTIMIZER', 00012);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && 
	isset($_POST['base64Image']) && 
	// isset($_POST['options']) && 
	// is_array($_POST['options']) &&
	(strpos($_POST['base64Image'], 'data:image/jpeg;base64,') || strpos($_POST['base64Image'], 'data:image/png;base64,'))
) {
	$post_filename = isset($_POST['filename']) ? $_POST['filename'] : '';
	$post_base64_image = $_POST['base64Image'];
	$post_options = new array('compress_mode', 'optimizer');

	try {
		process_upload($post_filename, $post_base64_image, $post_options);
		$response = new array(
			'status' => ['code' => 501, 'message' => $e->getMessage()],
			'data' => [

			]
		);
	} catch (Exception $e) {
		$response = new array(
			'status' => ['code' => 501, 'message' => $e->getMessage()],
			'data' => [

			]
		);
	}

	return json_encode($response);
}

private function process_upload($filename ,$base64_image, $options){
	if (!is_string($filename) || 
		!is_string($base64_image) || 
		!is_array($options) || 
		!array_key_exists('compress_mode', $options)
	) {
		throw new Exception("Parameters dose not met requirements.", ERROR_PARAMS);
		
	}

	$manager = new ImageManager(array('driver' => 'imagick'));
	$imageObj = $manager->make($base64_image);
	$upload_path = joinPaths(CROPPER_UPLOAD_THUMBNAIL_DIR, $filename)
	$response = new array();

	switch ($options->compress_mode) {
		case 'manaul':
			if (array_key_exists('quality', $options)) {
				try {
					$imageObj->save($upload_path, (int) $options->quality);
					$response['status'] = [
							'code' => 200,
							'message' => 'successfully uploaded cropped and optimized quality of thumbnail.'
						];
					$response['data'] = [
							'img_obj' => $imageObj,
							'uploaded_path' => $upload_path
						];

				} catch (Exception $e) {
					throw new Exception($e->getMessage(), ERROR_SAVE_THUMBNAIL_CODE);
				}
			}
			break;
		default:
			try {
				$imageObj->save($upload_path);
				$optimizerChain->optimize($upload_path);
				$response['status'] = [
						'code' => 200,
						'message' => 'successfully uploaded and automatically optimized quality of thumbnail.'
					];
				$response['data'] = [
						'img_obj' => $imageObj,
						'uploaded_path' => $upload_path
					];
			} catch (Exception $e) {
				if (strpos(get_class($e), 'NotWritableException')) {
					throw new Exception($e->getMessage(), 1);
				} else {
					throw new Exception("failed to optimize uploaded thumbnail image.", ERROR_IMAGE_OPTIMIZER);
				}
				
			}
			break;
	}

	return json_encode($response);
	
}

private function joinPaths($leftHandSide, $rightHandSide) { 
    return rtrim($leftHandSide, '/') .'/'. ltrim($rightHandSide, '/');
}

?>
