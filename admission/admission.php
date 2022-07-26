<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admission</title>
  <link rel="stylesheet" href="css\styles.css">
  <link rel="shortcut icon" href="fav.ico">
  <style media="screen">
  body{
      margin:0px
  }
  nav{
      padding:10px;
      text-align: center;
      background:#f06623;
      margin-bottom: 25px;
      position:sticky;
      top:0;
      z-index:1;
  }
  footer{
      margin-top: 25px;
      border-top: 0.5em solid #0a5a73;
      background:#f06623;
      padding:6px;
      color: white;
  }
  a{
      text-decoration: none;
      color: white;
      padding: 15px;
  }
  a:hover{
    color: darkred;
  }
  .top{
    background-color: white;
  }
  </style>
</head>

<body >
  <div class="top">


  <header  align="center">
  <img src="logo-for-web-site.jpg" alt="JSS-STU" width ="250px">
  </header>
  </div>
  <nav >
  <a href="home.html">HOME</a>|
  <a href="admission.php">ADMISSION</a>|
  <a href="search.php">STUDENT INFO</a>|
  <a href="update.php">UPDATE INFO</a>
  </nav>


<div class="window">
    <h2>Student Admission</h2>
    <form class="" action="" method="post">
      <div class="">
        <input type="text" name="sname" value="" required maxlength="50">
        <label class="float" for="">Name</label>
      </div>
      <div class="">
        <input type="email" name="smail" value="" required maxlength="100">
        <label class="float" for="">Email</label>
      </div>
      <div class="">
        <input type="text" name="sphone" value="" required maxlength="10">
        <label class="float" for="">Ph Number</label>
      </div>
      <div class="sele">
        <label for="">Date of Birth</label>
        <input type="date" name="sdob" value="" required min="1990-01-01">
      </div>
      <div class="sele">
        <p>Gender:</p>
        <input type="radio" id="male" name="sgender" value="MALE" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="sgender" value="FEMALE">
        <label for="female">Female</label>
        <input type="radio" id="other" name="sgender" value="OTHER">
        <label for="other">Other</label>
      </div>
      <div class="">
        <input type="text" name="address" value="" required>
        <label class="float" for="">Address</label>
      </div>
      <div class="sele">
        <label for="did">Department:</label>

        <select name="did" id="" required>
          <option disabled >
            Choose Department
          </option>
          <option value="D01">Computer Science and Engineering</option>
          <option value="D02">Electronics and Communication Engineering</option>
          <option value="D04">Information Science and Engineering</option>
          <option value="D03">Mechanical Engineering</option>

        </select>
      </div>
      <div class="sele">
        <label for="">Hostel:</label>

        <select  name="hid" id=""required>
          <option disabled >
            Choose options
          </option>
          <option value="LOCAL"selected>No,Localite</option>
          <option value="H001">A Block</option>
          <option value="H002">H Block</option>
          <option value="H003">GH Block</option>
          <option value="H004">Mess Block</option>
        </select>
      </div>
      <div class="">
        <input type="text" name="pucper" value="" required maxlength="5">
        <label class="float" for="">PUC %</label>
      </div>
      <div class="">
        <input type="text" name="cetrank" value="" required maxlength="7">
        <label class="float" for="">CET-Rank</label>
      </div>
      <div class="sele">
        <label for="">Seat:</label>

        <select name="seatid" id="" required>
          <option disabled >
            Choose Category
          </option>
          <option value="E021"selected>Aided</option>
          <option value="E057">Unaided</option>
          <option value="E060">COMED-K</option>
          <option value="E070">Payment</option>
          <option value="E080">Others</option>
        </select>
      </div>
      <div class="sele">
        <p>Payment Method:</p>
        <input type="radio" id="dd" name="paymethod" value="DD" required>
        <label for="dd">DD</label>
        <input type="radio" id="neft" name="paymethod" value="NEFT">
        <label for="neft">NEFT</label>
        <input type="radio" id="others" name="paymethod" value="Others">
        <label for="others">OTHERS</label>
      </div>
      <div class="">
        <input type="text" name="tranxid" value="" required maxlength="15">
        <label class="float" for="">Transaction ID</label>
      </div>

      <input type="submit" name="button_1" value="Submit">
      <input type="reset" name="button_2" value="Reset">
    </form>
  </div>
  <footer >
  <b>Contact us:</b>
  <ul>
  <li>8791209876</li>
  <li>official@jssstu.in</li>
  </ul>
  </footer>
  <?php
if(isset($_POST['button_1'])){
$servername = "localhost";
$username = "root";
$password = "openmysql";
$database = "admission";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sname = $_POST["sname"];
$smail = $_POST["smail"];
$sphone = $_POST["sphone"];
$sdob = $_POST["sdob"];
$sgender = $_POST["sgender"];
$address = $_POST["address"];
$hid = $_POST["hid"];
$did = $_POST["did"];
$pucper = $_POST["pucper"];
$cetrank = $_POST["cetrank"];
$seatid = $_POST["seatid"];
$paymethod = $_POST["paymethod"];
$tranxid = $_POST["tranxid"];

$sql = "INSERT INTO student
(
SNAME,
DID,
HID,
SDOB,
SADDRESS,
SPHONE,
SMAIL,
SGENDER,
PUCPER,
CETRANK)
VALUES ('$sname','$did','$hid','$sdob','$address','$sphone','$smail','$sgender','$pucper','$cetrank')";

if ($conn->query($sql) === TRUE) {
    $sid = $conn->insert_id;
  } else {
    die('<script>alert("Error!!!");</script>');
  }
if($sid){
$sql = "INSERT INTO paidfor (SID,
SEATID,
PAYMENTMETHOD,
TRANSACTIONID
)
VALUES ('$sid','$seatid','$paymethod','$tranxid')";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Student record with SID = $sid created successfully');</script>";
  } else {
    die('<script>alert("Error!!!");</script>');
  }
}
}
?>
</body>

</html>
