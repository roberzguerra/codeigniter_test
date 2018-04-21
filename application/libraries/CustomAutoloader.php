<?php
class CustomAutoloader{

	public function __construct(){
		spl_autoload_register(array($this, 'loader'));
	}

	public function loader($className){
		require  APPPATH .  str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
	}

}
?>
