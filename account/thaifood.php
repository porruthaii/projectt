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
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0px;
        margin-top: 50px;
        font-family: 'Montserrat', sans-serif;

    }

    .topnav {
        height: 40px;
        overflow: hidden;
        background-color: #e9e9e9;
        font-family: 'Montserrat', sans-serif;
        position: fixen;
    }

    .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 10px 16px;
        text-decoration: none;
        font-size: 14px;
        background-color: #c6c6c6;
        margin: 0px;
    }


    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* .topnav a.active:hover {
       
        color: white;
    } */

    .active,
    .link:hover {
        color: #2196F3;
    }

    .active {
        color: #2196F3;
    }

    p a {
        margin: 3px;
        color: black;

    }

    /* .action {
        color: #2196F3;
    } */

    .container {
        height: 100%;
        width: 100%;
    }


    .limn {
        font-size: 12px;
        color: #a5a5a5;
    }

    .btn {
        width: 500px;
        margin-top: 20px;
        margin-bottom: 50px;
    }

    @media screen and (max-width: 600px) {
        .topnav .search-container {
            float: none;
        }

        .topnav a,
        .topnav input[type=text],
        .topnav .search-container button {
            float: none;
            display: block;
            text-align: left;
            width: 100%;
            margin: 0;
            padding: 14px;
        }

        .topnav input[type=text] {
            border: 1px solid #ccc;
        }
    }
    </style>
    <div class="topnav fixed-top">
        <a href="\projectt\index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
        <a href="\projectt\index.php?logout='1'"> <i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
    </div>
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
    $sql = "UPDATE food SET object = '$o' WHERE id ='$id'";
    mysqli_query($conn, $sql);  
}
$sql = "SELECT id,name_food,object FROM food";
$result = mysqli_query($conn, $sql);
    }
   ?>
    <div class="container">
        <div class="col">
            <from method="post" id="myDIV">
                <p>ตรวจสอบข้อมูลอาหารไทย
                </p>
                <p class="limn">*แก้ไขข้อมูลอาหารไทยที่ไม่ถูกต้อง</p>
            </from>
        </div>
        <iframe height="400px" class="form-control" id="myIframe" name="myIframe" width="100%"
            src="\projectt\owl\edit_owl.php"></iframe>
    </div>
    <div class="container " align="center">
        <a class="btn btn-success" href="\projectt\index.php" type="button">เสร็จสิ้น</a>
    </div>

    <script>
    var btnContainer = document.getElementById("myDIV");
    var btns = btnContainer.getElementsByClassName("link");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");

            if (current.length > 0) {
                current[0].className = current[0].className.replace(" active", "");
            }
            this.className += " active";
        });
    }
    </script>
</body>

</html>