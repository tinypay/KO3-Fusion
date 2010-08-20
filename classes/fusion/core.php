<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Fusion_Core {
	
	// Hssold an instance of the class
	private static $instance;
	
	// Prevent direct creation of the object
	private function __construct(){}
	
	// Create or retrieve an instance
	public static function instance(){
		
		if(!isset(self::$instance)){	
			
			// load cloudfusion config
			$config = Kohana::config('cloudfusion');
			
			// set cloudfusion config constants
			defined('AWS_KEY') or define('AWS_KEY', $config['aws_key']); 
			defined('AWS_SECRET_KEY') or define('AWS_SECRET_KEY', $config['aws_secret_key']);
			defined('AWS_ASSOC_ID') or define('AWS_ASSOC_ID', $config['aws_assoc_id']);
			defined('AWS_DEFAULT_LOCALE') or define('AWS_DEFAULT_LOCALE', $config['aws_default_locale']);
			defined('AWS_CANONICAL_ID') or define('AWS_CANONICAL_ID', $config['aws_canonical_id']);
			
			// include cloudfusion class
			require_once(Kohana::find_file('vendor', 'Cloudfusion'));
			
			// return instance
			return self::$instance = self;
			
		}else{
			
			// return existing instance
			return self::$instance;
		}
		
	}
	
}