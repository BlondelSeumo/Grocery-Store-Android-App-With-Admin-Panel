<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/***
 * File: (Codeigniterapp)/libraries/Controllerlist.php
 * 
 * A simple library to list al your controllers with their methods.
 * This library will return an array with controllers and methods
 * 
 * The library will scan the "controller" directory and (in case of) one (1) subdirectory level deep
 * for controllers
 * 
 * Usage in one of your controllers:
 * 
 * $this->load->library('controllerlist');
 * print_r($this->controllerlist->getControllers());
 * 
 * @author Peter Prins 
 */
 
class ControllerList {
	
	/**
	 * Codeigniter reference 
	 */
	private $CI;

	/**
	 * Array that will hold the controller names and methods
	 */
	private $aControllers;
	
	// Construct
	function __construct() {
		// Get Codeigniter instance 
		$this->CI = get_instance();
		
		// Get all controllers 
		$this->setControllers();
        
	}
	
	/**
	 * Return all controllers and their methods
	 * @return array
	 */
	public function getControllers() {
		return $this->aControllers;
	}
	
	/**
	 * Set the array holding the controller name and methods
	 */
	public function setControllerMethods($p_sControllerName, $p_aControllerMethods) {
		$this->aControllers[$p_sControllerName] = $p_aControllerMethods;
	}
	
	/**
	 * Search and set controller and methods.
	 */
	private function setControllers() {
		// Loop through the controller directory
		foreach(glob(APPPATH . 'controllers/*') as $controller) {
			
			// if the value in the loop is a directory loop through that directory
			if(is_dir($controller)) {
				// Get name of directory
				$dirname = basename($controller, EXT);
				
				// Loop through the subdirectory
				foreach(glob(APPPATH . 'controllers/'.$dirname.'/*') as $subdircontroller) {
					// Get the name of the subdir
					$subdircontrollername = basename($subdircontroller, EXT);
					
					// Load the controller file in memory if it's not load already
					if(!class_exists($subdircontrollername)) {				
						$this->CI->load->file($subdircontroller);
					}					
					// Add the controllername to the array with its methods
					$aMethods = get_class_methods($subdircontrollername);
					$aUserMethods = array();
					foreach($aMethods as $method) {
						if($method != '__construct' && $method != 'get_instance' && $method != $subdircontrollername) {
							$aUserMethods[] = $method;
						}
					}
					$this->setControllerMethods($subdircontrollername, $aUserMethods);					 					
				}
			}
			else if(pathinfo($controller, PATHINFO_EXTENSION) == "php"){
				// value is no directory get controller name				
			    $controllername = basename($controller, EXT);
									
				// Load the class in memory (if it's not loaded already)
				if(!class_exists($controllername)) {
					$this->CI->load->file($controller);
				}				
					
				// Add controller and methods to the array
				$aMethods = get_class_methods($controllername);
				$aUserMethods = array();
				if(is_array($aMethods)){
					foreach($aMethods as $method) {
						if($method != '__construct' && $method != 'get_instance' && $method != $controllername) {
							$aUserMethods[] = $method;
						}
					}
				}
									
				$this->setControllerMethods($controllername, $aUserMethods);								
			}
		}	
	}
}
// EOF