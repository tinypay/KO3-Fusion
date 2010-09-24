<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class KO3Fusion_Core {
	
	private static $init;
	
	// Initialize Cloudfusion
	public static function init(){
		
		if(!isset(self::$init)){
			
			// load cloudfusion config
			$config = Kohana::config('cloudfusion');
		
			// set cloudfusion config constants
			defined('AWS_KEY') or define('AWS_KEY', $config['aws_key']); 
			defined('AWS_SECRET_KEY') or define('AWS_SECRET_KEY', $config['aws_secret_key']);
			defined('AWS_ASSOC_ID') or define('AWS_ASSOC_ID', $config['aws_assoc_id']);
			defined('AWS_DEFAULT_LOCALE') or define('AWS_DEFAULT_LOCALE', $config['aws_default_locale']);
			defined('AWS_CANONICAL_ID') or define('AWS_CANONICAL_ID', $config['aws_canonical_id']);
			defined('AWS_CANONICAL_NAME') or define('AWS_CANONICAL_NAME', $config['aws_canonical_name']);
		
			// require cloudfusion class
			return self::$init = require_once(MODPATH.'ko3-fusion/vendor/cloudfusion/cloudfusion.class.php');
			
		}else{
			
			return self::$init;
		}
		
	}
	
	
	
}