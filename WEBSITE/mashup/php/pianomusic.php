<?php
header('Access-Control-Allow-Origin: *');
$type=$_POST["type"];
$servername = "localhost";
$username = "giolmolinellioppedisano";
$password = "";
$dbname = "my_giolmolinellioppedisano";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset('utf8mb4');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Image, Detail, Offer, Activation FROM ReteMobilePiani WHERE Name='TIM YOUNG & MUSIC DIGITAL'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class=\"col-sm-12\">
                   <div class=\"box\">
                    	<img class=\"image\" src=\"$row[Image]\" align=\"top\"/>
                    	 <p class=\"desc\">".$row[Detail]."</p>
                    </div>
             </div>
             <div class=\"col-sm-12\">
                   <div class=\"box\">
                    	 <p class=\"desc\">".$row[Offer]."</p>
                    </div>
             </div>
             <div class=\"col-sm-12\">
                   <div class=\"box\">
                    	 <p class=\"desc\">".$row[Activation]."</p>
                    </div>
             </div>
             </br>
             <div class=\"col-sm-12\">
             <div class=\"fordevice\">
              	<a href= 'timmusicrelatedproducts.html' class=\"prod\">prodotti correlati</a>
              </div>
              </div>
            ";
    }
} else {
    echo "0 results";
}

$conn->close();
?>