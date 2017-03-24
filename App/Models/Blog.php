<?php

namespace App\Models;
//Use file info
use finfo;
use Intervention\Image\ImageManagerStatic as Image;



class Blog extends DatabaseModel {
	protected static $tableName = 'Blogpost';
	protected static $columns = ['id', 'title', 'description', 'image', 'timeStamp'];
	protected static $validationRules = [
		'title' => 'minlength:1,maxlength:100',
		'description' => 'minlength:10'
	];

	public function saveImage($fileName) {
		//Create a new instance of finfo
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$mime = $finfo->file($fileName);

		//List of acceptable file types
		$extensions = [
			'image/jpg'=>'.jpg',
			'image/jpeg'=>'.jpeg',
			'image/png'=>'.png',
			'image/gif'=>'.gif'
		];

		if (isset($extensions[$mime])) {
			$extension = $extensions[$mime];
		} else {
			$extension = '.jpg';
		}

		//Give the image a unique name
		$newFileName = uniqid() . $extension;

		// On Macs make sure you set images, images/thumbs and images/originals as read & write for everyone

		// Check to see if images/originals exists
		// If not, we will create one here
		$folder = './images/originals';
		if (!is_dir($folder)) {
			mkdir($folder, 0777, true);
		}

		// Move the image to the folder
		$destination = $folder . '/' . $newFileName;
		move_uploaded_file($fileName, $destination);

		//If thumbs folder doesn't exsist
		if (!is_dir('./images/thumbs')) {
			mkdir('./images/thumbs/', 0777, true);
		}

		//Make an instance of Image Intervention
		$img = Image::make($destination);
		$img->resize(null, 300, function($constraint){
			$constraint->aspectRatio();
		});
		$img->save('./images/thumbs/' . $newFileName);

		//Save the file name in the database
		$this->image = $newFileName;
	}
}