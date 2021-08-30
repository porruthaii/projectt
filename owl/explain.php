<?php 
session_start();
include('C:\xampp\htdocs\projectt\server.php');
?>
<?php
define("RDFAPI_INCLUDE_DIR", "C:/xampp/htdocs/projectt/rap-v096/rdfapi-php/api/");
include(RDFAPI_INCLUDE_DIR."RdfAPI.php");
$ontolo = ModelFactory:: getDefaultModel();
$ontolo->load('C:\xampp\htdocs\projectt\owl\explain.owl');

$querystring = '
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
SELECT ?subject ?object
	WHERE { ?subject rdfs:comment ?object 
        
    }
' ;
$result = $ontolo->sparqlQuery($querystring);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    
    if (isset($_SESSION['username'])) {
        for($i =0;$i<=37;$i++){
            $name = ($result["$i"]["?subject"]);
            $object =($result["$i"]["?object"]);
            $id = $i;
            $n = substr($name ,56,-2); 
            $o = substr($object ,9,-54);

    
            $sql = "UPDATE restauranttype SET comments = '$o' WHERE type_food ='$n'";
            mysqli_query($conn, $sql);  

        }
            header("location: \projectt\account\account.php");
    }
   ?>

</body>

</html>