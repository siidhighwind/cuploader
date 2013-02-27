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
abstract class Ciap_Image_Convert_Abstract implements Ciap_Image_Convert{
	/**
	 * Return instance of converter
	 * @param Ciap_Image_Driver $driver
	 * @param Ciap_Image_Resource $resource
	 * @param array $options
	 * @return Ciap_Image_Driver_Convert
	 */
	public static function getConverter(Ciap_Image_Driver $driver, Ciap_Image_Resource $resource, array $options = array(), $class = __CLASS__) {
		$dir = $driver->getDriverDir();
		$class_name = $class;
		$array = explode('_',$class_name);
		$last = $array[count($array)-1];
		$array[count($array)-1] = $dir;
		$array[] = $last;
		$class_name = implode('_',$array);
		
		return new $class_name($resource, $options);
	}
}

?>
