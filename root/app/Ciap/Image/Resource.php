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
class Ciap_Image_Resource {
	/**
	 * Driver specyfic resource
	 * @var mixed 
	 */
	public $raw = null;
	/**
	 * File mime type
	 * @var ->raw 
	 */
	public $mime_type = null;
	/**
	 * Full image path
	 * @var ->raw
	 */
	public $path = null;
	/**
	 * Image directory
	 * @var ->raw 
	 */
	public $dir = null;
	/**
	 * Image filename
	 * @var string 
	 */
	public $filename = null;
	function __construct($raw, $mime_type, $path, $dir, $filename) {
		$this->raw = $raw;
		$this->mime_type = $mime_type;
		$this->path = $path;
		$this->dir = $dir;
		$this->filename = $filename;
	}

}

?>
