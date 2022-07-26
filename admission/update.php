<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Update</title>
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
  footer {
    margin-top: 25px;
    border-top: 0.5em solid #0a5a73;
    background: #f06623;
    padding: 6px;
    color: white;
    position: relative;
    top: 207px;
    box-sizing: border-box;
    width: 100%;
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
  .window input[value="Submit"] {
    cursor: pointer;
    background: #f06623;
    color: #fff;
    text-transform: uppercase;
    position: relative;
    left: 84%;
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
    <h2>Update</h2>
    <form class="" action="" method="get">

    <div class="">
          <input type="search" name="sid" value="" required>
          <label for="sid" class="float">Student ID</label>
        </div>

    <input type="submit" name="button_1" value="Submit">

    </form>
<?php
    $link = mysqli_connect("localhost", "root", "openmysql", "admission");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

global $sid;


if(isset($_POST['button_X'])){
$sid=$_GET['sid'];
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

$sql_2 = "UPDATE student

SET SNAME = '$sname',
DID = '$did',
HID = '$hid',
SDOB = '$sdob',
SADDRESS = '$address',
SPHONE = '$sphone',
SMAIL = '$smail',
SGENDER = '$sgender',
PUCPER = '$pucper',
CETRANK = '$cetrank'

where SID='$sid';";


  $sql_1 = "UPDATE paidfor
  SET
  SEATID = '$seatid',
  PAYMENTMETHOD ='$paymethod',
  TRANSACTIONID ='$tranxid'
  where SID='$sid';";
if (mysqli_query($link, $sql_1) and mysqli_query($link, $sql_2)) {
  echo "</div>
  <footer >
  <b>Contact us:</b>
  <ul>
  <li>8791209876</li>
  <li>official@jssstu.in</li>
  </ul>
  </footer>";
    die("<script>alert('Updated successfully');</script>");
  } else {
  echo "</div>
    <footer >
    <b>Contact us:</b>
    <ul>
    <li>8791209876</li>
    <li>official@jssstu.in</li>
    </ul>
    </footer>";
   die('<script>alert("Error!!!");</script>');
  }
}


if(isset($_GET['button_1'])){

$sid=$_GET['sid'];
$sql = "SELECT * FROM for_update where SID='$sid'";

if($result = mysqli_query($link, $sql)){
if(mysqli_num_rows($result) > 0){
  echo "<style>footer {   top: 0px;}</style>";
while ($row1 = mysqli_fetch_array($result)) {
    echo "<form class='' method='post'>";

    echo "<div class=''>";
    echo "<input type='text' name='sname' value='{$row1['SNAME']}' required maxlength='50' >";
    echo "<label class='float' for=''>Name</label>";
    echo  "</div>";

    echo "<div class=''>";
    echo "<input type='email' name='smail' value='{$row1['SMAIL']}' required maxlength='100'>";
    echo "<label class='float' for=''>Email</label>";
    echo "</div>";

    echo "<div class=''>";
    echo "<input type='text' name='sphone' value='{$row1['SPHONE']}' required maxlength='10'>";
    echo "<label class='float' for=''>Ph Number</label>";
    echo "</div>";

    echo "<div class='sele'>";
    echo "<label for=''>Date of Birth </label>";
    echo "<input type='date' name='sdob' value='{$row1['SDOB']}' required min='1990-01-01'>";
    echo "</div>";

    echo "<div class='sele'>";
    echo "<p>Gender:</p>";

    echo "<input type='radio' id='male' name='sgender' value='MALE'"; if("{$row1['SGENDER']}"=='MALE') echo "checked=checked"; echo ">";
    echo "<label for='male'> Male</label>";
    echo "<input type='radio' id='female' name='sgender' value='FEMALE'";if("{$row1['SGENDER']}"=='FEMALE') echo "checked=checked"; echo ">";
    echo "<label for='female'> Female</label>";
    echo "<input type='radio' id='other' name='sgender' value='OTHER'";if("{$row1['SGENDER']}"=='OTHER') echo "checked=checked"; echo ">";
    echo "<label for='other'> Other</label>";
    echo "</div>";

    echo "<div class=''>";
    echo "<input type='text' name='address' value='{$row1['SADDRESS']}' required maxlength='100'>";
    echo "<label class='float' for=''>Address</label>";
    echo "</div>";

    echo "<div class=''>";
    echo  "<label for='did'>Department:</label>";

    echo "<select name='did'  required>";
    echo "<option disabled >Choose Department</option>";
    echo "<option value='D01'";if("{$row1['DID']}"=='D01'){ echo "selected";};echo ">Computer Science and Engineering</option>";
    echo "<option value='D02'";if("{$row1['DID']}"=='D02'){ echo "selected";};echo ">Electronics and Communication Engineering</option>";
    echo "<option value='D04'";if("{$row1['DID']}"=='D04'){ echo "selected";};echo ">Information Science and Engineering</option>";
    echo "<option value='D03'";if("{$row1['DID']}"=='D03'){ echo "selected";};echo ">Mechanical Engineering</option>";
    echo "</select>";
    echo "</div>";

    echo "<br><div class='sele'>";
    echo "<label for=''>Hostel:</label>";

    echo "<select  name='hid' id='' required>";
    echo "<option disabled >Choose options</option>";
    
    echo "<option value='LOCAL'";if("{$row1['HID']}"=='LOCAL'){ echo "selected";};echo ">No,Localite</option>";
    echo "<option value='H001'";if("{$row1['HID']}"=='H001'){ echo "selected";};echo ">A Block</option>";
    echo "<option value='H002'";if("{$row1['HID']}"=='H002'){ echo "selected";};echo ">H Block</option>";
    echo "<option value='H003'";if("{$row1['HID']}"=='H003'){ echo "selected";};echo ">GH Block</option>";
    echo "<option value='H004'";if("{$row1['HID']}"=='H004'){ echo "selected";};echo ">Mess Block</option>";
    echo "</select>";
    echo "</div>";


    echo "<div class=''>";
    echo "<input type='text' name='pucper' value='{$row1['PUCPER']}' required maxlength='5'>";
    echo "<label class='float' for=''>PUC %</label>";
    echo  "</div>";

    echo "<div class=''>";
    echo "<input type='text' name='cetrank' value='{$row1['CETRANK']}' required maxlength='7'>";
    echo "<label class='float' for=''>CET-Rank</label>";
    echo "</div>";

    echo "<div class='sele'>
    <label for=''>Seat:</label>

        <select name='seatid' required>
          <option disabled >
            Choose Category
          </option>
          <option value='E021'";if("{$row1['SEATID']}"=='E021') echo "selected"; echo ">Aided</option>
          <option value='E057'";if("{$row1['SEATID']}"=='E057') echo "selected"; echo ">Unaided</option>
          <option value='E060'";if("{$row1['SEATID']}"=='E060') echo "selected"; echo ">COMED-K</option>
          <option value='E070'";if("{$row1['SEATID']}"=='E070') echo "selected"; echo ">Payment</option>
          <option value='E080'";if("{$row1['SEATID']}"=='E080') echo "selected"; echo ">Others</option>
        </select>
      </div>
      <div class='sele'>
        <p>Payment Method:</p>
        <input type='radio' id='dd' name='paymethod' value='DD'";if("{$row1['PAYMENTMETHOD']}"=='DD')echo "checked"; echo">
        <label for='dd'>DD</label>
        <input type='radio' id='neft' name='paymethod' value='NEFT'";if("{$row1['PAYMENTMETHOD']}"=='NEFT')echo "checked"; echo">
        <label for='neft'>NEFT</label>
        <input type='radio' id='others' name='paymethod' value='Others'";if("{$row1['PAYMENTMETHOD']}"=='Others')echo "checked"; echo">
        <label for='others'>OTHERS</label>
      </div>
      <div class=''>";
    echo "<input type='text' name='tranxid' value='{$row1['TRANSACTIONID']}' required maxlength='15'>
        <label class='float' for=''>Transaction ID</label>
      </div>";
    echo "<input type='submit' name='button_X' value='Update'> ";
    echo "<input type='reset' name='button_Y' value='Reset'>";
    echo "</form>";
}
}
else{    echo "Unknown record";}
mysqli_free_result($result);

}
}
?>

  </div>
  <footer >
  <b>Contact us:</b>
  <ul>
  <li>8791209876</li>
  <li>official@jssstu.in</li>
  </ul>
  </footer>

</body>

</html>
