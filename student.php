<?php
	session_start();
	error_reporting(0);
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();

	//Function for Dropdown box
	function abc(){
		$obDBRel = new DBRel;

		//Connecting PHP with DBMS and Obtaining Result of a query
		$conn = $obDBRel->DBConn();

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT Sub_Name FROM Subject where Sub_name not in( select Sub_name from feedback where roll_no=".$_SESSION['user']." )";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='SUB'>";
		echo "<option value='subject'>Subject</option>";

		if ($result->num_rows >=0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['Sub_Name'] . "'>" . $row['Sub_Name'] . "</option>";
		+else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Student Page</title>
		<link rel="stylesheet" type="text/css" href="student.css">
	</head>
	<body>
		<header>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Enter your Feedback:</h1>
			<form action="student.php" method="post">
				<div class="input">					
					<?php abc(); ?>
					<button type="submit">Submit</button>
				</div>
				<div class="output">
                                    <table>
                                        <tr>
                                            <th></th>
                                            <th>Excellent</th> 
                                            <th>Good</th>
                                            <th>Average</th>
                                            <th>Bad</th>
                                            <th>Dreadful</th>
                                        </tr>

					<tr>
                                            <th><P>1. Was the subject intresting?</p></th>
                                            <th><input type="radio" name="q1" value="5"></th>
                                            <th><input type="radio" name="q1" value="4"></th>
                                            <th><input type="radio" name="q1" value="3"></th>
                                            <th><input type="radio" name="q1" value="2"></th>                                            
                                            <th><input type="radio" name="q1" value="1"></th>
                                        </tr>
                                        <tr>
                                            <th><P>2. Was the subject properly conducted?</p></th>
                                            <th><input type="radio" name="q2" value="5"></th>
                                            <th><input type="radio" name="q2" value="4"></th>
                                            <th><input type="radio" name="q2" value="3"></th>
                                            <th><input type="radio" name="q2" value="2"></th>                                            
                                            <th><input type="radio" name="q2" value="1"></th>
                                        </tr>
                                        <tr>
                                            <th><P>3. Was tutorial conducted in time?</p></th>
                                            <th><input type="radio" name="q3" value="5"></th>
                                            <th><input type="radio" name="q3" value="4"></th>
                                            <th><input type="radio" name="q3" value="3"></th>
                                            <th><input type="radio" name="q3" value="2"></th>                                            
                                            <th><input type="radio" name="q3" value="1"></th>
                                        </tr>
                                    </table>

			
					<textarea name="Feedback" rows="10" cols="50" placeholder="Feedback" required></textarea>
				</div>
			</form>
		</article>
<?php
	//Obtaining values from Form
	$sub=$_POST['SUB'];
	$roll=$_SESSION['user'];
	$fb=$_POST['Feedback'];
        $qw1=$_POST['q1'];
        $qw2=$_POST['q2'];
        $qw3=$_POST['q3'];


	//Connecting to DB
	$conn = $obDBRel->DBConn();

	//Inserting values to Subject Table
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sql="INSERT INTO Feedback VALUES (NULL,$roll,'$sub','$fb',$qw1,$qw2,$qw3)";
		if ($conn->query($sql) === TRUE)
			echo "<script> alert('Feedback Added!'); </script>";
		else
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//Saving Resource
	$conn->close();
?>
		</script>
	</body>
</html>