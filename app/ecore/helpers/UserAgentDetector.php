<?php 
namespace Ecore\Helpers;

class UserAgentDetector{
	private static $instance=null;

	//initialize all known var as false
	private $iPod 				= false;
	private $iPhone 			= false;
	private $iPad 				= false;
	private $iOS 				= false;
	private $webOSPhone 		= false;
	private $webOSTablet 		= false;
	private $webOS 				= false;
	private $BlackBerry9down 	= false;
	private $BlackBerry10 		= false;
	private $RimTablet 			= false;
	private $BlackBerry 		= false;
	private $NokiaSymbian 		= false;
	private $Symbian 			= false;
	private $AndroidTablet 		= false;
	private $AndroidPhone 		= false;
	private $Android 			= false;
	private $WindowsPhone 		= false;
	private $WindowsTablet 		= false;
	private $Windows 			= false;
	private $Tablet 			= false;
	private $Phone 				= false;
	
	private function __construct(){
		//Detect special conditions devices & types (tablet/phone form factor)
		if(stripos($_SERVER['HTTP_USER_AGENT'],"iPod")){
		    $this->iPod = true;
		    $this->Phone = true;
		    $this->iOS = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"iPhone")){
		    $this->iPhone = true;
		    $this->Phone = true;
		    $this->iOS = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"iPad")){
		    $this->iPad = true;
		    $this->Tablet = true;
		    $this->iOS = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"webOS")){
		    $this->webOS = true;
		    if(stripos($_SERVER['HTTP_USER_AGENT'],"Pre") || stripos($_SERVER['HTTP_USER_AGENT'],"Pixi")){
		        $this->webOSPhone = true;
		        $this->Phone = true;
		    }
		    if(stripos($_SERVER['HTTP_USER_AGENT'],"TouchPad")){
		        $this->webOSTablet = true;
		        $this->Tablet = true;
		    }
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"BlackBerry")){
		    $this->BlackBerry = true;
		    $this->BlackBerry9down = true;
		    $this->Phone = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"BB10")){
		    $this->BlackBerry = true;
		    $this->BlackBerry10 = true;
		    $this->Phone = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"RIM Tablet")){
		    $this->BlackBerry = true;
		    $this->RimTablet = true;
		    $this->Tablet = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"SymbianOS")){
		    $this->Symbian = true;
		    $this->NokiaSymbian = true;
		    $this->Phone = true;
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"Android")){
		    $this->Android = true;
		    if(stripos($_SERVER['HTTP_USER_AGENT'],"mobile")){
		        $this->AndroidPhone = true;
		        $this->Phone = true;
		    }else{
		        $this->AndroidTablet = true;
		        $this->Tablet = true;
		    }
		}
		if(stripos($_SERVER['HTTP_USER_AGENT'],"Windows")){
		    $this->Windows = true;
		    if(stripos($_SERVER['HTTP_USER_AGENT'],"Touch")){
		        $this->WindowsTablet = true;
		        $this->Tablet = true;
		    }
		    if(stripos($_SERVER['HTTP_USER_AGENT'],"Windows Phone")){
		        $this->WindowsPhone = true;
		        $this->Phone = true;
		    }
		}
	}

	private static function init(){
		if(is_null(self::$instance))
			self::$instance=new UserAgentDetector();
		return self::$instance;
	}

	/* Platform */

	public static function isPhone(){
		return self::init()->Phone;
	}

	public static function isTablet(){
		return self::init()->Tablet;
	}

	public static  function isDesktop(){
		return (!self::init()->Phone && !self::init()->Tablet);
	}

	/* OS */

	public static function isiOS(){
		return self::init()->iOS;
	}

	public static function isAndroid(){
		return self::init()->Android;
	}

	public static function isWindows(){
		return self::init()->Windows;
	}

	public static function isBlackBerry(){
		return self::init()->BlackBerry;
	}

	public static function iswebOS(){
		return self::init()->webOS;
	}

	public static function isSymbian(){
		return self::init()->Symbian;
	}

	/* Devices */

	public static function isiPod(){
		return self::init()->iPod;
	}

	public static function isiPhone(){
		return self::init()->iPhone;
	}

	public static function isiPad(){
		return self::init()->iPad;
	}

	public static function isAndroidPhone(){
		return self::init()->AndroidPhone;
	}

	public static function isAndroidTablet(){
		return self::init()->AndroidTablet;
	}

	public static function isWindowsPhone(){
		return self::init()->WindowsPhone;
	}

	public static function isWindowsTablet(){
		return self::init()->WindowsTablet;
	}

	public static function iswebOSPhone(){
		return self::init()->webOSPhone;
	}

	public static function iswebOSTablet(){
		return self::init()->webOSTablet;
	}

	public static function isBlackBerry9down(){
		return self::init()->BlackBerry9down;
	}

	public static function isBB10(){
		return self::init()->BB10;
	}

	public static function isRimTablet(){
		return self::init()->RimTablet;
	}

	public static function isNokiaSymbian(){
		return self::init()->NokiaSymbian;
	}

}