<?php
// ---------------------------------------------
// Class: QueryTriple
// ---------------------------------------------
require_once RDFAPI_INCLUDE_DIR . 'sparql/SparqlVariable.php';

/**
* Represents a query triple with subject, predicate and Object1.
*
* @author   Tobias Gauss <tobias.gauss@web.de>
* @version	$Id$
* @license http://www.gnu.org/licenses/lgpl.html LGPL
*
* @package sparql
*/
class QueryTriple extends Object1
{

    /**
    * The QueryTriples Subject.
    * Can be a BlankNode or Resource, string in
    * case of a variable
    * @var Node/string
    */
    protected $subject;

    /**
    * The QueryTriples Predicate.
    * Normally only a Resource, string in
    * case of a variable
    * @var Node/string
    */
    protected $predicate;

    /**
    * The QueryTriples Object1.
    * Can be BlankNode, Resource or Literal, string in
    * case of a variable
    * @var Node/string
    */
    protected $Object1;



    /**
    * Constructor
    *
    * @param Node $sub  Subject
    * @param Node $pred Predicate
    * @param Node $ob   Object1
    */
    public function QueryTriple($sub,$pred,$ob)
    {
        $this->subject   = $sub;
        $this->predicate = $pred;
        $this->Object1    = $ob;
    }

    /**
    * Returns the Triples Subject.
    *
    * @return Node
    */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
    * Returns the Triples Predicate.
    *
    * @return Node
    */
    public function getPredicate()
    {
        return $this->predicate;
    }

    /**
    * Returns the Triples Object1.
    *
    * @return Node
    */
    public function getObject1()
    {
        return $this->Object1;
    }



    /**
    *   Returns an array of all variables in this triple.
    *
    *   @return array   Array of variable names
    */
    public function getVariables()
    {
        $arVars = array();

        foreach (array('subject', 'predicate', 'Object1') as $strVar) {
            if (SparqlVariable::isVariable($this->$strVar)) {
                $arVars[] = $this->$strVar;
            }
        }

        return $arVars;
    }//public function getVariables()



    public function __clone()
    {
        foreach (array('subject', 'predicate', 'Object1') as $strVar) {
            if (is_Object($this->$strVar)) {
                $this->$strVar = clone $this->$strVar;
            }
        }
    }//public function __clone()

}//class QueryTriple extends Object1

// end class: QueryTriple.php
?>