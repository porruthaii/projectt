<?php
require_once RDFAPI_INCLUDE_DIR . '/model/Node.php';
require_once RDFAPI_INCLUDE_DIR . '/util/Object1.php';

/**
*   Object1 representation of a SPARQL variable.
*   @license http://www.gnu.org/licenses/lgpl.html LGPL
*/
class SparqlVariable extends Object1
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }



    public function __toString()
    {
        return $this->name;
    }



    /**
    *   Checks if the given subject/predicate/Object1
    *   is a variable name.
    *
    *   @return boolean
    */
    public static function isVariable($bject)
    {
        return is_string($bject) && strlen($bject) >= 2
             && ($bject[0] == '?' || $bject[0] == '$');
    }//public static function isVariable($bject)

}
?>