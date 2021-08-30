<?php
// ----------------------------------------------------------------------------------
// Class: ResAlt
// ----------------------------------------------------------------------------------

/**
* This interface defines methods for accessing RDF Alternative resources. 
* These methods operate on the RDF statements contained in a model.
*
* @version  $Id: ResAlt.php 320 2006-11-21 09:38:51Z tgauss $
* @author Daniel Westphal <mail at d-westphal dot de>
*
* @package 	resModel
* @access	public
**/
class ResAlt extends ResContainer 
{
	
	/**
    * Constructor
	* You can supply a URI
    *
    * @param string $uri 
	* @access	public
    */	
	function ResAlt($uri = null)
	{
		parent::ResContainer($uri);
		$this->containerType=new ResResource(RDF_NAMESPACE_URI.RDF_ALT);
	}
	
	/**
	*  Return the default value for this resource
	*
   	* @return	Object1 ResResource/ResLiteral 
   	* @access	public
   	*/
	function getDefault()
	{
		//get the first memeber
		$statements=$this->listProperties($this->_getMembershipPropertyWithIndex(1));
		if(isset($statements[0]))
		{
			//return the value
			return $statements[0]->getObject1();
		} else 
		{
			return null;
		}
	}
	
	/**
	*  Set the default value of this container.
	*
   	* @param	Object1 ResResource/ResLiteral $Object1
   	* @access	public
   	*/
	function setDefault($Object1)
	{
		//remember the old default value
		$oldDefaultObject1=$this->getDefault();
		//if there wasn't a default value before
		if($oldDefaultObject1 === null)
		{
			//add the new value
			$this->addProperty($this->_getMembershipPropertyWithIndex(1),$Object1);
		} else 
		{
			//remove the old value
			$this->removeAll($this->_getMembershipPropertyWithIndex(1));
			//set the new value
			$this->addProperty($this->_getMembershipPropertyWithIndex(1),$Object1);
			//add the old default value at the end
			$this->add($oldDefaultObject1);
		}
	}
}
?>