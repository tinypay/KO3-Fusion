<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Amazon_Core {
	
	private static $instance;
	
	/**
	 * Creates a nice static instance method for every Cloudfusion Amazon class // e.g. Amazon::SDB()->put_attributes();
	 *
	 * Note: this magic method is only possible with PHP >= 5.3.0
	 */
	public static function __callStatic($type, array $arguments){
	
		// check if instance already exists
		if(!isset(self::$instance[$type])){
			
			// initialize Cloudfusion
			KO3Fusion::init();
			
			$class = 'Amazon'.$type;
			
			// check if class exists
			if(class_exists($class)){
				
				// return instance of this class
				return self::$instance[$type] = new $class();
				
			}else{
				
				throw new Kohana_Exception('Amazon class :type does not exist', array(':type', $type));
			}
			
		}else{
			
			// return existing instance of this class
			return self::$instance[$type];
			
		}
		
	}
	
}
