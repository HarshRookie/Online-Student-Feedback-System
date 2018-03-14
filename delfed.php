<?php
	session_start();
	include "../bucket.php";
	$obDBRel = new DBRel;
	$obDBRel->redirect();
	error_reporting(0);
	
	//Function for Dropdown menu
	function abc(){
		$obDBRel = new DBRel;

		//Connecting PHP with DBMS and Obtaining Result of a query
		$conn = $obDBRel->DBConn();

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT Fed_No FROM Feedback";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='FED'>";
		echo "<option value='fed'>Feedback No.</option>";

		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['Fed_No'] . "'>" . $row['Fed_No'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<!DOCTYPE html>
	<head>
		<title>Delete Feedback - Admin</title>
		<link rel="stylesheet" type="text/css" href="delfed.css">
	</head>
	<body>
		<header>
                        <a href='feedback.php'><img src="../images/back.png"></a>
			<img src ="../images/tellus-logo.png"/>
			<span>
				<a href="../logout.php">Logout</a>
			</span>
		</header>
		<article>
			<h1>Delete a Record from Feedback:</h1>
			<form action="delfed.php" method=POST>
				<div class=input>
					<?php abc(); ?>
					<button type=submit>Delete</button>
				</div>
				<div class=output>
					<?php
						$obDBRelb = new DBRel;
						$conn=$obDBRelb->DBConn();

						$sql="SELECT * FROM Feedback order by Fed_No";
							$result = $conn->query($sql);

						if($result->num_rows > 0){
							echo "<table class=slist>";
							echo "<tr>";
							echo 	"<th>Feedback No.</td>";
							echo 	"<th>Roll No.</td>";
							echo 	"<th>Subject Name</td>";
							echo 	"<th>Feedback</td>";
                                                        echo    "<th>Q1</td>";
                                                        echo    "<th>Q2</td>";
                                                        echo    "<th>Q3</td>";
                                                        echo    "<th>Avg</td>";
							echo "</tr>";

							if($result->num_rows > 0)
								while($row = $result->fetch_assoc()){
									echo "<tr>";
									echo 	"<td>" . $row["Fed_No"] . "</td>";
									echo 	"<td>" . $row["Roll_No"] . "</td>";
									echo 	"<td>" . $row["Sub_Name"] . "</td>";
									echo 	"<td>" . $row["Feedback"] . "</td>";
                                                                        echo 	"<td>" . $row["q1"] . "</td>";
                                                                        echo 	"<td>" . $row["q2"] . "</td>";
                                                                        echo 	"<td>" . $row["q3"] . "</td>";
                                                                        $tot=$row["q1"]+$row["q2"]+$row["q3"];
                                                                        $avg=$tot/3;
                                                                        echo    "<td>" . round($avg) . "</td>";
									echo "</tr>";
							}
						}
						else
							echo "<div align='center' style='font-size:20px'>No Records.</div>";

						if ($_SERVER['REQUEST_METHOD'] == 'POST'){
							
							$sql="Delete from Feedback where Fed_No=".$_POST['FED'];
								$result = $conn->query($sql);

							if ($conn->query($sql) === TRUE){
								echo "<script> alert('Feedback Deleted!'); </script>";
								header('Location:delfed.php');
							}
							else
								echo "Error: " . $sql . "<br>" . $conn->error;

						}

						echo "</table>";

						$conn->close();
					?>
				</div>
			</form>
		</article>
	</body>
</html>