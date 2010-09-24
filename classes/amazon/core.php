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
	
	public static function s3_get_meta($bucket, $object_id){
		
		$s3 = Amazon::S3();
						
		$obj = $s3->head_object($bucket, $object_id);
		
		$meta = array();	
				
		if(isset($obj->header)){
				
			$header = $obj->header;
			
			foreach ($header as $key => $value){
				
				if(strpos($key, 'x-amz-meta-') === 0){
					
					$meta[str_replace('x-amz-meta-', '', $key)] = $value;
					
				}
				
			}
			
		}
		
		return $meta;
		
	}
	
	public static function s3_set_public($bucket, $prefix, $multi_exec = true){
		
		$s3 = Amazon::S3();
		
		$list = $s3->list_objects($bucket, array('prefix' => $prefix));
		
		if(isset($list->body->Contents)){
			
			$contents = $list->body->Contents;
			
			foreach ($contents as $content){				
				
				if($multi_exec AND method_exists('FlexSDB', 'handle')){
					
					// use FlexSDB multi_exec
					FlexSDB::handle($s3->set_object_acl($bucket, (string) $content->Key, S3_ACL_PUBLIC, true));
					
				}else{
					
					$s3->set_object_acl($bucket, (string) $content->Key, S3_ACL_PUBLIC);
				}
				
			}
			
		}		
		
	}
	
}
