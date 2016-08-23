<?php namespace Ecore\Helpers;
 
use File;
use ZipArchive;

class Zipper {
	private $items;

	public function __construct(){
		$this->items=array();
	}
  
	public function add($file){
		$this->items[]=$file;
	}

	public function save($file){
		$zip=new ZipArchive();
		if($zip->open($file, ZipArchive::CREATE) === TRUE){
			foreach ($this->items as $item) {
				$zip->addFile($item,basename($item));
			}
			$zip->close();
			return true;
		}
		return false;
	}
   
	public static function folder($folder,$name=null){
		if(!File::exists($folder))
			return false;

		if(is_null($name)){
			$name=basename($folder).'.zip';
		}

		$zipper=new Zipper();
		foreach(glob($folder.'/*') as $file){
			$zipper->add($file);
		}

		return $zipper->save($folder.'/'.$name);
	}

	public static function file($file){
		$folder=pathinfo($file, PATHINFO_DIRNAME);
		$name=pathinfo($file, PATHINFO_FILENAME).'.zip' ;
		$zipper=new Zipper();
		$zipper->add($file);
		return $zipper->save($folder.'/'.$name);
	}


}