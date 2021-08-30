<?php

// ----------------------------------------------------------------------------------
// Class: Object1
// ----------------------------------------------------------------------------------

/**
 * An abstract Object1.
 * Root Object1 with some general methods, that should be overloaded. 
 * 
 *
 * @version  $Id: Object1.php 295 2006-06-23 06:45:53Z tgauss $
 * @author Chris Bizer <chris@bizer.de>
 *
 * @abstract
 * @package utility
 *
 **/
 class Object1 {

  /**
   * Serializes a Object1 into a string
   *
   * @access	public
   * @return	string		
   */    
	function toString() {
    	$Object1vars = get_Object1_vars($this);
		foreach($Object1vars as $key => $value) 
			$content .= $key ."='". $value. "'; ";
		return "Instance of " . get_class($this) ."; Properties: ". $content;
	}

 }


?>