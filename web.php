<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ddb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$link=pg_connect("host=localhost port=5432 dbname=ddb user=postgres password=123456");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Class-hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 <link rel="stylesheet" href="attendance.css"> 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <STYLE>
  .big {
  font-size: 1.2em;
}
/* Custom dropdown */
.custom-dropdown {
  position: relative;
  display: inline-block;
  vertical-align: middle;
  margin: 10px; 
}
.custom-dropdown select {
  background-color: #1abc9c;
  color: #fff;
  font-size: inherit;
  padding: .5em;
  padding-right: 2.5em; 
  border: 0;
  margin: 0;
  border-radius: 3px;
  text-indent: 0.01px;
  text-overflow: '';
  -webkit-appearance: button; /* hide default arrow in chrome OSX */
}
.custom-dropdown::before,
.custom-dropdown::after {
  content: "";
  position: absolute;
  pointer-events: none;
}
.custom-dropdown::after { /*  Custom dropdown arrow */
  content: "\25BC";
  height: 1em;
  font-size: .625em;
  line-height: 1;
  right: 1.2em;
  top: 50%;
  margin-top: -.5em;
}
.custom-dropdown::before { /*  Custom dropdown arrow cover */
  width: 2em;
  right: 0;
  top: 0;
  bottom: 0;
  border-radius: 0 3px 3px 0;
}
.custom-dropdown select[disabled] {
  color: rgba(0,0,0,.3);
}
.custom-dropdown select[disabled]::after {
  color: rgba(0,0,0,.1);
}
.custom-dropdown::before {
  background-color: rgba(0,0,0,.15);
}
.custom-dropdown::after {
  color: rgba(0,0,0,.4);
}
.Box{
      margin-top: 5em;
      margin-left: 30em;
}
.BoxA{
  margin-bottom: 5em;
  margin-left: 25em;
}
</STYLE>
</head>
<body>
  
</head>
<body>
  
 <div class="Box"> 
  <h2 style="margin-left: 4em;">Student Data</h2>

<table style="margin-left: 7em;" >
  <thead>
    <tr>
<?php
 $sql=mysqli_query($conn,"SELECT * FROM studentd");
 $post="SELECT * FROM studentc";
 $p=pg_query($post);
 ?>
      
      <!-- ko foreach: attendance -->
      <th>ROLLNO</th>
      <th>NAME</th>
      <th>MARKS</th>
      <th>DIVISON</th>
      <!-- /ko -->
    </tr>
    <?php
    while($row=mysqli_fetch_assoc($sql)){
   echo" <tr>";
    echo"  <td>";
          echo $row['Rollno'];
   echo"   </td>";
    echo"  <td>";
          echo $row['Name'];
    echo"  </td>";
    echo"  <td>";
          echo $row['marks'];
    echo"  </td>";
    echo"  <td>";
          echo $row['div'];
   echo"   </td>";
   echo" </tr>";
  }
   while($gres=pg_fetch_assoc($p)){
   echo" <tr>";
    echo"  <td>";
          echo $gres['rollno'];
   echo"   </td>";
    echo"  <td>";
          echo $gres['name'];
    echo"  </td>";
    echo"  <td>";
          echo $gres['marks'];
    echo"  </td>";
    echo"  <td>";
          echo $gres['div'];
   echo"   </td>";
   echo" </tr>";
  }
  ?>
  </thead>
</table>
</div>
<!-- tip: use to debug data values -->
<!-- <pre data-bind="text: ko.toJSON($data, null, 2)"></pre> -->
</body>
</html>