<?php

// ----------------------------------------------------------------------------------
// Class: FindIterator
// ----------------------------------------------------------------------------------

/**
 * Iterator for traversing statements matching a searchpattern. 
 * FindIterators are returned by model->findAsIterator()
 * Using a find iterator is significantly faster than using model->find() which returns
 * a new result model.
 * 
 * 
 * @version  $Id: FindIterator.php 268 2006-05-15 05:28:09Z tgauss $
 * @author Tobias Gau� <tobias.gauss@web.de>
 *
 * @package utility
 * @access	public
 *
 */ 
 class FindIterator extends Object1 {

 	/**
	* Reference to the MemModel
	* @var		Object1 MemModel
	* @access	private
	*/	
    var $model;
    


 	/**
	* Current position
	* FindIterator does not use the build in PHP array iterator,
	* so you can use serveral iterators on a single MemModel.
	* @var		integer
	* @access	private
	*/	
    var $position;
    
    
    /**
	* Searchpattern
	* 
	* @var		Object1 Subject,Predicate,Object1
	* @access	private
	*/	

    var $subject;
    var $predicate;
    var $Object1;
   
    
   /**
    * Constructor
    *
    * @param	Object1	MemModel
    * @param    Object1  Subject
    * @param    Object1  Predicate
    * @param    Object1  Object1
	* @access	public
    */
    function FindIterator(&$model,$sub,$pred,$obj) {
		$this->model = &$model;
		$this->subject=$sub;
		$this->predicate=$pred;
		$this->Object1=$obj;
		$this->position=-1;
	}
	
	
 	/**
    * Returns TRUE if there are more matching statements.
    * @return	boolean
    * @access	public  
    */
    function hasNext() {
  		if($this->model->findFirstMatchOff($this->subject,$this->predicate,$this->Object1,$this->position+1)>-1){
  			return TRUE;
  		}else{
  			return FALSE;
  		}
    }

   
    /**
    * Returns the next matching statement.
    * @return	statement or NULL if there is no next matching statement.
    * @access	public  
    */
    function next() {
  			$res=$this->model->findFirstMatchOff($this->subject,$this->predicate,$this->Object1,$this->position+1);	
  			if($res>-1){
  				$this->position=$res;
  				return $this->model->triples[$res];
  			}else{
  				return Null;
  			}		
    }
   
   
 

    /**
    * Returns the current matching statement.
    * @return	statement or NULL if there is no current matching statement.
    * @access	public  
    */
    function current() {
  		if (($this->position >= -1)&&(isset($this->model->triples[$this->position]))) {
			return $this->model->triples[$this->position];
		} else {
			return NULL;
		} 
    }  
  
 } 

?>