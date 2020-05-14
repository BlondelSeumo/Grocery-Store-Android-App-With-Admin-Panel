<?php
class Imagecomponent
{   
			function upload_image_and_thumbnail($datakey, $imgscale, $thumbscale,$path, $folderName, $square,$icon='50') {
		      if(is_array($_FILES[$datakey]["name"]))
              {
                    $flname=array();
                    if(!empty($_FILES[$datakey]["name"]))
                    {
                    
                    for($i=0;$i<count($_FILES[$datakey]["name"]);$i++)
        			{
                        //echo $Name_File=$_FILES['image']["name"][$i];
                        //$image=$imgfun->upload_image_and_thumbnail('image',500,200,'userfiles','contents',false);
                        if (strlen($_FILES[$datakey]['name'][$i])>4){ 
    					$error = 0;
    					$tempuploaddir = $path."/temp"; // the /temp/ directory, should delete the image after we upload
    					$biguploaddir = $path."/".$folderName."/big"; // the /big/ directory
    					$smalluploaddir = $path."/".$folderName."/small"; // the /small/ directory for thumbnails
    					$iconuploaddir= $path."/".$folderName."/icon";
    					// Make sure the required directories exist, and create them if necessary
    					if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,0777,true);
    					if(!is_dir($biguploaddir)) mkdir($biguploaddir,0777,true);
    					if(!is_dir($smalluploaddir)) mkdir($smalluploaddir,0777,true);
                        if(!is_dir($iconuploaddir)) mkdir($iconuploaddir,0777,true);
    					
    					$filetype = $this->getFileExtension($_FILES[$datakey]['name'][$i]);
                        
    					$filetype = strtolower($filetype);
     
    					if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png"))
    					{
    						// verify the extension
    						return;
    					}
    					else
    					{
    						// Get the image size
    						$imgsize = GetImageSize($_FILES[$datakey]['tmp_name'][$i]);
    					}
    
    					// Generate a unique name for the image (from the timestamp)
    					$id_unic = str_replace(".", "", strtotime ("now"));
    					$filename = $id_unic+$i;
    					$orgfilename = $this->getFileName($_FILES[$datakey]['name'][$i]);
                             
    					settype($filename,"string");
    					//$filename .=common::makeSlugs($orgfilename);
                        $filename.= ".";
    					$filename.=$filetype;
                        $flname[]=array("imagename"=>$filename,"filename"=>$orgfilename);
    					$tempfile = $tempuploaddir . "/$filename";
    					$resizedfile = $biguploaddir . "/$filename";
    					$croppedfile = $smalluploaddir . "/$filename";
                        $iconfile = $iconuploaddir . "/$filename";
    					
    					
    					if (is_uploaded_file($_FILES[$datakey]['tmp_name'][$i]))
                        {                    
    						// Copy the image into the temporary directory
                            if (!copy($_FILES[$datakey]['tmp_name'][$i],"$tempfile"))
                            {
                                print "Error Uploading File!.";
                                exit(); 
                            }
    						else {				
    							/*
    							 *	Generate the big version of the image with max of $imgscale in either directions
    							 */
    							$this->resize_img($tempfile, $imgscale, $resizedfile);							
    							
    							if($square) {
    								/*
    								 *	Generate the small square version of the image with scale of $thumbscale
    								 */
    								$this->crop_img($tempfile, $thumbscale, $croppedfile);
                                    $this->crop_img($tempfile, $icon, $iconfile);
    							}
    							else {
    								/*
    								 *	Generate the big version of the image with max of $imgscale in either directions
    								 */
    								$this->resize_img($tempfile, $thumbscale, $croppedfile);
                                    $this->resize_img($tempfile, $icon, $iconfile);
    							}
    							
    							// Delete the temporary image
    							unlink($tempfile);
    						}
                        }
     
                         // Image uploaded, return the file name
    					   
    		          }

                    }
                    return $flname;
                    }
              }else
              {
                  if (strlen($_FILES[$datakey]['name'])>4){ 
                        
    					$error = 0;
    					$tempuploaddir = $path."/temp"; // the /temp/ directory, should delete the image after we upload
    					$biguploaddir = $path."/".$folderName."/big"; // the /big/ directory
    					$smalluploaddir = $path."/".$folderName."/small"; // the /small/ directory for thumbnails
    					$iconuploaddir= $path."/".$folderName."/icon";
                        $origionaldir= $path."/".$folderName."/origional";
    					// Make sure the required directories exist, and create them if necessary
    					if(!is_dir($tempuploaddir)) mkdir($tempuploaddir,0777,true);
    					if(!is_dir($biguploaddir)) mkdir($biguploaddir,0777,true);
    					if(!is_dir($smalluploaddir)) mkdir($smalluploaddir,0777,true);
                        if(!is_dir($iconuploaddir)) mkdir($iconuploaddir,0777,true);
    					if(!is_dir($origionaldir)) mkdir($origionaldir,0777,true);
                        
    					$filetype = $this->getFileExtension($_FILES[$datakey]['name']);
    					$filetype = strtolower($filetype);
     
    					if (($filetype != "jpeg")  && ($filetype != "jpg") && ($filetype != "gif") && ($filetype != "png"))
    					{
    						// verify the extension
    						return;
    					}
    					else
    					{
    						// Get the image size
    						$imgsize = GetImageSize($_FILES[$datakey]['tmp_name']);
    					}
    
    					// Generate a unique name for the image (from the timestamp)
    					$id_unic = str_replace(".", "", strtotime ("now"));
    					$filename = $id_unic;
    					$orgfilename=   $this->getFileName($_FILES[$datakey]['name']);
    					settype($filename,"string");
    					//$filename .=common::makeSlugs($orgfilename);
                        $filename.= ".";
    					$filename.=$filetype;
    					$tempfile = $tempuploaddir . "/$filename";
    					$resizedfile = $biguploaddir . "/$filename";
    					$croppedfile = $smalluploaddir . "/$filename";
                        $iconfile = $iconuploaddir . "/$filename";
    					$flname=array("imagename"=>$filename,"filename"=>$orgfilename);
    					
    					if (is_uploaded_file($_FILES[$datakey]['tmp_name']))
                        {                    
    						// Copy the image into the temporary directory
                            if (!copy($_FILES[$datakey]['tmp_name'],"$tempfile"))
                            {
                                print "Error Uploading File!.";
                                exit(); 
                            }
    						else {				
    							/*
    							 *	Generate the big version of the image with max of $imgscale in either directions
    							 */
    							$this->resize_img($tempfile, $imgscale, $resizedfile);							
    							move_uploaded_file($_FILES[$datakey]['tmp_name'],$origionaldir."/".$filename);
    							if($square) {
    								/*
    								 *	Generate the small square version of the image with scale of $thumbscale
    								 */
    								$this->crop_img($tempfile, $thumbscale, $croppedfile);
                                    $this->crop_img($tempfile, $icon, $iconfile);
    							}
    							else {
    								/*
    								 *	Generate the big version of the image with max of $imgscale in either directions
    								 */
    								$this->resize_img($tempfile, $thumbscale, $croppedfile);
                                    $this->resize_img($tempfile, $icon, $iconfile);
    							}
    							
    							// Delete the temporary image
    							unlink($tempfile);
    						}
                        }
     
                         // Image uploaded, return the file name
    					 return $flname;   
    		  }
          }
	}

	
	/*
	*	Deletes the image and its associated thumbnail
	*	Example in controller action:	$this->Image->delete_image("1210632285.jpg","sets");
	*
	*	Parameters:
	*	$filename: The file name of the image
	*	$folderName: the name of the parent folder of the images. The images will be stored to /webroot/img/$folderName/big/ and  /webroot/img/$folderName/small/
	*/
	function delete_image($filename,$folderName,$path) {
		unlink($path."/".$folderName."/big/".$filename);
		unlink($path."/".$folderName."/small/".$filename);
		unlink($path."/".$folderName."/icon/".$filename);
	}
	
    function crop_img($imgname, $scale, $filename) {	
		$filetype = $this->getFileExtension($imgname);
		$filetype = strtolower($filetype);
			  
		switch($filetype){
			case "jpeg":
			case "jpg":
			  $img_src = ImageCreateFromjpeg ($imgname);
			 break;
			 case "gif":
			  $img_src = imagecreatefromgif ($imgname);
			 break;
			 case "png":
			  $img_src = imagecreatefrompng ($imgname);
			 break;
		}
		
	    $width = imagesx($img_src);
	    $height = imagesy($img_src);
	    $ratiox = $width / $height * $scale;
	    $ratioy = $height / $width * $scale;
		 
	    //-- Calculate resampling
	    $newheight = ($width <= $height) ? $ratioy : $scale;
	    $newwidth = ($width <= $height) ? $scale : $ratiox;
		
	    //-- Calculate cropping (division by zero)
	    $cropx = ($newwidth - $scale != 0) ? ($newwidth - $scale) / 2 : 0;
	    $cropy = ($newheight - $scale != 0) ? ($newheight - $scale) / 2 : 0;
		
	    //-- Setup Resample & Crop buffers
	    $resampled = imagecreatetruecolor($newwidth, $newheight);
	    $cropped = imagecreatetruecolor($scale, $scale);
		
        if($filetype=="png" || $filetype=="gif")
        {
            imagealphablending($cropped, false);
            imagesavealpha($cropped,true);
            $transparent = imagecolorallocatealpha($cropped, 255, 255, 255, 127);
            imagefilledrectangle($cropped, 0, 0, $width, $height, $transparent);
        }
	    //-- Resample
	    imagecopyresampled($resampled, $img_src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	    //-- Crop
	    imagecopy($cropped, $resampled, 0, 0, $cropx, $cropy, $newwidth, $newheight);

		// Save the cropped image
		switch($filetype)
		{
			case "jpeg":
			case "jpg":
			 imagejpeg($cropped,$filename,80);
			 break;
			 case "gif":
			 imagegif($cropped,$filename,5);
			 break;
			 case "png":
			 imagepng($cropped,$filename,5);
			 break;
		}
    }
	
	function resize_img($imgname, $size, $filename)	{
		$filetype = $this->getFileExtension($imgname);
		$filetype = strtolower($filetype);

		switch($filetype) {
			case "jpeg":
			case "jpg":
			$img_src = ImageCreateFromjpeg ($imgname);
			break;
			case "gif":
			$img_src = imagecreatefromgif ($imgname);
			break;
			case "png":
			$img_src = imagecreatefrompng ($imgname);
			break;
		}

		$true_width = imagesx($img_src);
		$true_height = imagesy($img_src);

		if ($true_width>=$true_height)
		{
			$width=$size;
			$height = ($width/$true_width)*$true_height;
		}
		else
		{
			$width=$size;
			$height = ($width/$true_width)*$true_height;
		}
		$img_des = ImageCreateTrueColor($width,$height);
		
        if($filetype=="png" || $filetype=="gif")
        {
            imagealphablending($img_des, false);
            imagesavealpha($img_des,true);
            $transparent = imagecolorallocatealpha($img_des, 255, 255, 255, 127);
            imagefilledrectangle($img_des, 0, 0, $width, $height, $transparent);
        }
        
        imagecopyresampled ($img_des, $img_src, 0, 0, 0, 0, $width, $height, $true_width, $true_height);
        
		// Save the resized image
		switch($filetype)
		{
			case "jpeg":
			case "jpg":
			 imagejpeg($img_des,$filename,80);
			 break;
			 case "gif":
			 imagegif($img_des,$filename);
			 break;
			 case "png":
			 imagepng($img_des,$filename);
			 break;
		}
	}
 
    function getFileExtension($str) {
 
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    function getFileName($str) {
 
        $i = strrpos($str,".");
        if (!$i) { return ""; }
        $l = strlen($str) - $i;
        $ext = substr($str,0,$i);
        return $ext;
    }

}
?>