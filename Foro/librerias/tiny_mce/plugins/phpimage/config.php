<?php
/*
Php Image Plug-in uses a GPL licensed class "class.upload.php"
Authors website: http://www.verot.net/php_class_upload.htm
For a full list of extra options: http://www.verot.net/res/sources/class.upload.html

Default settings will resize any uploaded image to a maxiumum height of 400 px high or wide (saves bandwidth),
will replace spaces in filenames with _ (underscore), and will auto rename the file if it already exists.
*/
	
/*	'DOCUMENT_ROOT'
    El directorio raíz de documentos del servidor en el cual se está ejecutando 	
	el script actual, según está definida en el archivo de configuración del 
	servidor. */
	
$_cur_dir = $_SERVER['DOCUMENT_ROOT'];   // jesusvld .- 07-01-10

// The default language for errors is english to change to another type add lang to the lang folder e.g. fr_FR (french) to get language packs please download the class zip from the above authors link
$language						= 'en_EN';
// server file directory to store images - IMPORTANT CHANGE PATH TO SUIT YOUR NEEDS!!!
$server_image_directory		= $_cur_dir.'/upload';  //e.g. '/home/user/public_html/uploads'; 
// URL directory to stored images (relative or absoulte) - IMPORTANT CHANGE PATH TO SUIT YOUR NEEDS!!!
$url_image_directory			= '/upload'; 
// file_safe_name formats the filename (spaces changed to _) (default: true)
$handle->file_safe_name 	= true;
# file_auto_rename automatically renames file if it already exists (default: true)
$handle->file_auto_rename 	= true;
// image_resize determines is an image will be resized (default: false)
$handle->image_resize		= true;
// image_ratio if true, resize image conserving the original sizes ratio, using image_x AND image_y as max sizes if true (default: false)
$handle->image_ratio			= true;
// image_ratio_x if true, resize image, calculating image_x from image_y and conserving the original sizes ratio (default: false)
$handle->image_y				= 400;
// image_ratio_y if true, resize image, calculating image_y from image_x and conserving the original sizes ratio (default: false)
$handle->image_x				= 400;
// file_safe_name formats the filename (spaces changed to _) (default: true)
$handle->file_safe_name 	= true;
?>