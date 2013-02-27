<?php
/*Copyright (C) 2013 Jarosław Stasiaczek
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software 
 * and associated documentation files (the "Software"), to deal in the Software without restriction, 
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, 
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is 
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR 
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE 
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, 
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
 * OTHER DEALINGS IN THE SOFTWARE.
 */


class Action_Createthumb extends Action_Base{
	public function __construct() {
		parent::__construct();
		if(!Config_Secure::can_upload())
			Ciap::redirect (Ciap_Url::create('index')->buildUrl());
	}
	public function get($maches)
	{
	}
	
	public function post($maches)
	{
		if(!isset($_POST['thumb_id']) || !isset($_POST['imageName']) || !isset($_POST['path_add']))
			return json_encode (Array('error' => 'Data incomplete!', 'success' => false, 'attributes' => ''));
		$thumb_id = (int)$_POST['thumb_id'];
		if(!isset($this->config['thumb_create'][$thumb_id]))
			return json_encode (Array('error' => 'This thumb do not exisits!', 'success' => false, 'attributes' => ''));
		
		// init some paths and urls
		$save_path = $this->config['thumb_dir'].$_POST['path_add'];
		$thumb_path = $this->config['thumb_dir'].$_POST['path_add'].Ciap_Image::extendImageName($_POST['imageName'], '_'.$this->config['thumb_create'][$thumb_id]['output_file_name_postfix']);
		$thumb_url = $this->config['thumb_url'].$_POST['path_add'].Ciap_Image::extendImageName($_POST['imageName'], '_'.$this->config['thumb_create'][$thumb_id]['output_file_name_postfix']);
		$image_path = $this->config['image_upload_dir'].$_POST['path_add'].$_POST['imageName'];
		
		// check if file exists
		if(file_exists($thumb_path))
			return json_encode (Array('good' => 'File already exsist!', 'success' => true, 'url' => Ciap_Tools::fixImagePath ($thumb_url), 'attributes' => explode(',',Ciap_Tools::getImageWithHeightAttributes($thumb_path, true))));
		if(!file_exists($image_path))
			return json_encode (Array('error' => 'No file to convert!', 'success' => false, 'attributes' => ''));
		
		// create thumbnail dir
		if(!is_dir(dirname($save_path)))
			mkdir(dirname($save_path), 0777, true);
		
		// create thumbnail 
		try{
			$image = Ciap_Image::create($image_path);
			foreach($this->config['thumb_create'][$thumb_id]['chain'] as $part)
			{
				$image->convert($part['class'], $part['options']);
			}
			$image->save($thumb_path);
		}catch(Exception $e)
		{
			
		}
		return json_encode (Array('good' => 'Converted!', 'success' => true, 'url' => Ciap_Tools::fixImagePath ($thumb_url), 'attributes' => explode(',',Ciap_Tools::getImageWithHeightAttributes($thumb_path, true))));
	}
}

?>