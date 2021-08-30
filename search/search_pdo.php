<?php 
@ini_set('display_errors', '0');
include('C:\xampp\htdocs\projectt\server.php');

if (isset($_GET['search'])) {
$search = $_GET['search'];
$arrayy[]=0;
 $dbh = new PDO("mysql:host={$servername};dbname={$dbname}",$username, $password);
 $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt1 = $dbh->prepare('SELECT * FROM restaurant WHERE name_shop LIKE :p1');
        $stmt2 = $dbh->prepare('SELECT * FROM restaurants WHERE name_food LIKE :p1');
        $stmt3 = $dbh->prepare('SELECT * FROM restauranttype WHERE type_food LIKE :p1');
        $stmt4 = $dbh->prepare('SELECT * FROM restaurant WHERE id_address LIKE :p1');
        $stmt5 = $dbh->prepare('SELECT * FROM restauranttype WHERE comments LIKE :p1');
        
        $search2 = '%'.$search.'%';
     
//  ชื่อร้าน
        $stmt1-> bindParam(':p1', $search2);
// ชื่อเมนู
        $stmt2-> bindParam(':p1', $search2); 
// ประเภท
        $stmt3-> bindParam(':p1', $search2);
// จังหวัด
        $stmt4-> bindParam(':p1', $search2);
// อื่นๆ
        $stmt5-> bindParam(':p1', $search2);
        $stmt1->execute();
        $stmt2->execute();
        $stmt3->execute();
        $stmt4->execute();
        $stmt5->execute();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="\projectt\css\search_pdo.css" />
</head>

<body>

    <?php
    echo "<div class='containerss h2'>";  echo 'ผลลัพธ์จากการค้นหา "'.$search.'" ';  echo"</div>";  
        echo "<a name='fix'></a>";
            $count=1; 
        echo  "<div class='containerss body'>";
            echo "<div class='row row-12'>";           
                if($search=="%"){
                    $count=0;
                }  
                else if($count==1){
                    echo "<div class='containerss '>";   echo "*ข้อมูลร้านอาหารจากเว็บไซต์ wongnai.com";  echo "</br>"; echo"</div>"; 
                    while ($row = $stmt1->fetchObject()){   
                        $id = $row->id;
                        if($arrayy[$id]<=0){
                            $arrayy[$id]=1; 
                        echo "<div class='searchress form-control'>";
                            echo "<div class='col-10' style='height:160px; '>
                                <table>
                                    <tr>
                                        <td class='photo' style=''><img src= '\projectt\photo\u1"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u2"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u3"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u4"; echo(rand(1,5)); echo ".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u5"; echo(rand(1,5));  echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u"; echo(rand(2,5)); echo"6.jpg' class='img'></td>
                                    </tr>
                                </table>
                            </div>";
                            echo "<div class='col col-12'>"; 
                                echo "<a type ='submit' align='center' class='btn btn-link' 
                                name='add_obj' href='\projectt\search\homeoages.php?id=";  echo $row->id; echo "'>"; echo 'ร้าน '.$row->name_shop; echo"</a>"; echo "</br>";
                                echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>";  echo $row->id_address; echo "</br>";
                                echo "<i class='fa fa-clock-o' aria-hidden='true'></i>";  echo 'เวลาปิด-เปิด : '.$row->time_open; echo "</br>";
                            echo"</div>"; echo "</br>"; 
                        echo"</div>"; $count=1;
                       }
                    } 
                      
                      
                    while ($row = $stmt2->fetchObject()) {  
                        $sql ="SELECT * FROM (restaurant) WHERE username = '$row->username'"; 
                        $result = mysqli_query($conn, $sql);  
                            while($row = mysqli_fetch_array($result)){
                                $id= $row['id'];
                                if($arrayy[$id]<=0){
                                    $arrayy[$id]=1;
                        echo "<div class='searchress form-control'>";
                            echo "<div class='col-10' style='height:160px;'>
                                <table>
                                    <tr>
                                        <td class='photo' style=''><img src= '\projectt\photo\u1"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u2"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u3"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u4"; echo(rand(1,5)); echo ".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u5"; echo(rand(1,5));  echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u"; echo(rand(2,5)); echo"6.jpg' class='img'></td>
                                    </tr>
                                </table>
                            </div>";
                            echo "<div class='col col-12'>"; 
                                $sql ="SELECT * FROM (restaurant) WHERE id = '$id'";
                                echo "<a type ='submit' align='center' class='btn btn-link' 
                                name='add_obj' href='\projectt\search\homeoages.php?id=";  echo $id; echo "'>"; echo "ร้าน ";print_r($row['name_shop']);  echo"</a>"; echo "</br>";
                                echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>";print_r($row['id_address']); echo "</br>";
                                echo "<i class='fa fa-clock-o' aria-hidden='true'></i>";   echo "เวลาปิด-เปิด : ";print_r($row['time_open']); echo "</br>";
                            echo"</div>"; echo "</br>";
                        echo"</div>"; $count=1;
                        }
                    }  
                }
                       
                while ($row = $stmt3->fetchObject()){
                    $sql ="SELECT * FROM (restauranttype) WHERE username = '$row->username'"; 
                    $result = mysqli_query($conn, $sql);  
                        while($row = mysqli_fetch_array($result)){
                            $username = $row['username'];
                            $sql ="SELECT * FROM (restaurant) WHERE username = '$username'";
                            $result = mysqli_query($conn, $sql); 
                                while($row = mysqli_fetch_array($result)){
                                    $id= $row['id'];
                                    if($arrayy[$id]<=0){
                                    $arrayy[$id]=1;
                        echo "<div class='searchress form-control'>";
                            echo "<div class='col-10' style='height:160px; '>
                                <table>
                                    <tr>
                                        <td class='photo' style=''><img src= '\projectt\photo\u1"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u2"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u3"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u4"; echo(rand(1,5)); echo ".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u5"; echo(rand(1,5));  echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u"; echo(rand(2,5)); echo"6.jpg' class='img'></td>
                                    </tr>
                                </table>
                            </div>";
                            echo "<div class='col col-12'>"; 
                                echo "<a type ='submit' align='center' class='btn btn-link' 
                                name='add_obj' href='\projectt\search\homeoages.php?id=";  echo $id; echo "'>";  echo 'ร้าน '.$row['name_shop'];  echo"</a>"; echo "</br>";
                                echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>"; echo $row['id_address']; echo "</br>";
                                echo "<i class='fa fa-clock-o' aria-hidden='true'></i>";  echo 'เวลาปิด-เปิด : '.$row['time_open'];echo "</br>";
                            echo"</div>"; echo "</br>";
                        echo"</div>"; $count=1;
                                        }
                                }
                        }
                }

                while ($row = $stmt4->fetchObject()){
                    $id= $row->id;
                    if($arrayy[$id]<=0){
                    $arrayy[$id]=1;
                        echo "<div class='searchress form-control'>";
                            echo "<div class='col-10' style='height:160px; '>
                                <table>
                                    <tr>
                                        <td class='photo' style=''><img src= '\projectt\photo\u1"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u2"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u3"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u4"; echo(rand(1,5)); echo ".jpg' class='img'></td>
                                        <td class='photo' style=''><img src= '\projectt\photo\u5"; echo(rand(1,5));  echo".jpg' class='img'></td>
                                        <td class='photo'><img src= '\projectt\photo\u"; echo(rand(2,5)); echo"6.jpg' class='img'></td>
                                    </tr>
                                </table>
                            </div>";
                        echo "<div class='col col-12'>"; 
                            echo "<a type ='submit' align='center' class='btn btn-link' 
                            name='add_obj' href='\projectt\search\homeoages.php?id=";  echo $row->id; echo "'>"; echo 'ร้าน '.$row->name_shop;  echo"</a>"; echo "</br>";
                            echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>"; echo $row->id_address; echo "</br>";
                            echo "<i class='fa fa-clock-o' aria-hidden='true'></i>";  echo 'เวลาปิด-เปิด : '.$row->time_open; echo "</br>";
                       echo"</div>"; echo "</br>";
                    echo"</div>"; $count=1;
                    }
                }

                while ($row = $stmt5->fetchObject()){
                    $sql ="SELECT * FROM (restauranttype) WHERE username = '$row->username'"; 
                    $result = mysqli_query($conn, $sql);  
                        while($row = mysqli_fetch_array($result)){
                            $username = $row['username'];
                            $sql ="SELECT * FROM (restaurant) WHERE username = '$username'";
                            $result = mysqli_query($conn, $sql); 
                            while($row = mysqli_fetch_array($result)){
                                $id= $row['id'];
                                if($arrayy[$id]<=0){
                                $arrayy[$id]=1;
                            echo "<div class='searchress form-control'>";
                                echo "<div class='col-10' style='height:160px; '>
                                    <table>
                                        <tr>
                                            <td class='photo' style=''><img src= '\projectt\photo\u1"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                            <td class='photo'><img src= '\projectt\photo\u2"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                            <td class='photo' style=''><img src= '\projectt\photo\u3"; echo(rand(1,5)); echo".jpg' class='img'></td>
                                            <td class='photo'><img src= '\projectt\photo\u4"; echo(rand(1,5)); echo ".jpg' class='img'></td>
                                            <td class='photo' style=''><img src= '\projectt\photo\u5"; echo(rand(1,5));  echo".jpg' class='img'></td>
                                            <td class='photo'><img src= '\projectt\photo\u"; echo(rand(2,5)); echo"6.jpg' class='img'></td>
                                        </tr>
                                    </table>
                                </div>";
                                echo "<div class='col col-12'>"; 
                                    echo "<a type ='submit' align='center' class='btn btn-link' 
                                    name='add_obj' href='\projectt\search\homeoages.php?id=";  echo $id; echo "'>";echo 'ร้าน '.$row['name_shop'];  echo"</a>"; echo "</br>";
                                    echo "<i class='fa fa-location-arrow' aria-hidden='true'></i>"; echo $row['id_address']; echo "</br>";
                                    echo "<i class='fa fa-clock-o' aria-hidden='true'></i>";  echo 'เวลาปิด-เปิด : '.$row['time_open'];echo "</br>";
                                echo"</div>"; echo "</br>";
                            echo"</div>"; $count=1;
                                                }
                                       } 
                               }
                       }
                       echo"</div>";
              header('location: \projectt\index.php#fix');
       }
       if($count==0){
        echo "<div class='searchress form-control' style='height:60px; '>";
            echo "<div class='col-10' style='height:60px; '>";
                 echo 'ไม่พบข้อมูลที่ค้นหา'; 
             echo "</div>";
        echo"</div>";
          echo "<div class='out_search container' align='center'>";
                    $sql = "INSERT INTO search_no (search) VALUES ('$search')";
                    mysqli_query($conn, $sql);
                    header('location: \projectt\index.php#fix');
           echo "</div>";
        echo "</div>";
     echo "</div>";
       
       }
}

?>

</body>

</html>