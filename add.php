<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  			
<?php
$div=$_POST["Rollno"];
if($div < 60)
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "ddb";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	{
    	die("Connection failed: " . $conn->connect_error);
	} 
	else
	{
    	if(isset($_POST["options"]))
    	{
      		$option=$_POST["options"];
      		$rn=$_POST["Rollno"]; 
      		$n=$_POST["Name"];
      		$m=$_POST["Marks"];
      		$d='C';
      		if($rn==" "||$n==" "||$m==null)
   		    {
      		echo '<script >
   		   
        		alert("Enter valid Details");
        		window.location = "add.html";
  				</script>
      			';
      		}
       		if($option==1)
      		{
      			$result = mysqli_query($conn,"SELECT * FROM studentd WHERE Rollno = '$rn'");
  				if($result->num_rows == 1) 
  				{ 
  					echo'
  						<script>
        				alert("Roll number already exist");
        				window.location = "add.html";
      					</script>
						';
				}
  				else
  				{ 
      				echo "Inserted";
       				$sql="INSERT INTO studentd VALUES('$rn','$n','$m','$d')";
    			   mysqli_query($conn,$sql);
   				}
      		}
      		if($option==3)
      		{
     		   	echo "DELETED";
    	  		$sql="DELETE FROM studentd where Rollno='$rn' ";
    	  		mysqli_query($conn,$sql);
			}
    	  	if($option==2)
    	  	{
    	    	echo "UPDATED";
    	  		$sql="UPDATE `studentd` SET `Name` = '$n', `marks` = '$m' WHERE `studentd`.`Rollno` = '$rn'";
    	  		mysqli_query($conn,$sql);
    	  	}
		}
	}
	$conn->close();
}
elseif($div < 121)
{
	//$myPDO = new PDO('pgsql:host=localhost;dbname=DDB', 'postgres', '123456');
  	$link=pg_connect("host=localhost port=5432 dbname=ddb user=postgres password=123456");
	if (!$link)
	{
		die('Error: Could not connect: ');
	}
	else
	{
		if(isset($_POST["options"]))
		{
      		$option=$_POST["options"];
      		$rn=$_POST["Rollno"];
      		$n=$_POST["Name"];
      		$m=$_POST["Marks"];
      		$d='D';
      		if($rn==" "||$n==" "||$m==null)
   		    {
      		echo '<script >
   		   
        		alert("Enter valid Details");
        		window.location = "add.html";
  				</script>
      			';
      		}
       		if($option==1)
      		{	$q="SELECT * FROM studentc WHERE Rollno='$rn'";
      			$result = pg_query($q);
  				if (pg_num_fields($result)==1) 
  				{ 
  					echo'
  					<script >
        			alert("Roll number already exist");
        			window.location = "add.html";
      				</script>
					';
				}
				else     
				{
      				echo "Inserted";
      				$query="INSERT INTO studentc(Rollno,Name,Marks,Div) VALUES('$rn','$n','$m','$d')" ;	 
      				$result = pg_query($query);
      			}
      			if($option==3)
      			{
      				echo "DELETED";
        			$query="DELETE FROM studentc WHERE Rollno ='$rn'" ;  
     				 $result = pg_query($query);
      			}
    		}
      		if($option==2)
      		{
      			echo "UPDATED";
   				$query= "UPDATE studentc SET Name='$n', Marks='$m',Div='$d' WHERE Rollno='$rn'";
   				$result = pg_query($query);
    	  	}
		}
	}
}
else 
{
	echo "enter valid roll number";
}
?>
</head>
</html>