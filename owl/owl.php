<?php 
session_start();
include('C:\xampp\htdocs\projectt\server.php');
?>
<?php
define("RDFAPI_INCLUDE_DIR", "C:/xampp/htdocs/projectt/rap-v096/rdfapi-php/api/");
include(RDFAPI_INCLUDE_DIR."RdfAPI.php");
$ontolo = ModelFactory:: getDefaultModel();
$ontolo->load('C:\xampp\htdocs\projectt\owl\1507.owl');
$querystring = '
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX owl: <http://www.w3.org/2002/07/owl#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
SELECT ?subject ?object 
	WHERE { ?subject rdfs:subClassOf ?object }
' ;
$result = $ontolo->sparqlQuery($querystring);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>

    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        for($i =0;$i<506;$i++){
            $name = ($result["$i"]["?subject"]);
            $object =($result["$i"]["?object"]);
            $id = $i+1;
            $m = substr($name ,33,-2); 
            $o = substr($object ,56,-2);
            $sql = "INSERT INTO food (id,name_food,object) VALUES ('$id','$m','$o')";
            mysqli_query($conn, $sql);
        }
            $sql = "SELECT id,name_food,object FROM food";
            $result = mysqli_query($conn, $sql);
            header("location: /projectt/account/thaifood.php");
    }
   ?>

</body>

</html>